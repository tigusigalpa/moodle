<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Resource module admin settings and defaults
 *
 * @package    mod_sadkofile
 * @copyright  2009 Petr Skoda  {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    require_once("$CFG->libdir/resourcelib.php");

    $displayoptions = resourcelib_get_displayoptions(array(RESOURCELIB_DISPLAY_AUTO,
                                                           RESOURCELIB_DISPLAY_EMBED,
                                                           RESOURCELIB_DISPLAY_FRAME,
                                                           RESOURCELIB_DISPLAY_DOWNLOAD,
                                                           RESOURCELIB_DISPLAY_OPEN,
                                                           RESOURCELIB_DISPLAY_NEW,
                                                           RESOURCELIB_DISPLAY_POPUP,
                                                          ));
    $defaultdisplayoptions = array(RESOURCELIB_DISPLAY_AUTO,
                                   RESOURCELIB_DISPLAY_EMBED,
                                   RESOURCELIB_DISPLAY_DOWNLOAD,
                                   RESOURCELIB_DISPLAY_OPEN,
                                   RESOURCELIB_DISPLAY_POPUP,
                                  );

    //--- general settings -----------------------------------------------------------------------------------
    $settings->add(new admin_setting_configtext('sadkofile/framesize',
        get_string('framesize', 'sadkofile'), get_string('configframesize', 'sadkofile'), 130, PARAM_INT));
    $settings->add(new admin_setting_configmultiselect('sadkofile/displayoptions',
        get_string('displayoptions', 'sadkofile'), get_string('configdisplayoptions', 'sadkofile'),
        $defaultdisplayoptions, $displayoptions));

    //--- modedit defaults -----------------------------------------------------------------------------------
    $settings->add(new admin_setting_heading('sadkofilemodeditdefaults', get_string('modeditdefaults', 'admin'), get_string('condifmodeditdefaults', 'admin')));

    $settings->add(new admin_setting_configcheckbox('sadkofile/printintro',
        get_string('printintro', 'sadkofile'), get_string('printintroexplain', 'sadkofile'), 1));
    $settings->add(new admin_setting_configselect('sadkofile/display',
        get_string('displayselect', 'sadkofile'), get_string('displayselectexplain', 'sadkofile'), RESOURCELIB_DISPLAY_AUTO,
        $displayoptions));
    $settings->add(new admin_setting_configcheckbox('sadkofile/showsize',
        get_string('showsize', 'sadkofile'), get_string('showsize_desc', 'sadkofile'), 0));
    $settings->add(new admin_setting_configcheckbox('sadkofile/showtype',
        get_string('showtype', 'sadkofile'), get_string('showtype_desc', 'sadkofile'), 0));
    $settings->add(new admin_setting_configcheckbox('sadkofile/showdate',
        get_string('showdate', 'sadkofile'), get_string('showdate_desc', 'sadkofile'), 0));
    $settings->add(new admin_setting_configtext('sadkofile/popupwidth',
        get_string('popupwidth', 'sadkofile'), get_string('popupwidthexplain', 'sadkofile'), 620, PARAM_INT, 7));
    $settings->add(new admin_setting_configtext('sadkofile/popupheight',
        get_string('popupheight', 'sadkofile'), get_string('popupheightexplain', 'sadkofile'), 450, PARAM_INT, 7));
    $options = array('0' => get_string('none'), '1' => get_string('allfiles'), '2' => get_string('htmlfilesonly'));
    $settings->add(new admin_setting_configselect('sadkofile/filterfiles',
        get_string('filterfiles', 'sadkofile'), get_string('filterfilesexplain', 'sadkofile'), 0, $options));

    $settings->add(new admin_setting_configtext('sadkofile/apptoken',
        'AppToken', 'AppToken', '', PARAM_ALPHANUM));
}
