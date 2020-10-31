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

$faqs = $DB->get_records('faq', []);

$templatecontext['theme_url'] = theme_url();
$templatecontext['base_url'] = "https://elearner.ghitbd.com/lms";
$templatecontext['root_url'] = $CFG->wwwroot;


$record3 =  $DB->get_records_sql('SELECT * FROM  lms_breadcrumbs ');

$templatecontext['show_heading'] = '';
foreach ($record3 as $record) {
  $templatecontext['show_heading'] .=  '    <section class="inner-header divider parallax" data-bg-img="'.theme_url().'/settings/uploads/'.$record->image_faq.'">
  <div class="container pt-70 pb-20">
    <div class="section-content">
      <div class="row">
        <div class="col-md-12">
          <h2 class="title text-white text-center">'.$record->heading_faq.'</h2>
          <ol class="breadcrumb text-left mt-10">
            <li><a href="#" class="text-white">Home</a></li>
            <li><a href="#" class="text-white">Pages</a></li>
            <li class="active text-white">'.$record->heading_faq.'</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>';
}

$templatecontext['show_faq'] = '';
foreach ($faqs as $faq) {
  $templatecontext['show_faq'] .=  '<div class="panel">
<div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion'.$faq->id.'" class="" aria-expanded="true"> <span class="open-sub"></span>'.$faq->question.'</a> </div>
<div id="accordion'.$faq->id.'" class="panel-collapse collapse" role="tablist" aria-expanded="true">
  <div class="panel-content">
<p>'.$faq->answer.'</p>
  </div>
</div>
</div>';
}


echo $OUTPUT->render_from_template('theme_fordson/fronttemplate/faqpage', $templatecontext);
?>

