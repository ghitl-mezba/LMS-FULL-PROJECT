<?php
defined('MOODLE_INTERNAL') || die();
$page = new admin_settingpage('theme_fordson_contact_message', 'Contact Message');
$settings->add($page);

require_once(__DIR__ . '/../../../config.php');
global $DB;

$limit = $DB->get_records('contact_message', []);
?>

<fieldset id="contact_message_form" style="display:none">

    <?php
    if (count($limit) > 0) {
    ?>
        <table id="contct_message_tbl" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Phone</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $show = '';
                foreach ($limit as $record) {
                    $show .= "<tr>
                                <td>" . $record->name . "</td>
                                <td>" . $record->email . "</td>
                                <td>" . $record->subject . "</td>
                                <td>" . $record->phone . "</td>
                                <td>" . $record->message . "</td>
                            </tr>";
                }
                echo $show;
                ?>
            </tbody>
        </table>

    <?php
    } else {
    ?>
        <div class="supportmessage_form_field row" style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">

            <div class="col-md-10">
                <label>No Message yet</label>
            </div>
        </div>
    <?php
    }
    ?>

</fieldset>
<script>
    $(document).ready(function() {
        // var base_url = "http://localhost/lms/theme/fordson/settings/";
        var url = window.location.href;
        // if (url == "http://localhost/lms/admin/settings.php?section=themesettingfordson#theme_fordson_contact_message") {
        //     showDiv();
        // }

        if (url == "https://elearner.ghitbd.com/lms/admin/settings.php?section=themesettingfordson#theme_fordson_contact_message") {
            showDiv();
        };


        $('a[href*="#theme_fordson_contact_message"]').click(function() {
            showDiv();
        });

        function showDiv() {
            $("#contact_message_form").appendTo($("#theme_fordson_contact_message"));
            $("#contact_message_form").css("display", "block");
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