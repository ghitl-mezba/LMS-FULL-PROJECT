<?php
defined('MOODLE_INTERNAL') || die();
$page = new admin_settingpage('theme_fordson_faq', 'FAQ');
$settings->add($page);

require_once(__DIR__ . '/../../../config.php');
global $DB;

$records = $DB->get_records('faq', []);

//$hit_url = "https://elearner.ghitbd.com/lms/theme/fordson/settings/";
$hit_url = theme_url() . '/settings/';

?>



<fieldset id="faq_form" style="display:none">

	<form action="<?php echo $hit_url ?>insert.php" method="post">
		<?php
		if (count($records) > 0) {
			$x = 1;
			foreach ($records as &$record) {
		?>

				<div class="faq_form_field row" style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">
					<input type="hidden" name="id[]" value="<?php echo $record->id; ?>">

					<div class="col-md-10">
						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>Question <span class="questionNo"><?php echo $x; ?>:</span></label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="text" name="question[]" value="<?php echo $record->question; ?>" class="form-control text-ltr" placeholder="Example: What are the outline of this training program?">
								</div>
							</div>
						</div>

						<div class="form-item row">
							<div class="form-label col-sm-3 text-sm-right">
								<label>Answer <span class="questionNo"><?php echo $x; ?>:</span></label>
							</div>
							<div class="form-setting col-sm-9">
								<div class="form-text defaultsnext">
									<input type="text" name="answer[]" value="<?php echo $record->answer; ?>" class="form-control text-ltr" placeholder="Example: The speed of typing should be at least 20 wpm.">
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-2">
						<br />
						<button type="button" class="btn btn-danger removeFaqField" onclick="removeFaqField(<?php echo $record->id; ?>,this.id)" style="margin-top: 15px;"><i class="fa fa-trash"></i></button>
					</div>
				</div>

			<?php
				$x++;
			}
		} else {
			?>
			<div class="faq_form_field row" style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">

				<div class="col-md-10">
					<div class="form-item row">
						<div class="form-label col-sm-3 text-sm-right">
							<label>Question </label>
						</div>
						<div class="form-setting col-sm-9">
							<div class="form-text defaultsnext">
								<input type="text" name="question[]" value="" class="form-control text-ltr" placeholder="Example: What are the outline of this training program?">
							</div>
						</div>
					</div>

					<div class="form-item row">
						<div class="form-label col-sm-3 text-sm-right">
							<label>Answer </label>
						</div>
						<div class="form-setting col-sm-9">
							<div class="form-text defaultsnext">
								<input type="text" name="answer[]" value="" class="form-control text-ltr" placeholder="Example: The speed of typing should be at least 20 wpm.">
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-2">
					<br />
					<button type="button" class="btn btn-danger removeFaqField" onclick="removeFaqField(0,this.id)" style="margin-top: 15px;"><i class="fa fa-trash"></i></button>
				</div>
			</div>
		<?php
		}
		?>
		<div class="faq_form_body"></div>

		<br />
		<button type="button" class="btn btn-info addFaqField"><i class="fa fa-plus"></i> Add New Question</button>
		<button type="submit" name="submitFaqButton" class="btn btn-success"><i class="fa fa-save"></i> Save FAQ Question</button>
	</form>

	<form action="<?php echo $hit_url ?>delete.php" method="post" style="display:none;">
		<input type="text" name="deleteFaqId" id="deleteFaqId" value="0">
		<button type="submit" name="deleteFaq" id="deleteFaqBtn"></button>
	</form>

</fieldset>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	/*setTimeout(function() {
		$('a[href*="#theme_fordson_faq"]').addClass("faqClick");
		$("#faq_form").appendTo($("#theme_fordson_faq"));
		$("#faq_form").css("display", "block");

	}, 300);*/

	$(document).ready(function() {

		// var base_url = "http://localhost/lms/theme/fordson/settings/";
		var url = window.location.href;
		// if (url == "http://localhost/lms/admin/settings.php?section=themesettingfordson#theme_fordson_faq") {
		// 	showDiv();
		// }
		if (url == "https://elearner.ghitbd.com/lms/admin/settings.php?section=themesettingfordson#theme_fordson_faq") {
			showDiv();
		};

		$(".addFaqField").click(function() {
			var copyRow = $('.faq_form_field:last').clone();
			copyRow.find('input').val('');
			copyRow.find(".removeFaqField").attr("onclick", "removeFaqField(0,this.id)");
			copyRow.find(".questionNo").html("");
			copyRow.appendTo('.faq_form_body:last');
		});

		/*$(".removeField").click(function() {
			$(this).parent().parent('.form_field').remove();
		});*/

		$('a[href*="#theme_fordson_faq"]').click(function() {
			showDiv();
		});

		function showDiv() {
			$("#faq_form").appendTo($("#theme_fordson_faq"));
			$("#faq_form").css("display", "block");
			$(".btn-primary").css("display", "none");
		}

	});


	function removeFaqField(id, button_id) {
		var delId = $('#deleteFaqId').val(id);
		var divLen = $(".faq_form_field").length;
		if (id > 0) {
			$('#deleteFaqBtn').click();
		} else {
			if (divLen > 1) {
				$('#' + button_id).parent().parent('.faq_form_field').remove();
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