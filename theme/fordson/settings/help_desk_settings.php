<?php
defined('MOODLE_INTERNAL') || die();
$page = new admin_settingpage('theme_fordson_help_desk', 'Help Desk');
$settings->add($page);

require_once(__DIR__ . '/../../../config.php');
global $DB;

$records = $DB->get_records('help_desk', []);

//$hit_url = "https://elearner.ghitbd.com/lms/theme/fordson/settings/";
$hit_url = theme_url() . '/settings/';


?>



<fieldset id="help_desk_form" style="display:none">

	<form action="<?php echo $hit_url ?>insert.php" method="post">
		<?php
		if (count($records) > 0) {
			$x = 1;
			foreach ($records as &$record) {
		?>

				<div class="help_desk_form_field row" style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">
					<input type="hidden" name="id[]" value="<?php echo $record->id; ?>">

					<div class="col-md-10">
						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>Icon <span class="iconNo"><?php echo $x; ?>:</span></label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="text" name="icon[]" value="<?php echo $record->icon; ?>" class="form-control text-ltr" placeholder="Example: fa fa-phone">
								</div>
							</div>
						</div>

						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>Icon Text <span class="iconNo"><?php echo $x; ?>:</span></label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="text" name="icon_text[]" value="<?php echo $record->icon_text; ?>" class="form-control text-ltr" placeholder="Example: this is a phone.">
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-2">
						<br />
						<button type="button" class="btn btn-danger removeHelpDeskField" onclick="removeHelpDeskField(<?php echo $record->id; ?>,this.id)" style="margin-top: 15px;"><i class="fa fa-trash"></i></button>
					</div>
				</div>

			<?php
				$x++;
			}
		} else {
			?>
			<div class="help_desk_form_field row" style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">

				<div class="col-md-10">
					<div class="form-item row">
						<div class="form-label col-sm-3 text-sm-right">
							<label>Icon </label>
						</div>
						<div class="form-setting col-sm-9">
							<div class="form-text defaultsnext">
								<input type="text" name="icon[]" value="" class="form-control text-ltr" placeholder="Example: fa fa-phone">
							</div>
						</div>
					</div>

					<div class="form-item row">
						<div class="form-label col-sm-3 text-sm-right">
							<label>Icon Text </label>
						</div>
						<div class="form-setting col-sm-9">
							<div class="form-text defaultsnext">
								<input type="text" name="icon_text[]" value="" class="form-control text-ltr" placeholder="Example: This is a phone">
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-2">
					<br />
					<button type="button" class="btn btn-danger removeHelpDeskField" onclick="removeHelpDeskField(0,this.id)" style="margin-top: 15px;"><i class="fa fa-trash"></i></button>
				</div>
			</div>
		<?php
		}
		?>
		<div class="help_desk_form_body"></div>

		<br />
		<button type="button" class="btn btn-info addHelpDeskField"><i class="fa fa-plus"></i> Add New Icon & Text</button>
		<button type="submit" name="submitHelpDeskButton" class="btn btn-success"><i class="fa fa-save"></i> Save Help Desk Setting</button>
	</form>

	<form action="<?php echo $hit_url ?>delete.php" method="post" style="display:none;">
		<input type="text" name="deleteHelpDeskId" id="deleteHelpDeskId" value="0">
		<button type="submit" name="deleteHelpDesk" id="deleteHelpDeskBtn"></button>
	</form>

</fieldset>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	$(document).ready(function() {

		// var base_url = "http://localhost/lms/theme/fordson/settings/";
		var url = window.location.href;
		// if (url == "http://localhost/lms/admin/settings.php?section=themesettingfordson#theme_fordson_help_desk") {
		// showDiv();
		// }
		if (url == "https://elearner.ghitbd.com/lms/admin/settings.php?section=themesettingfordson#theme_fordson_help_desk") {
			showDiv();
		};

		$(".addHelpDeskField").click(function() {
			var copyRow = $('.help_desk_form_field:last').clone();
			copyRow.find('input').val('');
			copyRow.find(".removeHelpDeskField").attr("onclick", "removeHelpDeskField(0,this.id)");
			copyRow.find(".iconNo").html("");
			copyRow.appendTo('.help_desk_form_body:last');
		});

		/*$(".removeField").click(function() {
		$(this).parent().parent('.form_field').remove();
		});*/

		$('a[href*="#theme_fordson_help_desk"]').click(function() {
			showDiv();
		});

		function showDiv() {
			$("#help_desk_form").appendTo($("#theme_fordson_help_desk"));
			$("#help_desk_form").css("display", "block");
			$(".btn-primary").css("display", "none");
		}

	});


	function removeHelpDeskField(id, button_id) {
		var delId = $('#deleteHelpDeskId').val(id);
		var divLen = $(".help_desk_form_field").length;
		if (id > 0) {
			$('#deleteHelpDeskBtn').click();
		} else {
			if (divLen > 1) {
				$('#' + button_id).parent().parent('.help_desk_form_field').remove();
			}
		}

	}
</script>

<style>
	.form-item {
		margin-top: 10px;
	}

	label {
		margin-top: 7px;
	}
</style>