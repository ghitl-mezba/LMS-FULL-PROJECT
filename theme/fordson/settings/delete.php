<?php
require_once(__DIR__ . '/../../../config.php');
global $DB;

// $go_url = "http://localhost/lms/admin/settings.php?section=themesettingfordson";
$go_url = "https://elearner.ghitbd.com/lms/admin/settings.php?section=themesettingfordson";

//who we are, what we do & work with us 
if (isset($_POST['deleteWhoWeAreBtn']) || isset($_POST['deleteWhatWeDoBtn']) || isset($_POST["deleteWorkWithUs"])) {
	if (isset($_POST['deleteWhoWeAreBtn'])) {
		$id = $_POST['deleteWhoWeAre'];
		$url_tab = "#theme_fordson_who_we_are";
	} else if (isset($_POST['deleteWhatWeDoBtn'])) {
		$id = $_POST['deleteWhatWeDo'];
		$url_tab = "#theme_fordson_what_we_do";
	} else {
		$id = $_POST['deleteWorkWithUs'];
		$url_tab = "#theme_fordson_work_with_us";
	}

	$delete = "delete from lms_about_org_details where about_org_details_id=" . $id;
	$DB->execute($delete, []);
	header("Location: $go_url" . $url_tab);
}

//Yead code start

//for Faq
if (isset($_POST['deleteFaq'])) {
	$id = $_POST['deleteFaqId'];
	if ($id) {
		$DB->delete_records('faq', array('id' => $id));
	}
	header("Location: $go_url#theme_fordson_faq");
}


//for Help Desk
if (isset($_POST['deleteHelpDesk'])) {
	$id = $_POST['deleteHelpDeskId'];
	if ($id) {
		$DB->delete_records('help_desk', array('id' => $id));
	}
	header("Location: $go_url#theme_fordson_help_desk");
}


//Yead code end

//for Slide
if (isset($_POST['deleteSlideId'])) {
	if ($_POST['deleteSlideId']) {
		$DB->delete_records('slide', array('id' => $_POST['deleteSlideId']));
	}
	header("Location: $go_url#theme_fordson_slide");
}
