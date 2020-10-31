<?php

require_once(__DIR__ . '/../../../config.php');
global $DB;

// $go_url = "http://localhost/lms/admin/settings.php?section=themesettingfordson";
$go_url = "https://elearner.ghitbd.com/lms/admin/settings.php?section=themesettingfordson";



//for breadcrumbs
if (isset($_POST['submitBreadcrumbsButton'])) {

	$target_dir = __DIR__ . '/uploads/';
	// var_dump($_FILES["image_who"]["name"]);
	// die();
	$data = new stdClass();
	for ($i = 0; $i < count($_POST['heading_who']); $i++) {
		$id = $_POST['id'][$i];

		$data->heading_who = $_POST["heading_who"][$i];
		$data->heading_what = $_POST["heading_what"][$i];
		$data->heading_work = $_POST["heading_work"][$i];
		$data->heading_contact = $_POST["heading_contact"][$i];

		if ($id)
			$exist = $DB->get_record_sql('SELECT * FROM {breadcrumbs} WHERE id=' . $id . '');

		if (!empty($_FILES["image_who"]["name"])) {
			$new_image_who = time() . '-' . $_FILES["image_who"]["name"];
			move_uploaded_file($_FILES["image_who"]["tmp_name"], $target_dir . $new_image_who);
			$data->image_who = $new_image_who;
			if ($id)
				unlink($target_dir . $exist->image_who);
		}
		if (!empty($_FILES["image_what"]["name"])) {
			$new_image_what = time() . '-' . $_FILES["image_what"]["name"];
			move_uploaded_file($_FILES["image_what"]["tmp_name"], $target_dir . $new_image_what);
			$data->image_what = $new_image_what;
			if ($id)
				unlink($target_dir . $exist->image_what);
		}
		if (!empty($_FILES["image_work"]["name"])) {
			$new_image_work = time() . '-' . $_FILES["image_work"]["name"];
			move_uploaded_file($_FILES["image_work"]["tmp_name"], $target_dir . $new_image_work);
			$data->image_work = $new_image_work;
			if ($id)
				unlink($target_dir . $exist->image_work);
		}
		if (!empty($_FILES["image_contact"]["name"])) {
			$new_image_contact = time() . '-' . $_FILES["image_contact"]["name"];
			move_uploaded_file($_FILES["image_contact"]["tmp_name"], $target_dir . $new_image_contact);
			$data->image_contact = $new_image_contact;
			if ($id)
				unlink($target_dir . $exist->image_contact);
		}


		if ($id) {
			$data->id = $_POST['id'][$i];
			$DB->update_record('breadcrumbs', $data, $bulk = false);
		} else {
			$DB->insert_record('breadcrumbs', $data);
		}
	}

	header("Location: $go_url#theme_fordson_breadcrumbs");
}




//for who we are save 
if (isset($_POST['WhoWeAreButton']) || isset($_POST['WhatWeDoButton']) || isset($_POST['WorkWithUsButton'])) {
	// var_dump($_FILES);
	// die();
	$data = new stdClass();
	$data->header_title = $_POST["heading_title"];
	$data->header_details = $_POST["heading_description"];
	// $target_dir = $CFG->wwwroot . '/theme/' . 'fordson/images/';
	$target_dir = __DIR__ . '/uploads/';
	if (isset($_POST["about_org_id"])) {
		$data->id = $_POST["about_org_id"];
		$update_sql = "update lms_about_org set header_title= '" . $_POST["heading_title"] . "',header_details= '" . $_POST["heading_description"] . "' where about_org_id =" . $_POST["about_org_id"];
		$DB->execute($update_sql, []);
	} else {
		$insert = "insert into lms_about_org(header_title,header_details,type) values('" . $_POST["heading_title"] . "','" . $_POST["heading_description"] . "','" . $_POST["type"] . "')";
		$DB->execute($insert, []);
	}
	for ($i = 0; $i < count($_POST['title']); $i++) {
		$data->title = $_POST["title"][$i];
		$data->description = $_POST["description"][$i];
		$data->year = $_POST["year"][$i];
		$about_org_details_id = $_POST['about_org_details_id'][$i];
		if ($about_org_details_id) {
			if (!empty($_FILES["image"]["name"][$i])) {
				$exist = $DB->get_record_sql('SELECT * FROM {about_org_details} WHERE about_org_details_id=' . $_POST["about_org_details_id"][$i]);
				unlink($target_dir . $exist->image);
				$new_file_name = time() . '-' . $_FILES["image"]["name"][$i];
				move_uploaded_file($_FILES["image"]["tmp_name"][$i], $target_dir . $new_file_name);
				$update_child = "update lms_about_org_details 
		    set title= '" . $_POST["title"][$i] . "',description = '" . $_POST["description"][$i] . "',image = '" . $new_file_name . "',year = '" . $_POST["year"][$i] . "' where about_org_details_id =" . $_POST["about_org_details_id"][$i];
			} else
				$update_child = "update lms_about_org_details 
				set title= '" . $_POST["title"][$i] . "',description = '" . $_POST["description"][$i] . "',year = '" . $_POST["year"][$i] . "' where about_org_details_id =" . $_POST["about_org_details_id"][$i];

			$DB->execute($update_child, []);
		} else {
			$data->type = $_POST["type"];
			if (isset($_FILES["image"]["name"][$i])) {
				$new_file_name = time() . '-' . $_FILES["image"]["name"][$i];
				move_uploaded_file($_FILES["image"]["tmp_name"][$i], $target_dir . $new_file_name);
				$data->image = $new_file_name;
			}
			if (!empty(($_POST["title"][$i]) && $_POST["description"][$i]))
				$DB->insert_record('about_org_details', $data);
		}
	}
	if (isset($_POST['WhoWeAreButton']))
		$url_tab = "#theme_fordson_who_we_are";
	else if (isset($_POST['WhatWeDoButton']))
		$url_tab = "#theme_fordson_what_we_do";
	else
		$url_tab = "#theme_fordson_work_with_us";

	header("Location: $go_url" . $url_tab);
}

//Yead code start

//for Help Desk
if (isset($_POST['submitHelpDeskButton'])) {

	$data = new stdClass();
	for ($i = 0; $i < count($_POST['icon']); $i++) {
		$data->icon = $_POST["icon"][$i];
		$data->icon_text = $_POST["icon_text"][$i];

		$id = $_POST['id'][$i];
		if ($id) {
			$exist = $DB->get_record_sql('SELECT * FROM {help_desk} WHERE id=' . $id . '');
			$data->id = $exist->id;
			$DB->update_record('help_desk', $data, $bulk = false);
		} else {
			if (!empty(($_POST["icon"][$i]) && $_POST["icon_text"][$i])) {
				$DB->insert_record('help_desk', $data);
			}
		}
	}
	header("Location: $go_url#theme_fordson_help_desk");
}


//for support
if (isset($_POST['submitSupportButton'])) {

	$data = new stdClass();
	for ($i = 0; $i < count($_POST['heading']); $i++) {
		$data->heading = $_POST["heading"][$i];
		$data->description = $_POST["description"][$i];
		$id = $_POST['id'][$i];
		if ($id) {
			$exist = $DB->get_record_sql('SELECT * FROM {support} WHERE id=' . $id . '');
			$data->id = $exist->id;
			$DB->update_record('support', $data, $bulk = false);
		} else {
			if (!empty(($_POST["heading"][$i]) && $_POST["description"][$i])) {
				$DB->insert_record('support', $data);
			}
		}
	}
	header("Location: $go_url#theme_fordson_support");
}


//for home
if (isset($_POST['submitHomeSettingButton'])) {

	$data = new stdClass();
	for ($i = 0; $i < count($_POST['mainheading1']); $i++) {
		$data->mainheading1 = $_POST["mainheading1"][$i];
		$data->subheading11 = $_POST["subheading11"][$i];
		$data->subheading12 = $_POST["subheading12"][$i];
		$data->subheading13 = $_POST["subheading13"][$i];
		$data->icon11 = $_POST["icon11"][$i];
		$data->icon12 = $_POST["icon12"][$i];
		$data->icon13 = $_POST["icon13"][$i];
		$data->description11 = $_POST["description11"][$i];
		$data->description12 = $_POST["description12"][$i];
		$data->description13 = $_POST["description13"][$i];

		$data->mainheading2 = $_POST["mainheading2"][$i];
		$data->subheading21 = $_POST["subheading21"][$i];
		$data->subheading22 = $_POST["subheading22"][$i];
		$data->subheading23 = $_POST["subheading23"][$i];
		$data->icon21 = $_POST["icon21"][$i];
		$data->icon22 = $_POST["icon22"][$i];
		$data->icon23 = $_POST["icon23"][$i];
		$data->description21 = $_POST["description21"][$i];
		$data->description22 = $_POST["description22"][$i];
		$data->description23 = $_POST["description23"][$i];

		$data->topheading1 = $_POST["topheading1"][$i];
		$data->topheading2 = $_POST["topheading2"][$i];
		$data->topdescription1 = $_POST["topdescription1"][$i];
		$data->topdescription2 = $_POST["topdescription2"][$i];
		$data->toplink1 = $_POST["toplink1"][$i];
		$data->toplink2 = $_POST["toplink2"][$i];


		$id = $_POST['id'][$i];


		if ($id) {
			$exist = $DB->get_record_sql('SELECT * FROM {home_setting} WHERE id=' . $id . '');
			$data->id = $exist->id;
			$DB->update_record('home_setting', $data, $bulk = false);
		} else {
			$DB->insert_record('home_setting', $data);
		}
	}
	header("Location: $go_url#theme_fordson_home_setting");
}

//faq save function
if (isset($_POST['submitFaqButton'])) {
	$data = new stdClass();
	$target_dir = __DIR__ . '/uploads/';
	for ($i = 0; $i < count($_POST['question']); $i++) {
		$data->question = $_POST["question"][$i];
		$data->answer = $_POST["answer"][$i];

		$id = $_POST['id'][$i];
		if ($id) {
			$exist = $DB->get_record_sql('SELECT * FROM {faq} WHERE id=' . $id . '');
			$data->id = $exist->id;
			$DB->update_record('faq', $data, $bulk = false);
		} else {
			if (!empty(($_POST["question"][$i]) && $_POST["answer"][$i])) {
				$DB->insert_record('faq', $data);
			}
		}
	}
	header("Location: $go_url#theme_fordson_faq");
}


//Yead code end


//slide save function
if (isset($_POST['submitSlideButton'])) {
	// echo "<pre>";
	// var_dump($_POST);
	// echo "</pre>";
	// die();
	$data = new stdClass();
	$target_dir = __DIR__ . '/uploads/';
	for ($i = 0; $i < count($_POST['title']); $i++) {
		$data->heading = $_POST["heading"][$i];
		$data->title = $_POST["title"][$i];
		$data->details = $_POST["details"][$i];
		$data->button_text = $_POST["button_text"][$i];
		$data->button_link = $_POST["button_link"][$i];


		$id = $_POST['id'][$i];
		if ($id) {
			if (!empty($_FILES["image"]["name"][$i])) {
				// echo 2;
				// echo "<br>";
				$exist = $DB->get_record_sql('SELECT * FROM {slide} WHERE id=' . $_POST["id"][$i]);
				// var_dump($exist);
				// die();
				if ($exist->image != null)
					unlink($target_dir . $exist->image);

				$new_file_name = time() . '-' . $_FILES["image"]["name"][$i];
				move_uploaded_file($_FILES["image"]["tmp_name"][$i], $target_dir . $new_file_name);
				// $data->image = $_FILES["image"]["name"][$i];
				$update = "update lms_slide set heading='" . $_POST["heading"][$i] . "', title='" . $_POST["title"][$i] . "',details='" . $_POST["details"][$i] . "',image='" . $new_file_name . "',button_text='" . $_POST["button_text"][$i] . "',button_link='" . $_POST["button_link"][$i] . "' WHERE id=" . $id;
			} else
				$update = "update lms_slide set heading='" . $_POST["heading"][$i] . "', title='" . $_POST["title"][$i] . "',details='" . $_POST["details"][$i] . "',button_text='" . $_POST["button_text"][$i] . "',button_link='" . $_POST["button_link"][$i] . "' WHERE id=" . $id;
			// echo $update . "<br>";
			// $data->id = $id;
			// // echo "<pre>";
			// // var_dump($data);
			// // echo "</pre>";
			// $DB->update_record('slide', $data, $bulk = false);
			$DB->execute($update, []);
		} else {
			// 
			if (!empty(($_POST["title"][$i]) && $_POST["details"][$i])) {
				if (!empty($_FILES["image"]["name"][$i])) {
					$new_file_name = time() . '-' . $_FILES["image"]["name"][$i];
					move_uploaded_file($_FILES["image"]["tmp_name"][$i], $target_dir . $new_file_name);
					$data->image = $new_file_name;
				}
				// echo "<pre>";
				// var_dump($data);
				// echo "</pre>";
				// die();
				$DB->insert_record('slide', $data);
			}
		}
	}
	// die();
	header("Location: $go_url#theme_fordson_slide");
}
