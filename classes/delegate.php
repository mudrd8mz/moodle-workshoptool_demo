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
 * @subpackage  delegation
 * @copyright   2015 David Mudrak <david@moodle.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Demonstration of the workshop delegate implementation.
 *
 * @copyright 2015 David Mudrak <david@moodle.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class workshoptool_demo_delegate extends mod_workshop_delegate {

    /**
     * Require jQuery at view.php and amend the page heading.
     *
     * @param moodle_page $page the view.php page
     */
    public function view_page_init(moodle_page $page) {
        $page->requires->jquery();
        $page->set_heading($page->heading.' (amended by the demo delegate)');
    }

    /**
     * Display a notification at the top of the workshop view.php page.
     */
    public function view_page_start() {
        global $OUTPUT;

        echo $OUTPUT->notification('This notification has been injected by a workshop subplugin',
            'notifysuccess');
    }

    /**
     * Execute javascript when the document is ready.
     */
    public function view_page_end() {
        echo '
            <script type="text/javascript">
                $(document).ready(function() {
                    alert("This alert has been injected by a workshop subplugin");
                });
            </script>';
    }

    /**
     * Inject a new field into the workshop submission form.
     *
     * @param workshop_submission_form $form
     * @param MoodleQuickForm $mform the underlying quick form instance
     * @param array $customdata custom data passed to the form
     */
    public function submission_form_definition(workshop_submission_form $form, MoodleQuickForm $mform, array $customdata) {
        $mform->addElement('checkbox', 'democheckbox', 'Disclaimer', 'This checkbox has been injected by
            a workshop subplugin. You must check it in order to pass the form validation');
    }

    /**
     * Make sure the checkbox if clicked
     *
     * @param stdClass $handler used to pass the validation errors back
     * @param array $data the submitted form data
     * @param array $files the submitted form files
     */
    public function submission_form_validation(stdClass $handler, array $data, array $files) {

        if (empty($data['democheckbox'])) {
            $handler->errors['democheckbox'] = 'You must check this';
        }
    }

}
