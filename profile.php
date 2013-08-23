<?php require_once(__DIR__ . '/admin-layouts/admin-header.php');?>
<script src="/js/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/css/uploadify.css">
<?php
echo "Profile Details";

$studId = $_GET['id'];
?>

<section class="content-pg clearfix">
<div class="pull-right">
    <?php
    $sql_select_form_school = "SELECT * FROM uploadpath where studentId='$studId'";
    $result = mysql_query($sql_select_form_school) or die ('Error updating database: '.mysql_error());
    $getResult = mysql_fetch_row($result);
        if($getResult) { ?>
            <img class="pic" src="<?php echo $getResult[1]; ?>" height="200" width="250">
        <?php } else {?>
            <img class="pic" src="#" height="200" width="250">
        <?php }
    ?>
    <div style="margin-top: 10px;">
        <form>
            <div id="profileimage"></div>
            <div class="upload-area">
                <input id="file_upload" name="file_upload" type="file" multiple="true">
            </div>
            <br/>

            <!--<button class="btn" style="position: absolute;width: 214px;">Upload Picture</button>-->
        </form>
    </div>
</div>

<table>
<?php
    $sql_select_form_school = "SELECT * FROM student left join country on student.country = country.id where student.id='$studId'";
    //echo $sql_select_form_school;die;
    $result = mysql_query($sql_select_form_school) or die ('Error updating database: '.mysql_error());
    if($result) {
        while($getResult = mysql_fetch_row($result)):?>
        <tr>
            <td>First Name:</td>
            <td><?php echo $getResult[1]; ?></td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td><?php echo $getResult[2]; ?></td>
        </tr>
            <tr>
                <td>Standard:</td>
                <td><?php echo $getResult[11]; ?></td>
            </tr>
            <tr>
                <td>Division:</td>
                <td><?php echo $getResult[12]; ?></td>
            </tr>
            <tr>
                <td>Guardian:</td>
                <td><?php echo $getResult[3]; ?></td>
            </tr>
            <tr>
                <td>gender:</td>
                <td><?php echo $getResult[4]; ?></td>
            </tr>
            <tr>
                <td>Religion:</td>
                <td><?php echo $getResult[5]; ?></td>
            </tr>
            <tr>
                <td>Caste:</td>
                <td><?php echo $getResult[6]; ?></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><?php echo $getResult[7]; ?></td>
            </tr>
            <tr>
                <td>telephone:</td>
                <td><?php echo $getResult[8]; ?></td>
            </tr>
            <tr>
                <td>Mobile:</td>
                <td><?php echo $getResult[9]; ?></td>
            </tr>
            <tr>
                <td>Country:</td>
                <td><?php echo $getResult[14]; ?></td>
            </tr>

    <?php
    endwhile;}
    mysql_close($dbhandle);
?>
</table>
</section>

<?php require_once(__DIR__ . '/admin-layouts/admin-footers.php'); ?>

<script type="text/javascript">
    <?php $timestamp = time();?>
    $(function() {
        $('input[type=file]').each(function (){

            var wrap = $(this).closest('.upload-area');
            //$(this).css('opacity', 0);
            //wrap.append($('<button class="btn" style="position: absolute;width: 214px;">Upload Picture</button>'));

            $('#file_upload').uploadify({
                'formData'     : {
                    'timestamp' : '<?php echo $timestamp;?>',
                    'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
                    'studId'    :  '<?php echo $studId; ?>'
                },
                auto       : true,
                buttonText: 'Upload Picture',
                buttonClass: 'btn btn-mini',
                'width'    : 230,
                'swf'      : 'uploadify.swf',
                'uploader' : 'uploadify.php',

                'onUploadComplete' : function(e, data) {
                    console.log(e);
                    //alert('The file ' + file.name + ' finished processing.');
                    $('.pic').attr('src', '/uploads/'+e.name);
                }
            });
        });

    });
</script>