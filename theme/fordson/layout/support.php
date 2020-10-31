<?php
require_once(__DIR__ . '/../../../config.php');

$bodyattributes = $OUTPUT->body_attributes();
$hasslideshowpages = (isset($PAGE->theme->settings->slideshowpages) && ($PAGE->theme->settings->slideshowpages == 0 || $PAGE->theme->settings->slideshowpages == 2)) !== false;
$headerlogo = $PAGE->theme->setting_file_url('headerlogo', 'headerlogo');


$templatecontext = [
  'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
  'output' => $OUTPUT,
  'bodyattributes' => $bodyattributes,
  //'hascustomlogin' => $PAGE->theme->settings->showcustomlogin == 1,
  //'hasslideshowpages' => $hasslideshowpages,
  //'headerlogo' => $headerlogo
];

$supports = $DB->get_records('support', []);

$templatecontext['theme_url'] = theme_url();
$templatecontext['base_url'] = "https://elearner.ghitbd.com/lms";
$templatecontext['root_url'] = $CFG->wwwroot;

$record3 =  $DB->get_records_sql('SELECT * FROM  lms_breadcrumbs ');

$templatecontext['show_heading'] = '';
foreach ($record3 as $record) {
  $templatecontext['show_heading'] .=  '    <section class="inner-header divider parallax" data-bg-img="'.theme_url().'/settings/uploads/'.$record->image_support.'">
  <div class="container pt-70 pb-20">
    <div class="section-content">
      <div class="row">
        <div class="col-md-12">
          <h2 class="title text-white text-center">'.$record->heading_support.'</h2>
          <ol class="breadcrumb text-left mt-10">
            <li><a href="#" class="text-white">Home</a></li>
            <li><a href="#" class="text-white">Pages</a></li>
            <li class="active text-white">'.$record->heading_support.'</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>';
}


$templatecontext['show_support'] = '';
foreach ($supports as $support) {
  $templatecontext['show_support'] .=  '<div class="col-md-8 col-md-offset-2">
  <h2 class="mt-0 line-height-1 text-center text-uppercase mb-10 text-black-333">'.$support->heading.'</h2>
  <p class="text-center">'.$support->description.'</p>
  </div>';
}



require_once(__DIR__ . '/../../../config.php');
global $DB;


if (isset($_POST['submitSupport'])) {

    $data = new stdClass();
    $data->email = $_POST["form_email"];
    $data->subject = $_POST["form_subject"];
    $data->message = $_POST["form_message"];
    $DB->insert_record('support_message', $data);
    $templatecontext['show_msg'] ="Email sent successfully!!!";
	}




echo $OUTPUT->render_from_template('theme_fordson/fronttemplate/support', $templatecontext);


