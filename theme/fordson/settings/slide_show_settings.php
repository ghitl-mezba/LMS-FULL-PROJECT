<?php
defined('MOODLE_INTERNAL') || die();
$page = new admin_settingpage('theme_fordson_slide', 'Slide Show');
$settings->add($page);

require_once(__DIR__ . '/../../../config.php');
global $DB;

$records = $DB->get_records('slide', []);

//$hit_url = "https://elearner.ghitbd.com/lms/theme/fordson/settings/";
$hit_url = theme_url() . '/settings/';

?>



<fieldset id="slide_form" style="display:none">

    <form action="<?php echo $hit_url ?>insert.php" method="post" enctype="multipart/form-data">
        <?php
        if (count($records) > 0) {
            $x = 1;
            foreach ($records as &$record) {
        ?>

                <div class="slide_form_field row" style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">
                    <input type="hidden" name="id[]" value="<?php echo $record->id; ?>">

                    <div class="col-md-10">
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Heading <span class="slide"><?php echo $x; ?>:</span></label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="heading[]" value="<?php echo $record->heading; ?>" class="form-control text-ltr" placeholder="Example: What are the outline of this training program?">
                                </div>
                            </div>
                        </div>

                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Title <span class="slide"><?php echo $x; ?>:</span></label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="title[]" value="<?php echo $record->title; ?>" class="form-control text-ltr" placeholder="Example: The speed of typing should be at least 20 wpm.">
                                </div>
                            </div>
                        </div>

                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Details <span class="slide"><?php echo $x; ?>:</span></label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <textarea name="details[]" cols="10" rows="5" cols="30" rows="5" class="form-control text-ltr" placeholder="Example: Describe about the service"><?php echo $record->details; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Image <span class="title"><?php echo $x; ?>:</span></label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="file" name="image[]" value="" class="text-ltr" onchange="ValidateSize(this)">
                                    <?php if ($record->image != 'NULL') { ?>
                                        <img src="<?php echo theme_url() . '/settings/uploads/' . $record->image; ?>" />
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Button text </label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="button_text[]" value="<?php echo $record->button_text; ?>" class="form-control text-ltr" placeholder="Example: Apply">

                                </div>
                            </div>
                        </div>

                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Button link </label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="button_link[]" value="<?php echo $record->button_link; ?>" class="form-control text-ltr" placeholder="Example: signup.php">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <br />
                        <button type="button" class="btn btn-danger removeSlideField" onclick="removeSlideField(<?php echo $record->id; ?>,this.id)" style="margin-top: 15px;"><i class="fa fa-trash"></i></button>
                    </div>
                </div>

            <?php
                $x++;
            }
        } else {
            ?>
            <div class="slide_form_field row" style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">

                <div class="col-md-10">
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Heading </label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="heading[]" value="" class="form-control text-ltr" placeholder="Example: What are the outline of this training program?">
                            </div>
                        </div>
                    </div>

                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Title </label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="title[]" value="" class="form-control text-ltr" placeholder="Example: The speed of typing should be at least 20 wpm.">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Details </label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <textarea name="details" cols="10" rows="5" cols="30" rows="5" class="form-control text-ltr" placeholder="Example: Describe organization's services"><?php echo $record->details; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Image </label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="file" name="image[]" value="" class="text-ltr" onchange="ValidateSize(this)" />
                            </div>
                        </div>
                    </div>

                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Button text </label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="button_text[]" value="" class="form-control text-ltr" placeholder="Example: Apply">
                            </div>
                        </div>
                    </div>

                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Button link </label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="button_link[]" value="" class="form-control text-ltr" placeholder="Example: signup.php">
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-md-2">
                    <br />
                    <button type="button" class="btn btn-danger removeSlideField" onclick="removeSlideField(0,this.id)" style="margin-top: 15px;"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="slide_form_body"></div>

        <br />
        <button type="button" class="btn btn-info addSlideField"><i class="fa fa-plus"></i> Add New Slide</button>
        <button type="submit" name="submitSlideButton" class="btn btn-success"><i class="fa fa-save"></i> Save Slide</button>
    </form>

    <form action="<?php echo $hit_url ?>delete.php" method="post" style="display:none;">
        <input type="text" name="deleteSlideId" id="deleteSlideId" value="0">
        <button type="submit" name="deleteSlide" id="deleteSlideBtn"></button>
    </form>

</fieldset>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        var url = window.location.href;
        // if (url == "http://localhost/lms/admin/settings.php?section=themesettingfordson#theme_fordson_slide") {
        // 	showDiv();
        // }
        if (url == "https://elearner.ghitbd.com/lms/admin/settings.php?section=themesettingfordson#theme_fordson_slide") {
            showDiv();
        };

        $(".addSlideField").click(function() {
            var copyRow = $('.slide_form_field:last').clone();
            copyRow.find('input').val('');
            copyRow.find('textarea').val('');
            copyRow.find(".removeSlideField").attr("onclick", "removeSlideField(0,this.id)");
            copyRow.find(".slide").html("");
            copyRow.appendTo('.slide_form_body:last');
        });

        /*$(".removeField").click(function() {
        	$(this).parent().parent('.form_field').remove();
        });*/

        $('a[href*="#theme_fordson_slide"]').click(function() {
            showDiv();
        });

        function showDiv() {
            $("#slide_form").appendTo($("#theme_fordson_slide"));
            $("#slide_form").css("display", "block");
            $(".btn-primary").css("display", "none");
        }

    });


    function removeSlideField(id, button_id) {
        var delId = $('#deleteSlideId').val(id);
        var divLen = $(".slide_form_field").length;
        if (id > 0) {
            $('#deleteSlideBtn').click();
        } else {
            if (divLen > 1) {
                $('#' + button_id).parent().parent('.slide_form_field').remove();
            }
        }

    }

    function ValidateSize(file) {
        var FileSize = file.files[0].size / 1024 / 1024; // in MB
        var allowed_extensions = new Array("jpg", "png", "gif");
        // console.log(file.files[0].);

        var file_extension = file.files[0].name.split('.').pop().toLowerCase(); // split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well. If there will be no extension then it will return the filename.
        if (FileSize > 2) {
            alert('File size exceeds 2 MB');
            $("#WorkWithUsButton").prop("disabled", true);
            $(this).focus();
            // $(file).val(''); //for clearing with Jquery
        } else if (allowed_extensions.indexOf(file_extension) == -1) {
            alert("JPG, PNG and GIF files are allowed to upload");
            $("#WorkWithUsButton").prop("disabled", true);
            // $(file).focus();
        } else {
            $("#WorkWithUsButton").prop("disabled", false);
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