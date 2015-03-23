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
 * Interface library of this subplugin.
 *
 * @package     workshoptool_demo
 * @copyright   2015 David Mudrak <david@moodle.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Extend the global navigation tree.
 *
 * This can be called by an AJAX request so do not rely on $PAGE as it might not be set up properly.
 *
 * @param navigation_node $navref An object representing the navigation tree node of the workshop module instance
 * @param stdClass $course
 * @param stdClass $module
 * @param cm_info $cm
 */
function workshoptool_demo_extend_navigation(navigation_node $navref, stdclass $course, stdclass $module, cm_info $cm) {
    $navref->add('Look mom, I just extended the navigation!');
}

/**
 * Extend the settings navigation with the Workshop settings.
 *
 * This function is called when the context for the page is a workshop module. This is not called by AJAX
 * so it is safe to rely on the $PAGE.
 *
 * @param settings_navigation $settingsnav {@link settings_navigation}
 * @param navigation_node $workshopnode {@link navigation_node}
 */
function workshoptool_demo_extend_settings_navigation(settings_navigation $settingsnav, navigation_node $workshopnode) {
    $workshopnode->add('Look mom, I just extended the settings!');
}
