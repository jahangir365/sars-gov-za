<?php
require_once("../common/commonfiles.php");
$id = $_GET['id'];
$data = db::getRecord("SELECT * FROM `ips` WHERE id='" . $id . "'");
include_once 'header.php';
?>
<form id="eLearningForm" method="post" class="form-horizontal" action="update_ip.php?id=<?php echo $id; ?>">
    <table class="table">
        <tbody>
        <tr>
            <td>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="ip">ip&nbsp;<span class="required">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" value="<?php echo @$data['ip']; ?>" class="form-control" id="ip" name="ip" placeholder="ip" required="required"  autofocus/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="role">Status&nbsp;<span class="required">*</span></label>
                            <div class="col-sm-5">
                                <select name="role" id="role" required="required" class="form-control">
                                    <option <?php echo @$data['is_block'] == "1" ? "selected='selected'" : ""; ?> value="1">Block</option>
                                    <option <?php echo @$data['is_block'] == "0" ? "selected='selected'" : ""; ?> value="0">Unblock</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class = "form-group">
                        <div class = "col-sm-9 col-sm-offset-4">
                            <button name="saveip" type = "submit" class = "btn btn-primary" name = "submit" value = "Sumbit">Submit</button>
                        </div>
                    </div>
                </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</form>
<script>
    $(document).ready(function () {
        $('.bcv').on('mouseover', function (e) {
            $(this).tooltip('disable');
        });

        $('.bcv').on('focus', function () {
            $(this).tooltip('enable').tooltip('show');
        });

    });
    $(function () {
        $('[data-toggle="popover"]').popover();
        $("#pageName").html("Update IP");
    })
</script>
