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
 * Shows how the restore would be implemented for this plugin type.
 *
 * @package     workshoptool_demo
 * @category    backup
 * @copyright   2015 David Mudrak <david@moodle.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Processes the subplugin paths found in the MBZ backup.
 */
class restore_workshoptool_demo_subplugin extends restore_subplugin {

    /**
     * Returns the paths to be handled by the subplugin at workshop level
     */
    protected function define_workshop_subplugin_structure() {
        return array(
            new restore_path_element(
                $this->get_namefor('workshop_data'),
                $this->get_pathfor('/workshoptool_demo_workshop_data')
            )
        );
    }

    /**
     * Returns the paths to be handled by the subplugin at submission level
     */
    protected function define_submission_subplugin_structure() {
        return array(
            new restore_path_element(
                $this->get_namefor('submission_data'),
                $this->get_pathfor('/workshoptool_demo_submission_data')
            )
        );
    }

    /**
     * Returns the paths to be handled by the subplugin at assessment level
     */
    protected function define_assessment_subplugin_structure() {
        return array(
            new restore_path_element(
                $this->get_namefor('assessment_data'),
                $this->get_pathfor('/workshoptool_demo_assessment_data')
            )
        );
    }

    /**
     * Process workshop data element
     */
    public function process_workshoptool_demo_workshop_data($data) {
        $this->step->log('workshoptool_demo: processing workshop level data id '.$data['id'], backup::LOG_DEBUG);
    }

    /**
     * Process submission data element
     */
    public function process_workshoptool_demo_submission_data($data) {
        $this->step->log('workshoptool_demo: processing submission level data id '.$data['id'], backup::LOG_DEBUG);
    }

    /**
     * Process assessment data element
     */
    public function process_workshoptool_demo_assessment_data($data) {
        $this->step->log('workshoptool_demo: processing assessment level data id '.$data['id'], backup::LOG_DEBUG);
    }
}
