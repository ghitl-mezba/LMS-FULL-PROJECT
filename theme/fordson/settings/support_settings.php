<?php
defined('MOODLE_INTERNAL') || die();
$page = new admin_settingpage('theme_fordson_support', 'Support');
$settings->add($page);

require_once(__DIR__ . '/../../../config.php');
global $DB;

$records = $DB->get_records('support', []);

//$hit_url = "https://elearner.ghitbd.com/lms/theme/fordson/settings/";
$hit_url = theme_url() . '/settings/';


?>



<fieldset id="support_form" style="display:none">

	<form action="<?php echo $hit_url ?>insert.php" method="post">
		<?php
		if (count($records) > 0) {
			foreach ($records as &$record) {
		?>
				<div class="support_form_field row" style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">
					<input type="hidden" name="id[]" value="<?php echo $record->id; ?>">
					<div class="col-md-10">
						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>Heading </label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="text" name="heading[]" value="<?php echo $record->heading; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
								</div>
							</div>
						</div>
						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>Description </label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="text" name="description[]" value="<?php echo $record->description; ?>" class="form-control text-ltr" placeholder="Example: this is how we will support you.">
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
							<label>Heading </label>
						</div>
						<div class="form-setting col-sm-9">
							<div class="form-text defaultsnext">
								<input type="text" name="heading" value="" class="form-control text-ltr" placeholder="Example: What kind of support you need?">
							</div>
						</div>
					</div>

					<div class="form-item row">
						<div class="form-label col-sm-3 text-sm-right">
							<label>Description </label>
						</div>
						<div class="form-setting col-sm-9">
							<div class="form-text defaultsnext">
								<input type="text" name="description" value="" class="form-control text-ltr" placeholder="Example: TThis is how we will support you.">
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
		}
		?>
		<div class="support_form_body"></div>

		<br />
		<button type="submit" name="submitSupportButton" class="btn btn-success"><i class="fa fa-save"></i> Save Support Setting</button>
	</form>



</fieldset>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	$(document).ready(function() {

		// var base_url = "http://localhost/lms/theme/fordson/settings/";
		var url = window.location.href;
		// if (url == "http://localhost/lms/admin/settings.php?section=themesettingfordson#theme_fordson_support") {
		// 	showDiv();
		// };

		if (url == "https://elearner.ghitbd.com/lms/admin/settings.php?section=themesettingfordson#theme_fordson_support") {
			showDiv();
		}

		$('a[href*="#theme_fordson_support"]').click(function() {
			showDiv();
		});

		function showDiv() {
			$("#support_form").appendTo($("#theme_fordson_support"));
			$("#support_form").css("display", "block");
			$(".btn-primary").css("display", "none");
		}

	});
</script>

<style>
	.form-item {
		margin-top: 10px;
	}

	label {
		margin-top: 7px;
	}
</style>