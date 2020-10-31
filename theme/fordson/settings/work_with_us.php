<?php
defined('MOODLE_INTERNAL') || die();
$page = new admin_settingpage('theme_fordson_work_with_us', 'Work With Us');
$settings->add($page);

require_once(__DIR__ . '/../../../config.php');
global $DB;
$records =  $DB->get_records_sql('SELECT * FROM  lms_about_org_details,lms_about_org where lms_about_org_details.type = 3 and lms_about_org.type = 3');
$key = array_keys($records);
// $hit_url = theme_url() . '/settings/';
$hit_url = "https://elearner.ghitbd.com/lms/theme/fordson/settings/";

?>



<fieldset id="work_with_us_form" style="display:none">

    <form action="<?php echo $hit_url ?>insert.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="type" value="3">

        <div style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">
            <?php
            if (count($records) > 0) {
                $x = 1;
            ?>
                <input type="hidden" name="about_org_id" value="<?php echo $records[$key[0]]->about_org_id; ?>">
                <div class="col-md-9" style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Heading Title </label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="heading_title" value="<?php echo $records[$key[0]]->header_title; ?>" class="form-control text-ltr" placeholder="Example: Why will you work with us?">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Heading Description </label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <textarea name="heading_description" cols="10" rows="5" cols="30" rows="5" class="form-control text-ltr" placeholder="Example: Describe why client choose you?"><?php echo $records[$key[0]]->header_details; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10" style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">

                    <?php
                    foreach ($records as &$record) {
                    ?>


                        <div class="work_with_us_form_field row" style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">
                            <input type="hidden" name="about_org_details_id[]" value="<?php echo $record->about_org_details_id; ?>">

                            <div class="col-md-10">
                                <div class="form-item row">
                                    <div class="form-label col-sm-3 text-sm-right">
                                        <label>Title <span class="work-with-us"><?php echo $x; ?>:</span></label>
                                    </div>
                                    <div class="form-setting col-sm-9">
                                        <div class="form-text defaultsnext">
                                            <input type="text" name="title[]" value="<?php echo $record->title; ?>" class="form-control text-ltr" placeholder="Example: German language">
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
                                            <?php if ($record->image != NULL) { ?>
                                                <img src="<?php echo theme_url() . '/settings/uploads/' . $record->image; ?>" />
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-item row">
                                    <div class="form-label col-sm-3 text-sm-right">
                                        <label>Description <span class="work-with-us"><?php echo $x; ?>:</span></label>
                                    </div>
                                    <div class="form-setting col-sm-9">
                                        <div class="form-text defaultsnext">
                                            <textarea name="description[]" cols="10" rows="5" cols="30" rows="5" class="form-control text-ltr" placeholder="Example: Extracting German language is a key feature role for us"><?php echo $record->description; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-2">
                                <br />
                                <button type="button" class="btn btn-danger removeWorkWithUs" onclick="removeWorkWithUs(<?php echo $record->about_org_details_id; ?>,this.id)" style="margin-top: 15px;"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>

                    <?php
                        $x++;
                    }
                } else {
                    ?>
                    <div class="col-md-10">
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Heading Title </label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="heading_title" value="" class="form-control text-ltr" placeholder="Example: Why will you work with us?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Heading Details </label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <textarea name="heading_description" cols="30" rows="5" class="form-control text-ltr" placeholder="Example: Describe why client choose you?"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="work_with_us_form_field row" style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">

                        <div class="col-md-10">
                            <div class="form-item row">
                                <div class="form-label col-sm-3 text-sm-right">
                                    <label>Title </label>
                                </div>
                                <div class="form-setting col-sm-9">
                                    <div class="form-text defaultsnext">
                                        <input type="text" name="title[]" value="" class="form-control text-ltr" placeholder="Example: German language">
                                    </div>
                                </div>
                            </div>

                            <div class="form-item row">
                                <div class="form-label col-sm-3 text-sm-right">
                                    <label>Image</label>
                                </div>
                                <div class="form-setting col-sm-9">
                                    <div class="form-text defaultsnext">
                                        <input type="file" name="image[]" value="" class="text-ltr" onchange="ValidateSize(this)">
                                    </div>
                                </div>
                            </div>

                            <div class="form-item row">
                                <div class="form-label col-sm-3 text-sm-right">
                                    <label>Description </label>
                                </div>
                                <div class="form-setting col-sm-9">
                                    <div class="form-text defaultsnext">
                                        <textarea name="description[]" cols="10" rows="5" cols="30" rows="5" class="form-control text-ltr" placeholder="Example: Extracting German language is a key feature role for us"></textarea>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-2">
                            <br />
                            <button type="button" class="btn btn-danger removeWorkWithUs" onclick="removeWorkWithUs(0,this.id)" style="margin-top: 15px;"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="work_with_us_form_body"></div>

                <br />
                <button type="button" class="btn btn-info addWorkWithUs"><i class="fa fa-plus"></i> Add New</button>
                <button type="submit" name="WorkWithUsButton" id="WorkWithUsButton" class="btn btn-success"><i class="fa fa-save"></i> Save Work With Us</button>
    </form>

    <form action="<?php echo $hit_url ?>delete.php" method="post" style="display:none;">
        <input type="text" name="deleteWorkWithUs" id="deleteWorkWithUs" value="0">
        <button type="submit" name="deleteWorkWithUsBtn" id="deleteWorkWithUsBtn"></button>
    </form>

</fieldset>

<script>
    $(document).ready(function() {

        //var base_url = "https://localhost:81/lms/theme/fordson/settings/";
        var base_url = "https://elearner.ghitbd.com/lms/theme/fordson/settings/";
        var url = window.location.href;
        /*if (url == "http://localhost:81/lms/admin/settings.php?section=themesettingfordson#theme_fordson_work_with_us") {
            showDiv();
        }*/
        if (url == "https://elearner.ghitbd.com/lms/admin/settings.php?section=themesettingfordson#theme_fordson_work_with_us") {
            showDiv();
        }
        $(".addWorkWithUs").click(function() {
            var copyRow = $('.work_with_us_form_field:last').clone();
            copyRow.find('input').val('');
            copyRow.find('textarea').val('');
            copyRow.find(".removeWorkWithUs").attr("onclick", "removeWorkWithUs(0,this.id)");
            copyRow.find(".work-with-us").html("");
            copyRow.appendTo('.work_with_us_form_body:last');
        });

        /*$(".removeField").click(function() {
        	$(this).parent().parent('.form_field').remove();
        });*/

        $('a[href*="#theme_fordson_work_with_us"]').click(function() {
            showDiv();
        });

        function showDiv() {
            $("#work_with_us_form").appendTo($("#theme_fordson_work_with_us"));
            $("#work_with_us_form").css("display", "block");
            $(".btn-primary").css("display", "none");
        }

    });


    function removeWorkWithUs(id, button_id) {
        var delId = $('#deleteWorkWithUs').val(id);
        var divLen = $(".work_with_us_form_field").length;
        if (id > 0) {
            $('#deleteWorkWithUsBtn').click();
        } else {
            if (divLen > 1) {
                $('#' + button_id).parent().parent('.work_with_us_form_field').remove();
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

    textarea {
        resize: none !important;
    }
</style>