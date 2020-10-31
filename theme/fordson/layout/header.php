<?php
	function site_url(){
		//return "http://localhost/lms/theme/fordson/layout/";
		return "https://elearner.ghitbd.com/lms/theme/fordson/layout/";
	}



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

defined('MOODLE_INTERNAL') || die();

$headerlogo = $PAGE->theme->setting_file_url('headerlogo', 'headerlogo');

echo $headerlogo;
die();
$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'headerlogo' => $headerlogo
];

$templatecontext['theme_url'] = theme_url();
$templatecontext['base_url'] = "https://elearner.ghitbd.com/lms";
$templatecontext['root_url'] = $CFG->wwwroot;
// echo "<pre>";
// var_dump($templatecontext);
// echo "</pre>";
// die();
echo $OUTPUT->render_from_template('theme_fordson/header', $templatecontext);

?>

<header id="header" class="header">
    <div class="header-top bg-theme-color-2 sm-text-center">
      <div class="container-fluid custom-container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="widget no-border m-0">
              <ul class="list-inline">
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-white"></i> <span class="text-white" href="#">+ 88 09678 690 690</span> </li>
                <li class="text-white m-0 pl-10 pr-10"> <i class="fa fa-clock-o text-white"></i> Sat-Thu 8:00am to 8:00pm </li>
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-white"></i> <span class="text-white" href="#">ghit@goldenharvestbd.com</span> </li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="widget no-border m-0">
              <ul class="list-inline text-right sm-text-center">
                <li>
                  <a href="<?php echo site_url(); ?>faqpage.php" class="text-white">FAQ</a>
                </li>
                <li class="text-white">|</li>
                <li>
                  <a href="<?php echo site_url(); ?>help_desk.php" class="text-white">Help Desk</a>
                </li>
                <li class="text-white">|</li>
                <li>
                  <a href="<?php echo site_url(); ?>support.php" class="text-white">Support</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
        <div class="container-fluid custom-container-fluid">
          <nav id="menuzord-right" class="menuzord default">
            <a class="menuzord-brand pull-left flip" href="#" style="margin-top:10px;">
              <img src="<?php echo base_url(); ?>images/logo-wide.png" alt="">
			  <span style="color: #199019;text-shadow: 0px 0px 1px #d5d816;font-size: 18px;">Shonirbhor Marching Towards Self-Reliance</span>
            </a>
            <ul class="menuzord-menu">
              <li><a href="#">HOME</a></li>
              <li><a href="<?php echo site_url(); ?>who_we_are.php">WHO WE ARE</a></li>
              <li><a href="<?php echo site_url(); ?>what_we_do.php">WHAT WE DO</a></li>
              <li><a href="<?php echo site_url(); ?>work_with_us.php">WORK WITH US</a></li>
              <li><a href="<?php echo site_url(); ?>contact.php">CONTACT</a></li>
              <li><a href="https://elearner.ghitbd.com/lms/login/signup.php" class="btn btn-success" style="margin-left: 10px;margin-right: 10px;color: #fff !important;border-radius:0px;"><i class="fa fa-edit"></i> REGISTER</a></li>
              <li><a href="https://elearner.ghitbd.com/lms/login/index.php" class="btn btn-dark" style="color: #fff !important;border-radius:0px;"><i class="fa fa-sign-in"></i> LOGIN</a></li>
            </ul>

          </nav>
        </div>
      </div>
    </div>
  </header>
  <style>
	.custom-container-fluid{
		padding-left: 100px;
		padding-right: 100px;
	}
  </style>
