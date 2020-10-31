<?php
defined('MOODLE_INTERNAL') || die();
$page = new admin_settingpage('theme_fordson_home_setting', 'Home Settings');
$settings->add($page);

require_once(__DIR__ . '/../../../config.php');
global $DB;

$records = $DB->get_records('home_setting', []);
//$hit_url = "https://elearner.ghitbd.com/lms/theme/fordson/settings/";
$hit_url = theme_url() . '/settings/';

?>



<fieldset id="home_setting_form" style="display:none">

    <form action="<?php echo $hit_url ?>insert.php" method="post">
        <?php
        if (count($records) > 0) {
            foreach ($records as &$record) {
        ?>
                <div class="home_setting_form_field row" style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">
                    <input type="hidden" name="id[]" value="<?php echo $record->id; ?>">
                    <div class="col-md-10">
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Top Heading 1</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="topheading1[]" value="<?php echo $record->topheading1; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Top Heading 2</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="topheading2[]" value="<?php echo $record->topheading2; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Top Description 1</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="topdescription1[]" value="<?php echo $record->topdescription1; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Top Description 2</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="topdescription2[]" value="<?php echo $record->topdescription2; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Top Link 1</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="toplink1[]" value="<?php echo $record->toplink1; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Top Link 2</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="toplink2[]" value="<?php echo $record->toplink2; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>

                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Main Heading 1</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="mainheading1[]" value="<?php echo $record->mainheading1; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Sub Heading (1,1)</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="subheading11[]" value="<?php echo $record->subheading11; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Sub Heading (1,2)</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="subheading12[]" value="<?php echo $record->subheading12; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Sub Heading (1,3)</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="subheading13[]" value="<?php echo $record->subheading13; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Icon (1,1)</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="icon11[]" value="<?php echo $record->icon11; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Icon (1,2)</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="icon12[]" value="<?php echo $record->icon12; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Icon (1,3)</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="icon13[]" value="<?php echo $record->icon13; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Description (1,1)</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="description11[]" value="<?php echo $record->description11; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Description (1,2)</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="description12[]" value="<?php echo $record->description12; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Description (1,3)</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="description13[]" value="<?php echo $record->description13; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>


                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Main Heading 2</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="mainheading2[]" value="<?php echo $record->mainheading2; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Sub Heading (2,1)</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="subheading21[]" value="<?php echo $record->subheading21; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Sub Heading (2,2)</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="subheading22[]" value="<?php echo $record->subheading22; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Sub Heading (2,3)</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="subheading23[]" value="<?php echo $record->subheading23; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Icon (2,1)</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="icon21[]" value="<?php echo $record->icon21; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Icon (2,2)</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="icon22[]" value="<?php echo $record->icon22; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Icon (2,3)</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="icon23[]" value="<?php echo $record->icon23; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Description (2,1)</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="description21[]" value="<?php echo $record->description21; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Description (2,2)</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="description22[]" value="<?php echo $record->description22; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                        <div class="form-item row">
                            <div class="form-label col-sm-3 text-sm-right">
                                <label>Description (2,3)</label>
                            </div>
                            <div class="form-setting col-sm-9">
                                <div class="form-text defaultsnext">
                                    <input type="text" name="description23[]" value="<?php echo $record->description23; ?>" class="form-control text-ltr" placeholder="Example: what kind of support you need?">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="home_setting_form_field row" style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">

                <div class="col-md-10">

                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Top Heading 1</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="topheading1[]" value="" class="form-control text-ltr" placeholder="Example: What kind of support you need?">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Top Heading 2</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="topheading2[]" value="" class="form-control text-ltr" placeholder="Example: What kind of support you need?">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Top Description 1</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="topdescription1[]" value="" class="form-control text-ltr" placeholder="Example: What kind of support you need?">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Top Description 2</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="topdescription2[]" value="" class="form-control text-ltr" placeholder="Example: What kind of support you need?">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Top Link 1</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="toplink1[]" value="" class="form-control text-ltr" placeholder="Example: What kind of support you need?">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Top Link 2</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="toplink2[]" value="" class="form-control text-ltr" placeholder="Example: What kind of support you need?">
                            </div>
                        </div>
                    </div>



                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Main Heading 1</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="mainheading1[]" value="" class="form-control text-ltr" placeholder="Example: What kind of support you need?">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Sub Heading (1,1)</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="subheading11[]" value="" class="form-control text-ltr" placeholder="Example: TThis is how we will support you.">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Sub Heading (1,2)</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="subheading12[]" value="" class="form-control text-ltr" placeholder="Example: What kind of support you need?">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Sub Heading (1,3)</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="subheading13[]" value="" class="form-control text-ltr" placeholder="Example: TThis is how we will support you.">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Icon (1,1)</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="icon11[]" value="" class="form-control text-ltr" placeholder="Example: What kind of support you need?">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Icon (1,2)</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="icon12[]" value="" class="form-control text-ltr" placeholder="Example: TThis is how we will support you.">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Icon (1,3)</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="icon13[]" value="" class="form-control text-ltr" placeholder="Example: What kind of support you need?">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Description (1,1)</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="description11[]" value="" class="form-control text-ltr" placeholder="Example: TThis is how we will support you.">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Description (1,2)</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="description12[]" value="" class="form-control text-ltr" placeholder="Example: What kind of support you need?">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Description (1,3)</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="description13[]" value="" class="form-control text-ltr" placeholder="Example: TThis is how we will support you.">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Main Heading 2</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="mainheading2[]" value="" class="form-control text-ltr" placeholder="Example: What kind of support you need?">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Sub Heading (2,1) </label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="subheading21[]" value="" class="form-control text-ltr" placeholder="Example: TThis is how we will support you.">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Sub Heading (2,2) </label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="subheading22[]" value="" class="form-control text-ltr" placeholder="Example: What kind of support you need?">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Sub Heading (2,3) </label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="subheading23[]" value="" class="form-control text-ltr" placeholder="Example: TThis is how we will support you.">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Icon (2,1)</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="icon21[]" value="" class="form-control text-ltr" placeholder="Example: What kind of support you need?">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Icon (2,2)</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="icon22[]" value="" class="form-control text-ltr" placeholder="Example: TThis is how we will support you.">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Icon (2,3)</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="icon23[]" value="" class="form-control text-ltr" placeholder="Example: What kind of support you need?">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Description (2,1)</label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="description21[]" value="" class="form-control text-ltr" placeholder="Example: TThis is how we will support you.">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Description (2,2) </label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="description22[]" value="" class="form-control text-ltr" placeholder="Example: What kind of support you need?">
                            </div>
                        </div>
                    </div>
                    <div class="form-item row">
                        <div class="form-label col-sm-3 text-sm-right">
                            <label>Description (2,3) </label>
                        </div>
                        <div class="form-setting col-sm-9">
                            <div class="form-text defaultsnext">
                                <input type="text" name="description23[]" value="" class="form-control text-ltr" placeholder="Example: TThis is how we will support you.">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="home_setting_form_body"></div>

        <br />
        <button type="submit" name="submitHomeSettingButton" class="btn btn-success"><i class="fa fa-save"></i> Save Home Setting</button>
    </form>



</fieldset>

<script>
    $(document).ready(function() {

        // var base_url = "http://localhost/lms/theme/fordson/settings/";
        var url = window.location.href;
        // if (url == "http://localhost/lms/admin/settings.php?section=themesettingfordson#theme_fordson_home_setting") {
        //     showDiv();
        // };
        if (url == "https://elearner.ghitbd.com/lms/admin/settings.php?section=themesettingfordson#theme_fordson_home_setting") {
            showDiv();
        };



        $('a[href*="#theme_fordson_home_setting"]').click(function() {
            showDiv();
        });

        function showDiv() {
            $("#home_setting_form").appendTo($("#theme_fordson_home_setting"));
            $("#home_setting_form").css("display", "block");
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