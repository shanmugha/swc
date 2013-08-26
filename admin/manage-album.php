<?php 

//require_once('admin-layouts/admin-header.php');
include("admin-layouts/admin-header.php");
 
?>

<?php
if (!empty($_POST['albumname'])) {
    $albumName    = $_POST['albumname'];
    $description  = $_POST['description'];
    $createOrEdit = $_POST['create-edit'];

    if (!empty($albumName)):
        if($createOrEdit == 0){
            $sql = "insert into album values ('', '$albumName', '$description')";
        } else {

            $sql = "UPDATE album SET  album_name = '$albumName'
                        where id='$createOrEdit'";
        }

        $result = mysql_query($sql) or die ('Error updating database: ' . mysql_error());
        if ($result) {
            Flash::add('Success', 'Album Created.');
            header("Location:$_SERVER[PHP_SELF]");
        }
    endif;
}
?>

<script>
    $(function(){
        $('.edit').on('click', function(){

            $.ajax({
                type: "POST",
                url: "manage-album-edit.php",
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

<div class="tab-content">
    <h2>Welcome Admin</h2>

    <div class="tabbable">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Views</a></li>
            <li><a href="#tab2" class="tab2-form" data-toggle="tab">Create</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">

                <div class="content-box">
                    <div class="content-box-header">
                        <h3 class="c-head">Albums Created</h3>

                        <div class="clear"></div>
                    </div>
                    <div class="content-box-content">
                        <div class="notification attention png_bg">
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
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Album Name</th>
                                <th>Description</th>
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
                            $sql_album = "SELECT * FROM album";
                            $result = mysql_query($sql_album) or die ('Error updating database: ' . mysql_error());
                            ?>
                            <?php
                            if($result) {
                                $iterator = 1;
                                while ($row = mysql_fetch_array($result)):?>
                                    <tr>
                                        <td><?php echo $iterator++;?></td>
                                        <td class="span5"><?php echo $row['album_name'];?></td>
                                        <td class="span5"><?php echo $row['description'];?></td>
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
                        <h3 class="c-head">Create New Album</h3>
                        <div class="clear"></div>
                    </div>
                    <div class="content-box-content">
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
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a class="btn" href="<?php echo $_SERVER['PHP_SELF']?>" type="button">Clear</a>
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

