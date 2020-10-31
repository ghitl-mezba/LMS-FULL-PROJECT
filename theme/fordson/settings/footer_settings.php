<?php


defined('MOODLE_INTERNAL') || die();

/* Social Network Settings */
$page = new admin_settingpage('theme_fordson_footer', 'Header & Footer');
$page->add(new admin_setting_heading('theme_fordson_footer', get_string('footerheadingsub', 'theme_fordson'), format_text(get_string('footerdesc', 'theme_fordson'), FORMAT_MARKDOWN)));

// footer branding
$name = 'theme_fordson/brandorganization';
$title = get_string('brandorganization', 'theme_fordson');
$description = get_string('brandorganizationdesc', 'theme_fordson');
$default = '';
// $setting = new admin_setting_configtext($name, $title, $description, $default);
$setting = new admin_setting_configtext($name, $title, '', '');

$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// footer branding
$name = 'theme_fordson/brandwebsite';
$title = get_string('brandwebsite', 'theme_fordson');
$description = get_string('brandwebsitedesc', 'theme_fordson');
$default = '';
$setting = new admin_setting_configtext($name, $title, '', $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// footer branding
$name = 'theme_fordson/brandphone';
$title = get_string('brandphone', 'theme_fordson');
$description = get_string('brandphonedesc', 'theme_fordson');
$default = '';
$setting = new admin_setting_configtext($name, $title, '', $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// footer branding
$name = 'theme_fordson/brandemail';
$title = get_string('brandemail', 'theme_fordson');
$description = get_string('brandemaildesc', 'theme_fordson');
$default = '';
$setting = new admin_setting_configtext($name, $title, '', $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);


// office time
$name = 'theme_fordson/office_time';
$title = 'Office Time';
//$description = get_string('brandemaildesc', 'theme_fordson');
$default = '';
$setting = new admin_setting_configtext($name, $title, '', $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// tag line
$name = 'theme_fordson/tag_line';
$title = 'Tag Line';
//$description = get_string('brandemaildesc', 'theme_fordson');
$default = '';
$setting = new admin_setting_configtext($name, $title, '', $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// office address
$name = 'theme_fordson/office_address';
$title = 'Office Address';
//$description = get_string('brandemaildesc', 'theme_fordson');
$default = '';
$setting = new admin_setting_configtext($name, $title, '', $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Footnote setting.
$name = 'theme_fordson/footnote';
$title = get_string('footnote', 'theme_fordson');
$description = get_string('footnotedesc', 'theme_fordson');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, '', $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for socialicons
$name = 'theme_fordson/socialiconsinfo';
$heading = get_string('footerheadingsocial', 'theme_fordson');
$information = get_string('footerdesc', 'theme_fordson');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);

// Website url setting.
$name = 'theme_fordson/website';
$title = get_string('website', 'theme_fordson');
$description = get_string('websitedesc', 'theme_fordson');
$default = '';
$setting = new admin_setting_configtext($name, $title, '', $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Blog url setting.
$name = 'theme_fordson/blog';
$title = get_string('blog', 'theme_fordson');
$description = get_string('blogdesc', 'theme_fordson');
$default = '';
$setting = new admin_setting_configtext($name, $title, '', $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Facebook url setting.
$name = 'theme_fordson/facebook';
$title = get_string('facebook', 'theme_fordson');
$description = get_string('facebookdesc', 'theme_fordson');
$default = '';
$setting = new admin_setting_configtext($name, $title, '', $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Twitter url setting.
$name = 'theme_fordson/twitter';
$title = get_string('twitter', 'theme_fordson');
$description = get_string('twitterdesc', 'theme_fordson');
$default = '';
$setting = new admin_setting_configtext($name, $title, '', $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Google+ url setting.
$name = 'theme_fordson/googleplus';
$title = get_string('googleplus', 'theme_fordson');
$description = get_string('googleplusdesc', 'theme_fordson');
$default = '';
$setting = new admin_setting_configtext($name, $title, '', $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// LinkedIn url setting.
$name = 'theme_fordson/linkedin';
$title = get_string('linkedin', 'theme_fordson');
$description = get_string('linkedindesc', 'theme_fordson');
$default = '';
$setting = new admin_setting_configtext($name, $title, '', $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Tumblr url setting.
$name = 'theme_fordson/tumblr';
$title = get_string('tumblr', 'theme_fordson');
$description = get_string('tumblrdesc', 'theme_fordson');
$default = '';
$setting = new admin_setting_configtext($name, $title, '', $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Pinterest url setting.
$name = 'theme_fordson/pinterest';
$title = get_string('pinterest', 'theme_fordson');
$description = get_string('pinterestdesc', 'theme_fordson');
$default = '';
$setting = new admin_setting_configtext($name, $title, '', $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Instagram url setting.
$name = 'theme_fordson/instagram';
$title = get_string('instagram', 'theme_fordson');
$description = get_string('instagramdesc', 'theme_fordson');
$default = '';
$setting = new admin_setting_configtext($name, $title, '', $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// YouTube url setting.
$name = 'theme_fordson/youtube';
$title = get_string('youtube', 'theme_fordson');
$description = get_string('youtubedesc', 'theme_fordson');
$default = '';
$setting = new admin_setting_configtext($name, $title, '', $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Vimeo url setting.
$name = 'theme_fordson/vimeo';
$title = get_string('vimeo', 'theme_fordson');
$description = get_string('vimeodesc', 'theme_fordson');
$default = '';
$setting = new admin_setting_configtext($name, $title, '', $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Skype url setting.
$name = 'theme_fordson/skype';
$title = get_string('skype', 'theme_fordson');
$description = get_string('skypedesc', 'theme_fordson');
$default = '';
$setting = new admin_setting_configtext($name, $title, '', $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);


$settings->add($page);

