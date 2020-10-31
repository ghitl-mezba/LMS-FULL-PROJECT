<?php
defined('MOODLE_INTERNAL') || die();
$page = new admin_settingpage('theme_fordson_support_message', 'Support Message');
$settings->add($page);

require_once(__DIR__ . '/../../../config.php');

$limit2 = $DB->get_records('support_message', []);


?>

<fieldset id="support_message_form" style="display:none">



    <tbody>
        <?php
        if (count($limit2) > 0) {
        ?>
            <table id="support_message_tbl" style="width:100%">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <?php
                $show = '';
                foreach ($limit2 as $record) {
                    echo "<tr>
                            <td>" . $record->email . "</td>
                            <td>" . $record->subject . "</td>
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
        // if (url == "http://localhost/lms/admin/settings.php?section=themesettingfordson#theme_fordson_support_message") {
        //     showDiv();
        // }

        if (url == "https://elearner.ghitbd.com/lms/admin/settings.php?section=themesettingfordson#theme_fordson_support_message") {
            showDiv();
        };



        $('a[href*="#theme_fordson_support_message"]').click(function() {
            showDiv();
        });

        function showDiv() {
            $("#support_message_form").appendTo($("#theme_fordson_support_message"));
            $("#support_message_form").css("display", "block");
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