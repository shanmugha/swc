<?php
//require_once('admin-layouts/admin-header.php');
include("admin-layouts/admin-header.php");
?>

<?php

if ((!empty($_POST['president'])) && (!empty($_POST))) {
    $president   = $_POST['president'];
    $address     = $_POST['address'];
    $email       = $_POST['email'];
    $phno        = $_POST['phone'];
    $fax         = $_POST['fax'];
    $sql_contact = "SELECT count(*) FROM others";
    $result = mysql_query($sql_contact) or die ('Error updating database: ' . mysql_error());
    $row = mysql_fetch_row($result);
    if($row[0] == 1) {
        $sql = "update  others set president_name = '$president', address = '$address' ,email = '$email', phno = '$phno',
             fax = '$fax' where id = 1";
    } else {
        $sql = "insert into others values ('', '$president', '$address', '$email', '$phno', '$fax')";
    }

    $result = mysql_query($sql) or die ('Error updating database: ' . mysql_error());
    if ($result) {
        header("Location:$_SERVER[PHP_SELF]");
    } else {
        header("Location:$_SERVER[PHP_SELF]");
    }
}

?>
<div class="tab-content">
    <h2>Welcome Admin</h2>
    <div class="tabbable">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" id="#tab1" data-toggle="tab">Views</a></li>
            <li><a href="#tab2" class="tab2-form" data-toggle="tab">Forms</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">

                <div class="content-box">
                    <div class="content-box-header">
                        <h3 class="c-head">School Management</h3>
                        <div class="clear"></div>
                    </div>
                    <div class="content-box-content">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name of president</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th>Fax No</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <td colspan="6">

                                    <div class="clear"></div>
                                </td>
                            </tr>
                            </tfoot>

                            <tbody>
                            <?php
                            $sql_others = "SELECT * FROM others";
                            $result = mysql_query($sql_others) or die ('Error updating database: ' . mysql_error());
                            ?>
                            <?php
                            if($result) {
                                $iterator = 1;
                                while ($row = mysql_fetch_array($result)):?>
                                    <tr>
                                        <td><?php echo $iterator++;?></td>
                                        <td><?php echo $row['president_name'];?></td>
                                        <td><?php echo $row['address'];?></td>
                                        <td><?php echo $row['email'];?></td>
                                        <td><?php echo $row['phno'];?></td>
                                        <td><?php echo $row['fax'];?></td>
                                        <td>
                                            <a title="Delete" href="#" class="delBtn" rowId="<?php echo $row['id'];?>"><i class="icon-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endwhile;} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <div class="tab-pane" id="tab2">
                <div class="content-box formcontent">
                    <div class="content-box-header">
                        <h3 class="c-head">Create School Management</h3>
                        <div class="clear"></div>
                    </div>
                    <div class="content-box-content">
                        <?php
                        $sql_others = "SELECT * FROM others";
                        $result = mysql_query($sql_others) or die ('Error updating database: ' . mysql_error());
                        ?>
                        <form class="form-horizontal" method="post">
                            <?php
                            if($result) {
                                $row = mysql_fetch_row($result);
                            }?>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Name of president</label>
                                <div class="controls">
                                    <input type="text" id="inputEmail" value="<?php echo $row['1']; ?>" required="required" name="president" placeholder="Name of president">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Address</label>
                                <div class="controls">
                                    <textarea rows="8" name="address" placeholder="Address" class="span8" required="required"><?php echo $row['2'];?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Email</label>
                                <div class="controls">
                                    <input type="email" id="inputEmail" value="<?php echo $row['3']; ?>"  name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Phone No</label>
                                <div class="controls">
                                    <input type="text" id="inputEmail" value="<?php echo $row['4']; ?>"  name="phone" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Fax No</label>
                                <div class="controls">
                                    <input type="text" id="inputEmail" value="<?php echo $row['5']; ?>"  name="fax" placeholder="Fax Number">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="hidden" name="create-edit" value="0"/>
                                    <button type="submit" class="btn btn-success"><?php echo (empty($row))? 'Create':'Update';?></button>
                                    <a class="btn" href="/admin/others.php" type="button">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<?php require_once('admin-layouts/admin-footers.php'); ?>

<script>
    $(function(){
        $('.delBtn').on('click', function(){
            if (confirm("Are you sure you want to delete this row?")) {
                $.ajax(
                    {
                        type: "POST",
                        url: "others-delete.php",
                        data: {id:$(this).attr('rowId')},
                        cache: false,
                        success: function()
                        {
                            location.reload();
                        }
                    });
            }
        })
    });
</script>
