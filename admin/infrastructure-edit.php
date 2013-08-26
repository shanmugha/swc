<div class="content-box-header">
    <h3 class="c-head">Edit Infrastructure</h3>

    <div class="clear"></div>
</div>
<?php
//require_once.dirname(__FILE__). '/../config/connection.php');
include(dirname(__FILE__) . "/../config/connection.php");
$connect = new Connection();
$id = $_POST['id'];
$sql_select_infra = "SELECT * FROM infrastructure where id = '$id'";
$result = mysql_query($sql_select_infra) or die ('Error updating database: ' . mysql_error());
?>
<?php if ($result) {
    $getResult = mysql_fetch_array($result);
    ?>
    <div class="content-box-content">
        <a href="#" class="btn btn-danger delBtn" rowId="<?php echo $getResult['id']; ?>">Delete</a>

        <form class="form-horizontal" method="post">
            <div class="control-group">
                <label class="control-label" for="inputEmail">Area in acres</label>

                <div class="controls">
                    <input type="text" id="inputEmail" required="required"
                           value="<?php echo $getResult['area_acres']; ?>" name="area-acre" placeholder="Area in acres">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Area in Sq mtrs</label>

                <div class="controls">
                    <input type="text" id="inputEmail" required="required"
                           value="<?php echo $getResult['area_sq_mtrs']; ?>" name="area-mtrs"
                           placeholder="Area in Sq mtrs">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Build up area(sq.mtrs)</label>

                <div class="controls">
                    <input type="text" id="inputEmail" required="required"
                           value="<?php echo $getResult['area_build_up']; ?>" name="area-buildup"
                           placeholder="Build up area(sq.mtrs)">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Area of playground(sq.mtrs)</label>

                <div class="controls">
                    <input type="text" id="inputEmail" required="required"
                           value="<?php echo $getResult['area_playground']; ?>" name="area-playground"
                           placeholder="Area of playground(sq.mtrs)">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="hidden" name="create-edit" value="<?php echo $getResult['id']; ?>"/>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a class="btn" href="/admin/infrastructure.php" type="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
<?php } ?>

<script>
    $(function () {
        $('.delBtn').on('click', function () {
            if (confirm("Are you sure you want to delete this row?")) {
                $.ajax(
                    {
                        type: "POST",
                        url: "infrastructure-delete.php",
                        data: {id: $(this).attr('rowId')},
                        cache: false,
                        success: function () {
                            location.reload();
                        }
                    });
            }
        })
    });
</script>