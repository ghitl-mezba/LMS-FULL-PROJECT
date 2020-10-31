<?php
defined('MOODLE_INTERNAL') || die();
$page = new admin_settingpage('theme_fordson_breadcrumbs', 'Breadcrumbs');
$settings->add($page);

require_once(__DIR__ . '/../../../config.php');
global $DB;

$records = $DB->get_records('breadcrumbs', []);
$hit_url = theme_url() . '/settings/';
//$hit_url = "https://elearner.ghitbd.com/lms/theme/fordson/settings/";


?>



<fieldset id="breadcrumbs_form" style="display:none">

	<form action="<?php echo $hit_url ?>insert.php" method="post" enctype="multipart/form-data">
		<?php
		if (count($records) > 0) {
			foreach ($records as &$record) {
		?>
				<div class="breadcrumbs_form_field row" style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">
					<input type="hidden" name="id[]" value="<?php echo $record->id; ?>">
					<div class="col-md-10">

					
						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>Who we are page heading</label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="text" name="heading_who[]" value="<?php echo $record->heading_who; ?>" class="form-control text-ltr" placeholder="Example: Who we are">
								</div>
							</div>
						</div>
						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>Who we are page heading image</label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="file" name="image_who" class="text-ltr">
									<?php if ($record->image_who != NULL) { ?>
										<img src="<?php echo theme_url() . '/settings/uploads/' . $record->image_who; ?>" />
									<?php } ?>
								</div>
							</div>
						</div>


						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>What we do page heading</label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="text" name="heading_what[]" value="<?php echo $record->heading_what; ?>" class="form-control text-ltr" placeholder="Example: What we do">
								</div>
							</div>
						</div>
						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>What we do page image</label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="file" name="image_what" class="text-ltr">
									<?php if ($record->image_what != NULL) { ?>
										<img src="<?php echo theme_url() . '/settings/uploads/' . $record->image_what; ?>" />
									<?php } ?>


								</div>
							</div>
						</div>


						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>Work with us page heading</label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="text" name="heading_work[]" value="<?php echo $record->heading_work; ?>" class="form-control text-ltr" placeholder="Example: Work with us">
								</div>
							</div>
						</div>
						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>Work with us page image</label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="file" name="image_work" class="text-ltr">
									<?php if ($record->image_work != NULL) { ?>
										<img src="<?php echo theme_url() . '/settings/uploads/' . $record->image_work; ?>" />
									<?php } ?>
								</div>
							</div>
						</div>


						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>Contact page heading</label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="text" name="heading_contact[]" value="<?php echo $record->heading_contact; ?>" class="form-control text-ltr" placeholder="Example: Contact">
								</div>
							</div>
						</div>
						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>Contact page image</label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="file" name="image_contact" class="text-ltr">
									<?php if ($record->image_contact != NULL) { ?>
										<img src="<?php echo theme_url() . '/settings/uploads/' . $record->image_contact; ?>" />
									<?php } ?>

								</div>
							</div>
						</div>


						<!-- faq page -->
						
						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>FAQ page heading</label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="text" name="heading_faq[]" value="<?php echo $record->heading_faq; ?>" class="form-control text-ltr" placeholder="Example: FAQ">
								</div>
							</div>
						</div>
						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>FAQ page heading image</label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="file" name="image_faq" class="text-ltr">
									<?php if ($record->image_faq != NULL) { ?>
										<img src="<?php echo theme_url() . '/settings/uploads/' . $record->image_faq; ?>" />
									<?php } ?>
								</div>
							</div>
						</div>

						<!-- help_desk -->

						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>Help Desk page heading</label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="text" name="heading_help_desk[]" value="<?php echo $record->heading_help_desk; ?>" class="form-control text-ltr" placeholder="Example: Help Desk">
								</div>
							</div>
						</div>
						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>Help Desk page heading image</label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="file" name="image_help_desk" class="text-ltr">
									<?php if ($record->image_help_desk != NULL) { ?>
										<img src="<?php echo theme_url() . '/settings/uploads/' . $record->image_help_desk; ?>" />
									<?php } ?>
								</div>
							</div>
						</div>

						<!-- support -->

						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>Support page heading</label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="text" name="heading_support[]" value="<?php echo $record->heading_support; ?>" class="form-control text-ltr" placeholder="Example: Support">
								</div>
							</div>
						</div>
						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>Support page heading image</label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="file" name="image_support" class="text-ltr">
									<?php if ($record->image_support != NULL) { ?>
										<img src="<?php echo theme_url() . '/settings/uploads/' . $record->image_support; ?>" />
									<?php } ?>
								</div>
							</div>
						</div>


					</div>
				</div>
			<?php
			}
		} else {
			?>
			<div class="support_form_field row" style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">

				<div class="col-md-10">
					<div class="form-item row">
						<div class="form-label col-sm-3 text-sm-right">
							<label>Who we are page heading</label>
						</div>
						<div class="form-setting col-sm-9">
							<div class="form-text defaultsnext">
								<input type="text" name="heading_who[]" value="" class="form-control text-ltr" placeholder="Example: Who we are">
							</div>
						</div>
					</div>
					<div class="form-item row">
						<div class="form-label col-sm-3 text-sm-right">
							<label>Who we are page heading image</label>
						</div>
						<div class="form-setting col-sm-9">
							<div class="form-text defaultsnext">
								<input type="file" name="image_who" class="text-ltr">
							</div>
						</div>
					</div>


					<div class="form-item row">
						<div class="form-label col-sm-3 text-sm-right">
							<label>What we do page heading</label>
						</div>
						<div class="form-setting col-sm-9">
							<div class="form-text defaultsnext">
								<input type="text" name="heading_what[]" value="" class="form-control text-ltr" placeholder="Example: What we do">
							</div>
						</div>
					</div>
					<div class="form-item row">
						<div class="form-label col-sm-3 text-sm-right">
							<label>What we do page image</label>
						</div>
						<div class="form-setting col-sm-9">
							<div class="form-text defaultsnext">
								<input type="file" name="image_what" class="text-ltr">
							</div>
						</div>
					</div>
					<div class="form-item row">
						<div class="form-label col-sm-3 text-sm-right">
							<label>Work with us page heading</label>
						</div>
						<div class="form-setting col-sm-9">
							<div class="form-text defaultsnext">
								<input type="text" name="heading_work[]" value="" class="form-control text-ltr" placeholder="Example: Work with us">
							</div>
						</div>
					</div>
					<div class="form-item row">
						<div class="form-label col-sm-3 text-sm-right">
							<label>Work with us page image</label>
						</div>
						<div class="form-setting col-sm-9">
							<div class="form-text defaultsnext">
								<input type="file" name="image_work" class="text-ltr">
							</div>
						</div>
					</div>
					<div class="form-item row">
						<div class="form-label col-sm-3 text-sm-right">
							<label>Contact page heading</label>
						</div>
						<div class="form-setting col-sm-9">
							<div class="form-text defaultsnext">
								<input type="text" name="heading_contact[]" value="" class="form-control text-ltr" placeholder="Example: Contact">
							</div>
						</div>
						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>Contact page image</label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="file" name="image_contact" class="text-ltr">
								</div>
							</div>
						</div>
					</div>

					<!-- faq -->

					<div class="form-item row">
						<div class="form-label col-sm-3 text-sm-right">
							<label>FAQ page heading</label>
						</div>
						<div class="form-setting col-sm-9">
							<div class="form-text defaultsnext">
								<input type="text" name="heading_faq[]" value="" class="form-control text-ltr" placeholder="Example: FAQ">
							</div>
						</div>
					</div>
					<div class="form-item row">
						<div class="form-label col-sm-3 text-sm-right">
							<label>FAQ page heading image</label>
						</div>
						<div class="form-setting col-sm-9">
							<div class="form-text defaultsnext">
								<input type="file" name="image_faq" class="text-ltr">
							</div>
						</div>
					</div>

					<!-- help_desk -->

					<div class="form-item row">
						<div class="form-label col-sm-3 text-sm-right">
							<label>Help Desk page heading</label>
						</div>
						<div class="form-setting col-sm-9">
							<div class="form-text defaultsnext">
								<input type="text" name="heading_help_desk[]" value="" class="form-control text-ltr" placeholder="Example: Help Desk">
							</div>
						</div>
					</div>
					<div class="form-item row">
						<div class="form-label col-sm-3 text-sm-right">
							<label>Help Desk page heading image</label>
						</div>
						<div class="form-setting col-sm-9">
							<div class="form-text defaultsnext">
								<input type="file" name="image_help_desk" class="text-ltr">
							</div>
						</div>
					</div>

					<!-- support -->

					<div class="form-item row">
						<div class="form-label col-sm-3 text-sm-right">
							<label>Support page heading</label>
						</div>
						<div class="form-setting col-sm-9">
							<div class="form-text defaultsnext">
								<input type="text" name="heading_support[]" value="" class="form-control text-ltr" placeholder="Example: Support">
							</div>
						</div>
					</div>
					<div class="form-item row">
						<div class="form-label col-sm-3 text-sm-right">
							<label>Support page heading image</label>
						</div>
						<div class="form-setting col-sm-9">
							<div class="form-text defaultsnext">
								<input type="file" name="image_support" class="text-ltr">
							</div>
						</div>
					</div>

				</div>
			</div>
		<?php
		}
		?>
		<div class="breadcrumbs_form_body"></div>

		<br />
		<button type="submit" name="submitBreadcrumbsButton" class="btn btn-success"><i class="fa fa-save"></i> Save Breadcrumbs</button>
	</form>



</fieldset>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	$(document).ready(function() {

		//var base_url = "http://localhost/lms/theme/fordson/settings/";
		//var base_url = "https://elearner.ghitbd.com/lms/theme/fordson/settings/";
		var url = window.location.href;
		// if (url == "http://localhost:81/lms/admin/settings.php?section=themesettingfordson#theme_fordson_breadcrumbs") {
		// 	showDiv();
		// };
		if (url == "https://elearner.ghitbd.com/lms/admin/settings.php?section=themesettingfordson#theme_fordson_breadcrumbs") {
			showDiv();
		};



		$('a[href*="#theme_fordson_breadcrumbs"]').click(function() {
			showDiv();
		});

		function showDiv() {
			$("#breadcrumbs_form").appendTo($("#theme_fordson_breadcrumbs"));
			$("#breadcrumbs_form").css("display", "block");
			$(".btn-primary").css("display", "none");
		}

	});
</script>

<style>
	textarea {
		resize: none !important;
	}

	.form-item {
		margin-top: 10px;
	}

	label {
		margin-top: 7px;
	}
</style>