<?php
require_once(__DIR__ . '/../../../config.php');

$bodyattributes = $OUTPUT->body_attributes();
$hasslideshowpages = (isset($PAGE->theme->settings->slideshowpages) && ($PAGE->theme->settings->slideshowpages == 0 || $PAGE->theme->settings->slideshowpages == 2)) !== false;
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



$record1 =  $DB->get_records_sql('SELECT * FROM  lms_about_org where  lms_about_org.type = 2');
$record2 =  $DB->get_records_sql('SELECT * FROM  lms_about_org_details where lms_about_org_details.type = 2 ');

$templatecontext['show_what_we_do1'] = '';
$templatecontext['show_what_we_do2'] = '';


$record3 =  $DB->get_records_sql('SELECT * FROM  lms_breadcrumbs ');

$templatecontext['show_heading'] = '';
foreach ($record3 as $record) {
  $templatecontext['show_heading'] .=  '    <section class="inner-header divider parallax" data-bg-img="' . theme_url() . '/settings/uploads/' . $record->image_what . '">
  <div class="container pt-70 pb-20">
    <div class="section-content">
      <div class="row">
        <div class="col-md-12">
          <h2 class="title text-white text-center">' . $record->heading_what . '</h2>
          <ol class="breadcrumb text-left mt-10">
            <li><a href="#" class="text-white">Home</a></li>
            <li><a href="#" class="text-white">Pages</a></li>
            <li class="active text-white">' . $record->heading_what . '</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>';
}

$y = 1;

foreach ($record1 as $record) {
  if ($y == 1) {
    $templatecontext['show_what_we_do1'] .=  '<div class="row mt-50">
      <div class="col-md-12 mt-20">
        <h3 class="text-uppercase text-center text-theme-colored font-weight-600 letter-space-2 mt-5">' . $record->header_title . '</h3>
        <p class="text-center">' . $record->header_details . '</p>
      </div>
    </div>';
    $y++;
  }
}

foreach ($record2 as $record) {
  $templatecontext['show_what_we_do2'] .=  '<div class="item">
  <div class="project mb-30 border-2px">
    <div class="thumb">
      <img class="img-fullwidth" alt="" src="">
    </div>
    <div class="project-details p-15 pt-10 pb-10">
    <img src="' . theme_url() . '/settings/uploads/' . $record->image . '">
      <h4 class="font-weight-700 text-uppercase mt-0">' . $record->title . '</h4>
      <p>' . $record->description . '</p>
    </div>
  </div>
</div>';
}


echo $OUTPUT->render_from_template('theme_fordson/fronttemplate/what_we_do', $templatecontext);
