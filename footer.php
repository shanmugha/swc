<footer class="footer">
    <div align="center">
        <h6><a style=" font-size:10px;color:#FFFFFF;" href="#">Copyright © 2013 St.Ann's School, All rights reserved.</a></h6>
    </div>
</footer>
<?php

if(isset($_POST['login'])) {
    $loginStatus = false;
    $email       = $_POST['email'];
    $password    = $_POST['password'];
    if (!empty($email) && !empty($password)) {
        $key = md5($password);
        $sql = "select * from user where id = 1";
        $result = mysql_query($sql) or die ('Error updating database: '.mysql_error());

        if ($result) {
            $getRow   = mysql_fetch_row($result);
            $emailFromDb    = $getRow[1];
            $passwordFromDb = $getRow[4];
            if ($email == $emailFromDb && $key == $passwordFromDb) {
                $_SESSION['user'] = array('email' => $email, 'userId' => 1);
                header('Location:'.$baseurl.'admin/teachers.php');
            }
        }

    }

}
?>
<div id="sign-up" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <i class="icon-user"></i> <span id="myModalLabel">Login</span>
    </div>
    <div class="modal-body">

        <form class="bs-docs-example form-horizontal" method="post">
            <div class="control-group">
                <label for="inputEmail" class="control-label">Email</label>
                <div class="controls">
                    <input type="text" placeholder="Email" name="email" id="inputEmail">
                </div>
            </div>
            <div class="control-group">
                <label for="inputPassword" class="control-label">Password</label>
                <div class="controls">
                    <input type="password" placeholder="Password" name="password" id="inputPassword">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">

                    <button class="btn" name="login" type="submit">Sign in</button>
                </div>
            </div>
        </form>

    </div>
    <div class="modal-footer">

    </div>
</div>
</body>
</html>