<script type="text/javascript" src="/../public/library/tinymce/js/tinymce/tinymce.min.js"></script>
<div class="content-box-header">
    <h3 class="c-head">Edit Events</h3>

    <div class="clear"></div>
</div>
<?php
require_once(__DIR__ . '/../config/connection.php');
$connect = new Connection();
$id = $_POST['id'];
$sql_select_news = "SELECT * FROM events where id = '$id'";
$result = mysql_query($sql_select_news) or die ('Error updating database: ' . mysql_error());
?>
<?php if ($result) {
    $getResult = mysql_fetch_array($result);
    ?>
    <div class="content-box-content">
        <a  href="#" class="btn btn-danger delBtn" rowId="<?php echo $getResult['id'];?>">Delete</a>
        <form class="form-horizontal" method="post">
            <div class="control-group">
                <label class="control-label" for="inputEmail">Event Title</label>
                <div class="controls">
                    <input type="text" name="title" required="true" class="span8" value="<?php echo $getResult['title'];?>" placeholder="Title for display">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Add Events</label>
                <div class="controls">
                    <textarea rows="8" name="events" class="span8" required="required"><?php echo $getResult['events'];?></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Date</label>
                <div class="controls">
                    <input type="text" class="datepicker span2 required" value="<?php echo date("d-m-Y", strtotime($getResult['date']));?>" data-date-format="dd-mm-yyyy" readonly="readonly" name="dpd1" id="dpd1" required pattern="\d{2}\/\d{2}\/\d{4}">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="hidden" name="create-edit" value="<?php echo $getResult['id'];?>"/>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a class="btn" href="/admin/events.php" type="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
<?php } ?>

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

        $('.delBtn').on('click', function(){
            if (confirm("Are you sure you want to delete this row?")) {
                $.ajax(
                    {
                        type: "POST",
                        url: "events-delete.php",
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