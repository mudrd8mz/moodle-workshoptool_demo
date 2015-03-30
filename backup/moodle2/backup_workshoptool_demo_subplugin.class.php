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
 * @package     workshoptool_demo
 * @category    backup
 * @copyright   2015 David Mudrak <david@moodle.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Attaches dummy data to the workshop backup file
 */
class backup_workshoptool_demo_subplugin extends backup_subplugin {

    /**
     * Returns the subplugin information to attach to the workshop element
     */
    protected function define_workshop_subplugin_structure() {

        $subplugin = $this->get_subplugin_element();
        $subplugin_wrapper = new backup_nested_element($this->get_recommended_name());
        $subplugin_data = new backup_nested_element('workshoptool_demo_workshop_data', array('id'), array('foo', 'bar'));

        $subplugin->add_child($subplugin_wrapper);
        $subplugin_wrapper->add_child($subplugin_data);

        $subplugin_data->set_source_array(array(
            (object)array('id' => 42, 'foo' => 'Foo!', 'bar' => 'Bar!'),
            (object)array('id' => 43, 'foo' => 'AnotherFoo!', 'bar' => 'AnotherBar!'),
        ));

        return $subplugin;
    }

    /**
     * Returns the subplugin information to attach to the submission element
     */
    protected function define_submission_subplugin_structure() {

        $subplugin = $this->get_subplugin_element();
        $subplugin_wrapper = new backup_nested_element($this->get_recommended_name());
        $subplugin_data = new backup_nested_element('workshoptool_demo_submission_data', array('id'), array('foo'));

        $subplugin->add_child($subplugin_wrapper);
        $subplugin_wrapper->add_child($subplugin_data);

        $subplugin_data->set_source_array(array(
            (object)array('id' => 44, 'foo' => 'Foo!'),
            (object)array('id' => 45, 'foo' => 'AnotherFoo!'),
        ));

        return $subplugin;
    }

    /**
     * Returns the subplugin information to attach to the assessment element
     */
    protected function define_assessment_subplugin_structure() {

        $subplugin = $this->get_subplugin_element();
        $subplugin_wrapper = new backup_nested_element($this->get_recommended_name());
        $subplugin_data = new backup_nested_element('workshoptool_demo_assessment_data', array('id'), array('bar'));

        $subplugin->add_child($subplugin_wrapper);
        $subplugin_wrapper->add_child($subplugin_data);

        $subplugin_data->set_source_array(array(
            (object)array('id' => 46, 'bar' => 'Barbars!'),
            (object)array('id' => 47, 'bar' => 'Duck and cover!'),
        ));

        return $subplugin;
    }
}
