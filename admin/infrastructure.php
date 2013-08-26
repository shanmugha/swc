<?php
//require_once('admin-layouts/admin-header.php');
include("admin-layouts/admin-header.php");
?>

<?php

if ((!empty($_POST['area-acre'])) && (!empty($_POST))) {
    $areaAcres      = $_POST['area-acre'];
    $areaSqMeters   = $_POST['area-mtrs'];
    $buildupArea    = $_POST['area-buildup'];
    $areaPlayground = $_POST['area-playground'];
    $createOrEdit   = $_POST['create-edit'];
    if($createOrEdit == 0) {
        $sql = "INSERT INTO  infrastructure values('','$areaAcres', '$areaSqMeters', '$buildupArea', '$areaPlayground')";
    } else {
        $sql = "update  infrastructure set area_acres = '$areaAcres', area_sq_mtrs = '$areaSqMeters',
             area_build_up = '$buildupArea', area_playground = '$areaPlayground' where id = '$createOrEdit'";
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
                        <h3 class="c-head">InfraStructure</h3>
                        <div class="clear"></div>
                    </div>
                    <div class="content-box-content">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Area in acres</th>
                                <th>Area in Sq mtrs</th>
                                <th>Build up area(sq.mtrs)</th>
                                <th>Area of playground(sq.mtrs)</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <td colspan="6">
                                    <div class="pagination">
                                        <ul>
                                            <li><a href="#">Prev</a></li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li><a href="#">Next</a></li>
                                        </ul>
                                    </div>
                                    <div class="clear"></div>
                                </td>
                            </tr>
                            </tfoot>

                            <tbody>
                            <?php
                            $sql_infra = "SELECT * FROM infrastructure";
                            $result = mysql_query($sql_infra) or die ('Error updating database: ' . mysql_error());
                            ?>
                            <?php
                            if($result) {
                                $iterator = 1;
                                while ($row = mysql_fetch_array($result)):?>
                                    <tr>
                                        <td><?php echo $iterator++;?></td>
                                        <td><?php echo $row['area_acres'];?></td>
                                        <td><?php echo $row['area_sq_mtrs'];?></td>
                                        <td><?php echo $row['area_build_up'];?></td>
                                        <td><?php echo $row['area_playground'];?></td>
                                        <td>
                                            <a title="Edit" href="#" class="edit" rowId="<?php echo $row['id'];?>"><i class="icon-edit"></i></a>
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
                        <h3 class="c-head">Create Infrastructure</h3>
                        <div class="clear"></div>
                    </div>
                    <div class="content-box-content">
                        <form class="form-horizontal" method="post">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Area in acres</label>
                                <div class="controls">
                                    <input type="text" id="inputEmail" required="required" name="area-acre" placeholder="Area in acres">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Area in Sq mtrs</label>
                                <div class="controls">
                                    <input type="text" id="inputEmail" required="required" name="area-mtrs" placeholder="Area in Sq mtrs">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Build up area(sq.mtrs)</label>
                                <div class="controls">
                                    <input type="text" id="inputEmail" required="required" name="area-buildup" placeholder="Build up area(sq.mtrs)">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Area of playground(sq.mtrs)</label>
                                <div class="controls">
                                    <input type="text" id="inputEmail" required="required" name="area-playground" placeholder="Area of playground(sq.mtrs)">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="hidden" name="create-edit" value="0"/>
                                    <button type="submit" class="btn btn-success">Create</button>
                                    <a class="btn" href="/admin/infrastructure.php" type="button">Cancel</a>
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
        $('.edit').on('click', function(){

            $.ajax({
                type: "POST",
                url: "infrastructure-edit.php",
                data: { id: $(this).attr('rowId') }
            }).done(function( data ) {
                    $('.tab2-form').trigger('click');
                    $('.formcontent').html(data);
                });
        });

        $('.delBtn').on('click', function(){
            if (confirm("Are you sure you want to delete this row?")) {
                $.ajax(
                    {
                        type: "POST",
                        url: "infrastructure-delete.php",
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
