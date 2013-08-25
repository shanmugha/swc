<?php require_once('admin-layouts/admin-header.php'); ?>
<link href="<?php echo $resourcePath;?>library/datepicker/css/datepicker.css" media="screen" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $resourcePath;?>library/datepicker/js/bootstrap-datepicker.js"></script>

<?php

if ((!empty($_POST['events'])) && (!empty($_POST['dpd1']))) {
    $events       = $_POST['events'];
    $createOrEdit = $_POST['create-edit'];
    $date         = date('Y-m-d', strtotime($_POST['dpd1']));
    if($createOrEdit == 0) {
        $sql = "INSERT INTO events VALUES ('','$events','$date')";
        //error_log($sql) ;die;
    } else {
        $sql = "update  news set events = '$events' where id = '$createOrEdit'";
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
                        <h3 class="c-head">Event List</h3>
                        <div class="clear"></div>
                    </div>
                    <div class="content-box-content">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Events</th>
                                <th>Date</th>
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
                            $sql_news = "SELECT * FROM events";
                            $result = mysql_query($sql_news) or die ('Error updating database: ' . mysql_error());
                            ?>
                            <?php
                            if($result) {
                                $iterator = 1;
                                while ($row = mysql_fetch_array($result)):?>
                                    <tr>
                                        <td><?php echo $iterator++;?></td>
                                        <td class="span6"><?php echo $row['events'];?></td>
                                        <td class="span4"><?php echo $row['date'];?></td>
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
                        <h3 class="c-head">Create Events</h3>
                        <div class="clear"></div>
                    </div>
                    <div class="content-box-content">
                        <form class="form-horizontal" method="post">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Add Events</label>
                                <div class="controls">
                                    <textarea rows="8" name="events" class="span8" required="required"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Date</label>
                                <div class="controls">
                                    <input type="text" class="datepicker span2 required" data-date-format="dd-mm-yyyy" readonly="readonly" name="dpd1" id="dpd1" required pattern="\d{2}\/\d{2}\/\d{4}">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="hidden" name="create-edit" value="0"/>
                                    <button type="submit" class="btn btn-success">Create</button>
                                    <a class="btn" href="/admin/events.php" type="button">Cancel</a>
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
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
        var date = new Date();
        date.setDate(date.getDate() - 1);
        $('.datepicker').datepicker({startDate: date}).on('changeDate', function(ev){
            $('#dpd1').datepicker('hide');
        });

        $('.edit').on('click', function(){

            $.ajax({
                type: "POST",
                url: "news-edit.php",
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
                        url: "news-delete.php",
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
