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

        echo $OUTPUT->notification('This notification has been injected by view_page_start()',
            'notifysuccess');
    }

    /**
     * Add a button into the UI via JS (because we can).
     */
    public function view_page_end() {

        echo html_writer::div('', '', array('id' => 'workshoptool_demo_placeholder'));
        echo '
            <script type="text/javascript">//<![CDATA[
                $(document).ready(function() {
                    $("#workshoptool_demo_placeholder").append("<button>Look mom, I created a button via JS!</button>");
                });
            //]]></script>';
    }

    /**
     * Display a notification at the top of the submission page.
     */
    public function submission_page_start() {
        global $OUTPUT;

        echo $OUTPUT->notification('This notification has been injected by submission_page_start()');
    }

    /**
     * Display a notification at the bottom of the workshop submission.php page.
     */
    public function submission_page_end() {
        global $OUTPUT;

        echo $OUTPUT->notification('This notification has been injected by submission_page_end()');
    }

    /**
     * Add a dummy custom action to the assessments displayed at submission.php page
     *
     * @param stdClass $submission the assessed submission
     * @param workshop_assessment $assessment as returned by {@link workshop::prepare_assessment()}
     */
    public function submission_prepare_assessment($submission, workshop_assessment $assessment) {
        global $PAGE;

        $assessment->add_action($PAGE->url, 'Custom action');
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

    /**
     * Called at assessment.php right after the workshop title heading
     *
     * @param stdClass $assessment the displayed assessment's record
     * @param stdClass $submission the displayed assessed submission's record
     */
    public function assessment_page_end($assessment, $submission) {
        global $OUTPUT;

        echo $OUTPUT->notification('This notification has been injected by assessment_page_init()');
    }

}
