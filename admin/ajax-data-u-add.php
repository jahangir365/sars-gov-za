<?php
require_once("../common/commonfiles.php");
include_once 'header.php';
?>
<form id="eLearningForm" method="post" class="form-horizontal" action="add_user.php">
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="username">Username&nbsp;<span class="required">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control alpha" id="username" name="username" placeholder="username" required="required"  autofocus/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="password">Password&nbsp;<span class="required">*</span></label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control alpha" id="username" name="password" placeholder="password" required="required"  autofocus/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="color">Color&nbsp;<span class="required">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" value="<?php echo @$data['color']; ?>" class="form-control alpha" id="color" name="color" placeholder="color" required="required"  autofocus/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="role">Role&nbsp;<span class="required">*</span></label>
                                <div class="col-sm-5">
                                    <select name="role" id="role" required="required" class="form-control">
                                        <option value="">Select Role</option>
                                        <option value="admin">admin</option>
                                        <option value="moderator">moderator</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class = "form-group">
                            <div class = "col-sm-9 col-sm-offset-4">
                                <button name="saveuser" type = "submit" class = "btn btn-primary" name = "submit" value = "Sumbit">Submit</button>
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
        $('[data-toggle="popover"]').popover()
    })
    $("#pageName").html("User Add");
</script>
