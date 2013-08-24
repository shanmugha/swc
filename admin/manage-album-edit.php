<div class="content-box-header">
    <h3 class="c-head">Edit Album</h3>
    <div class="clear"></div>
</div>
<?php
require_once(__DIR__ . '/../config/connection.php');
$connect = new Connection();
$id = $_POST['id'];
$sql_select_album = "SELECT * FROM album where id = '$id'";
$result = mysql_query($sql_select_album) or die ('Error updating database: ' . mysql_error());
?>
<?php if ($result) {
$getResult = mysql_fetch_row($result);
?>
<div class="content-box-content">
    <a  href="#" class="btn btn-danger delBtn" rowId="<?php echo $getResult[0];?>">Delete</a>
    <form class="form-horizontal" method="post">
        <div class="control-group">
            <label class="control-label" for="inputEmail">Album Name</label>
            <div class="controls">
                <input type="text" id="inputEmail" required="required" name="albumname" placeholder="Album Name">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputEmail">Description</label>
            <div class="controls">
                <textarea rows="6" name="description" class="span6" placeholder="Description"></textarea>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <input type="hidden" name="create-edit" value="0"/>
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn" href="/admin/manage-album-edit.php" type="button">Clear</a>
            </div>
        </div>
    </form>
</div>
<?php } ?>

<script>
    $(function(){
        $('.delBtn').on('click', function(){
            if (confirm("Are you sure you want to delete this row?")) {
                $.ajax(
                    {
                        type: "POST",
                        url: "manage-album-delete.php",
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