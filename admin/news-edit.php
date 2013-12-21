<script type="text/javascript" src="/../public/library/tinymce/js/tinymce/tinymce.min.js"></script>
<div class="content-box-header">
    <h3 class="c-head">Edit News</h3>

    <div class="clear"></div>
</div>
<?php
//require_once.dirname(__FILE__). '/../config/connection.php');
include(dirname(__FILE__)."/../config/connection.php");
$connect = new Connection();
$id = $_POST['id'];
$sql_select_news = "SELECT * FROM news where id = '$id'";
$result = mysql_query($sql_select_news) or die ('Error updating database: ' . mysql_error());
?>
<?php if ($result) {
    $getResult = mysql_fetch_row($result);
 ?>
<div class="content-box-content">
    <a  href="#" class="btn btn-danger delBtn" rowId="<?php echo $getResult[0];?>">Delete</a>
    <a  href="#" id="new" class="btn btn-success">New</a>
    <form class="form-horizontal" method="post">
        <div class="control-group">
            <label class="control-label" for="inputEmail">Title</label>
            <div class="controls">
                <input type="text" name="title" required="true" class="span8" value="<?php echo $getResult[1];?>" placeholder="Title for display">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputEmail">News</label>
            <div class="controls">
                <textarea rows="12" name="news" class="span8"><?php echo $getResult[2];?></textarea>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <input type="hidden" name="create-edit" value="<?php echo $getResult[0]; ?>"/>
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn" href="/admin/news.php" type="button">Cancel</a>
            </div>
        </div>
    </form>
</div>
<?php } ?>

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
        });

        $('#new').on('click', function(){
            location.reload();
        })
    });
</script>