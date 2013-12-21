<?php require_once('admin-layouts/admin-header.php'); ?>
<link href="<?php echo $resourcePath;?>library/datepicker/css/datepicker.css" media="screen" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $resourcePath;?>library/datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/../public/library/tinymce/js/tinymce/tinymce.min.js"></script>
<?php

if ((!empty($_POST['events'])) && (!empty($_POST['title'])) && (!empty($_POST['dpd1']))) {
    $title        = $_POST['title'];
    $events       = $_POST['events'];
    $createOrEdit = $_POST['create-edit'];
    $date         = date('Y-m-d', strtotime($_POST['dpd1']));
    if($createOrEdit == 0) {
        $sql = "INSERT INTO events VALUES ('', '$title', '$events', '$date')";
        Flash::add('Success', 'Event Created.');
    } else {
        $sql = "update  events set title = '$title', events = '$events', date = '$date' where id = '$createOrEdit'";
        Flash::add('Success', 'Event Updated.');
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
                                <th>Event Title</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $adjacents = 3;
                            $query = "SELECT COUNT(*) FROM events";
                            $total_items = mysql_fetch_array(mysql_query($query));

                            /* Setup vars for query. */
                            $targetpage = "";
                            $limit = 2; //how many items to show per page
                            if(isset($_GET['page'])) {
                                $page = $_GET['page'];
                                $start = ($page - 1) * $limit; //first item to display on this page
                            } else {
                                $page = 0;
                                $start = 0; //if no page var is given, set start to 0
                            }

                            if ($page == 0) $page = 1; //if no page var is given, default to 1.
                            $prev = $page - 1; //previous page is page - 1
                            $next = $page + 1; //next page is page + 1
                            $lastpage = ceil($total_items[0]/$limit); //lastpage is = total pages / items per page, rounded up.
                            $lpm1 = $lastpage - 1; //last page minus 1
                            ?>
                            <?php
                            $sql_news = "SELECT * FROM events LIMIT $start, $limit";
                            $result = mysql_query($sql_news) or die ('Error in events table: ' . mysql_error());
                            ?>
                            <?php
                            if($result) {
                                $iterator = 1;
                                while ($row = mysql_fetch_array($result)):?>
                                    <tr>
                                        <td><?php echo $iterator++;?></td>
                                        <td class="span6"><?php echo $row['title'];?></td>
                                        <td class="span4"><?php echo date("d-m-Y", strtotime($row['date']));?></td>
                                        <td>
                                            <a title="Edit" href="#" class="edit" rowId="<?php echo $row['id'];?>"><i class="icon-edit"></i></a>
                                            <a title="Delete" href="#" class="delBtn" rowId="<?php echo $row['id'];?>"><i class="icon-trash"></i></a>

                                        </td>
                                    </tr>
                                <?php endwhile;} ?>
                            </tbody>
                        </table>
                        <?php include('pagination.php')?>
                        <div class="clear"></div>
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
                                <label class="control-label" for="inputEmail">Event Title</label>
                                <div class="controls">
                                    <input type="text" name="title" required="true" class="span8" placeholder="Title for display">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Add Event</label>
                                <div class="controls">
                                    <textarea rows="8" name="events" class="span8"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Date</label>
                                <div class="controls">
                                    <input type="text" class="datepicker span2 required"  data-date-format="dd-mm-yyyy" readonly="readonly" name="dpd1" id="dpd1" required pattern="\d{2}\/\d{2}\/\d{4}">
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

        tinymce.init({selector:'textarea',height : 300,
            plugins: [
                "advlist autolink autosave link  lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime  nonbreaking",
                "table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
            ],
            toolbar1: "undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | searchreplace | bullist numlist | outdent indent blockquote | inserttime preview | forecolor backcolor",
            toolbar2: "",
            toolbar3: "",
        });

        $('.edit').on('click', function(){

            $.ajax({
                type: "POST",
                url: "events-edit.php",
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
                        url: "events-delete.php",
                        data: {id:$(this).attr('rowId')},
                        cache: false,
                        success: function(del)
                        {
                            if(del == 1){

                                location.reload();
                            }

                        }
                    });
            }
        })
    });
</script>
