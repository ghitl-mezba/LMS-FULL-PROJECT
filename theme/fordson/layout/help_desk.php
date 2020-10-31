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

$help_desks = $DB->get_records('help_desk', []);

$templatecontext['theme_url'] = theme_url();
$templatecontext['base_url'] = "https://elearner.ghitbd.com/lms";
$templatecontext['root_url'] = $CFG->wwwroot;


$record3 =  $DB->get_records_sql('SELECT * FROM  lms_breadcrumbs ');

$templatecontext['show_heading'] = '';
foreach ($record3 as $record) {
  $templatecontext['show_heading'] .=  '    <section class="inner-header divider parallax" data-bg-img="'.theme_url().'/settings/uploads/'.$record->image_help_desk.'">
  <div class="container pt-70 pb-20">
    <div class="section-content">
      <div class="row">
        <div class="col-md-12">
          <h2 class="title text-white text-center">'.$record->heading_help_desk.'</h2>
          <ol class="breadcrumb text-left mt-10">
            <li><a href="#" class="text-white">Home</a></li>
            <li><a href="#" class="text-white">Pages</a></li>
            <li class="active text-white">'.$record->heading_help_desk.'</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>';
}


$templatecontext['show_help_desk'] = '';
$x=1;
foreach ($help_desks as $help_desk) {
  $templatecontext['show_help_desk'] .=  '<div class="col-md-4">
    <div class="help_sub_div">
        <i class="'.$help_desk->icon.'"></i>
        <p class="text-center">'.$help_desk->icon_text.'</p>
    </div>
  </div>';
  }


echo $OUTPUT->render_from_template('theme_fordson/fronttemplate/help_desk', $templatecontext);
?>
<style>
      .help_main_div{
          padding-top: 100px;
          padding-bottom: 100px;
      }
      .help_sub_div{
          padding: 50px;
          border: 1px solid #eee;
          transition: 1s;
          margin-bottom: 10px;
      }
      .help_sub_div i{
          font-size: 50px;
          text-align: center;
          display: block;
      }
      .help_sub_div p{
          font-size: 20px;
          text-align: center;
      }
      .help_sub_div:hover{
          background-color: #b9ff8d;
          transition: 1s;
      }
</style>

