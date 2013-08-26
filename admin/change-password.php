<?php 

 // require_once('admin-layouts/admin-header.php');
  include("admin-layouts/admin-header.php");

 ?>

<?php

    if (!empty($_POST['oldpassword'])
        && !empty($_POST['newpassword']) && !empty($_POST['confirmpassword'])) {
        $oldPassword     = md5($_POST['oldpassword']);
        $newpassword     = md5($_POST['newpassword']);
        $confirmPassword = md5($_POST['confirmpassword']);
        $sql = "select password from user where id = 1";
        $result = mysql_query($sql) or die ('Error updating database: '.mysql_error());
        if ($result) {
            $getPwd   = mysql_fetch_row($result);
            $existingPassword = $getPwd[0];

            if ($oldPassword != $existingPassword) {
                Flash::add('Error', 'Wrong old password.');
                header("Location:$_SERVER[PHP_SELF]");
            } else if ($newpassword != $confirmPassword) {
                Flash::add('Error', 'Passwords not matching.');
                header("Location:$_SERVER[PHP_SELF]");
            } else {
                $sql_change_pwd =  "update user set password = '$confirmPassword' where id=1";
                $result = mysql_query($sql_change_pwd) or die ('Error updating database: ' . mysql_error());
                if ($result) {
                    Flash::add('Success', 'Password Changed Successfully..');
                    header("Location:$_SERVER[PHP_SELF]");
                }
            }


        }

    }
?>

<div class="tab-content">
    <h2>Welcome Admin</h2>
    <div class="tabbable">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" id="#tab1" data-toggle="tab">Change Password</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">

                <div class="content-box">
                    <div class="content-box-header">
                        <h3 class="c-head">Change Password</h3>
                        <div class="clear"></div>
                    </div>
                    <div class="content-box-content">
                        <div class="notification attention png_bg">
                        </div>

                        <form class="form-horizontal" method="post">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Old Password</label>
                                <div class="controls">
                                    <input type="password" id="inputEmail" required="required" name="oldpassword" placeholder="Old Password">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">New Password</label>
                                <div class="controls">
                                    <input type="password" id="inputEmail" required="required" name="newpassword" placeholder="New Password">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Confirm Password</label>
                                <div class="controls">
                                    <input type="password" id="inputEmail" required="required" name="confirmpassword" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="hidden" name="create-edit" value="0"/>
                                    <button type="submit" class="btn btn-success">Change Password</button>
                                    <a class="btn" href="<?php echo $_SERVER['PHP_SELF']?>" type="button">Clear</a>
                                </div>
                            </div>
                        </form>
                        <?php $flash = new Flash();?>
                        <?php if(!empty(Flash::$messages)): ?>
                        <?php foreach( Flash::$messages as $id => $msg ) :?>
                        <div class="alert alert-<?php echo strtolower($id);?> fade in">
                            <a class="close" data-dismiss="alert">×</a>
                            <strong><?php echo $id.':'; ?></strong> <?php echo $msg; ?>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once('admin-layouts/admin-footers.php'); ?>
