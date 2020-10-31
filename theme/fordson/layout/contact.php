<?php
require_once(__DIR__ . '/../../../config.php');

$bodyattributes = $OUTPUT->body_attributes();
$headerlogo = $PAGE->theme->setting_file_url('headerlogo', 'headerlogo');


$templatecontext = [
  'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
  'output' => $OUTPUT,
  'bodyattributes' => $bodyattributes,
  'hascustomlogin' => $PAGE->theme->settings->showcustomlogin == 1,
  'hasslideshowpages' => $hasslideshowpages,
  'headerlogo' => $headerlogo
];

$templatecontext['theme_url'] = theme_url();
$templatecontext['base_url'] = "https://elearner.ghitbd.com/lms";
$templatecontext['root_url'] = $CFG->wwwroot;
$templatecontext['show_msg'] = "";



$record3 =  $DB->get_records_sql('SELECT * FROM  lms_breadcrumbs ');

$templatecontext['show_heading'] = '';
foreach ($record3 as $record) {
  $templatecontext['show_heading'] .=  '    <section class="inner-header divider parallax" data-bg-img="' . theme_url() . '/settings/uploads/' . $record->image_contact . '">
  <div class="container pt-70 pb-20">
    <div class="section-content">
      <div class="row">
        <div class="col-md-12">
          <h2 class="title text-white text-center">' . $record->heading_contact . '</h2>
          <ol class="breadcrumb text-left mt-10">
            <li><a href="#" class="text-white">Home</a></li>
            <li><a href="#" class="text-white">Pages</a></li>
            <li class="active text-white">' . $record->heading_contact . '</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>';
}




require_once(__DIR__ . '/../../../config.php');
global $DB;


if (isset($_POST['submitContact'])) {

  $data = new stdClass();
  $data->name = $_POST["form_name"];
  $data->email = $_POST["form_email"];
  $data->subject = $_POST["form_subject"];
  $data->phone = $_POST["form_phone"];
  $data->message = $_POST["form_message"];
  $DB->insert_record('contact_message', $data);
  $templatecontext['show_msg'] = "Email sent successfully!!!";
}
// echo "<pre>";
// var_dump($OUTPUT);
// echo "</pre>";
// die();


echo $OUTPUT->render_from_template('theme_fordson/fronttemplate/contact', $templatecontext);
