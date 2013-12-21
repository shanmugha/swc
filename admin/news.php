
<?php
//require_once('admin-layouts/admin-header.php');
ob_start();
include("admin-layouts/admin-header.php");
 ?>
<script type="text/javascript" src="/../public/library/tinymce/js/tinymce/tinymce.min.js"></script>
<?php



if ((!empty($_POST['news'])) && (!empty($_POST['title'])) && (!empty($_POST))) {
    $news  = $_POST['news'];
    $title = trim($_POST['title']);
    $createOrEdit = $_POST['create-edit'];
    if($createOrEdit == 0) {
        $sql = "INSERT INTO news VALUES ('', '$title', '$news')";
    } else {
        $sql = "update  news set news = '$news', title = '$title' where id = '$createOrEdit'";
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
                        <h3 class="c-head">News List</h3>
                        <div class="clear"></div>
                    </div>
                    <div class="content-box-content">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>News</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $adjacents = 3;
                            $query = "SELECT COUNT(*) FROM news";
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
                            $sql_news = "SELECT * FROM news  LIMIT $start, $limit ";
                            $result = mysql_query($sql_news) or die ('Error news table: ' . mysql_error());
                            ?>
                            <?php
                            if($result) {
                                $iterator = 1;
                                while ($row = mysql_fetch_row($result)):?>
                                    <tr>
                                        <td><?php echo $iterator++;?></td>
                                        <td class="span10"><?php echo $row[1];?></td>
                                        <td>
                                            <a title="Edit" href="#" class="edit" rowId="<?php echo $row[0];?>"><i class="icon-edit"></i></a>
                                            <a title="Delete" href="#" class="delBtn" rowId="<?php echo $row[0];?>"><i class="icon-trash"></i></a>

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
                        <h3 class="c-head">Create News</h3>
                        <div class="clear"></div>
                    </div>
                    <div class="content-box-content">
                        <form class="form-horizontal" method="post">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Title</label>
                                <div class="controls">
                                    <input type="text" name="title" required="true" class="span8" placeholder="Title for display">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">News</label>
                                <div class="controls">
                                    <textarea rows="12" name="news" class="span8"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="hidden" name="create-edit" value="0"/>
                                    <button type="submit" class="btn btn-success">Create</button>
                                    <a class="btn" href="/admin/news.php" type="button">Cancel</a>
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
