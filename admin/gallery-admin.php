<?php 

//require_once('admin-layouts/admin-header.php'); 
include(dirname(__FILE__)."admin-layouts/admin-header.php");
?>
<script src="<?php echo $resourcePath;?>js/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $resourcePath;?>css/uploadify.css">

    <div class="tab-content">
    <h2>Welcome Admin</h2>
    <div class="tabbable">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" id="#tab1" data-toggle="tab">Views</a></li>
        <li><a href="#tab2" class="tab2-form" data-toggle="tab">Albums</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab1">

            <div class="content-box">
                <div class="content-box-header">
                    <h3 class="c-head">Create Album</h3>
                    <div class="clear"></div>
                </div>
                <div class="content-box-content" style="height: 900px;">
                    <?php
                        if(isset($_POST['albumName'])) {

                            $albumName = $_POST['albumName'];
                            $uploadId = array($_POST['resource_id']);
                            //error_log(print_r($uploadId));die;
                            //print_r($uploadId);die;

                            $sql = "insert into album values('','$albumName')";
                            $result = mysql_query($sql) or die ('Error updating database: ' . mysql_error());
                            $albumId = mysql_insert_id();
                            if ($result) {die;
                                foreach($uploadId as $id) {
                                    echo $id;
                                }die;
                                $sql = "update uploads set studentId = '$albumId' where id='$uploadId'";
                                $result = mysql_query($sql) or die ('Error updating database: ' . mysql_error());
                                //$row = mysql_fetch_row($result);

                            }
                        }
                    ?>
                    <a class="btn btn-primary" href="#create-album" data-toggle="modal" role="button" >Create Album</a>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th><input class="check-all" type="checkbox" /></th>
                            <th>Sl No</th>
                            <th>Album Name</th>
                            <th>upload</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>

                        </tr>
                        </tfoot>

                        <tbody>
                        <?php
                        $sql_select_form_school = "SELECT * FROM uploads join album on uploads.studentId = album.id";
                        $result = mysql_query($sql_select_form_school) or die ('Error updating database: ' . mysql_error());
                        ?>
                        <?php
                        if($result) {
                            while ($row = mysql_fetch_row($result)):?>
                                <tr>
                                    <td><input type="checkbox" /></td>
                                    <td><?php echo $row[0];?></td>
                                    <td><?php echo $row[4];?></td>
                                    <td><img src="<?php echo $row[1];?>" alt="Smiley face" height="50" width="100"> </td>
                                    <td>
                                        <a title="Edit" href="#" class="edit" rowId="<?php echo $row[0];?>"><i class="icon-edit"></i></a>
                                        <a title="Delete" href="#" class="delBtn" rowId="<?php echo $row[0];?>"><i class="icon-trash"></i></a>

                                    </td>
                                </tr>
                            <?php endwhile;} ?>
                        </tbody>
                    </table>






                    <div class="notification attention png_bg">
                    </div>

                   <!-- <form>
                        <div id="profileimage"></div>
                        <div class="upload-area">
                            <input id="file_upload" name="file_upload" type="file" multiple="true">
                        </div>
                        <br/>

                    </form>-->




                </div>
            </div>
        </div>



        <div class="tab-pane" id="tab2">
            <div class="content-box formcontent">
                <div class="content-box-header">
                    <h3 class="c-head">View Albums</h3>
                    <div class="clear"></div>
                </div>
                <div class="content-box-content">
                    <div>
                        <?php
                        $sql_select_form_school = "SELECT * FROM uploads join album on uploads.studentId = album.id";
                        $result = mysql_query($sql_select_form_school) or die ('Error updating database: ' . mysql_error());
                        ?>
                        <ul class="album-group">
                            <?php
                            if($result) {
                            while ($row = mysql_fetch_row($result)):?>
                            <li>
                                <a href="/gallery-view.php?id=<?php echo $row[0];?>">
                                    <div class="album-box">
                                    </div>
                                </a>
                            </li>
                            <?php endwhile; }?>
                           <!-- <li>
                                <a href="#">
                                    <div class="album-box">
                                    </div>
                                </a>

                            </li>-->
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
    </div>

<div id="create-album" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <i class="icon-book"></i> <span id="myModalLabel">Create Album</span>
    </div>
    <div class="modal-body">

        <form class="bs-docs-example form-horizontal albumform" method="post">
            <div class="control-group">
                <label for="inputEmail" class="control-label">Album Name</label>
                <div class="controls">
                    <input type="text" placeholder="Album Name" name="albumName" id="albumName">
                </div>
            </div>

            <div class="control-group">
                <label for="inputEmail" class="control-label">Upload Images</label>
                <div class="controls">
                    <input id="file_upload" name="file_upload" type="file" multiple="true">
                    <!--<input type="text" placeholder="Album Name" name="albumName" id="albumName">-->
                </div>
                <input type="hidden" value="0" id='hfGallery'/>
            </div>

            <div class="control-group">
                <div class="controls">
                    <input type="hidden" id="resource_id" name="resource_id" value=""/>
                    <button class="btn" name="create-album" id="create-album-btn" type="button">Create</button>
                </div>
            </div>
        </form>

    </div>
    <div class="modal-footer">

    </div>
</div>


<?php require_once('admin-layouts/admin-footers.php'); ?>

<script type="text/javascript">
    <?php $timestamp = time();?>
    $(function() {
        var uploadIds=[];
        $('input[type=file]').each(function (){
            $("#create-album-btn").attr("disabled", "disabled");
            var wrap = $(this).closest('.upload-area');
            //$(this).css('opacity', 0);
            //wrap.append($('<button class="btn" style="position: absolute;width: 214px;">Upload Picture</button>'));

            $('#file_upload').uploadify({
                'formData'     : {
                    'timestamp' : '<?php echo $timestamp;?>',
                    'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
                    /*'studId'    : '<?php echo isset($_SESSION['albumId'])? $_SESSION['albumId']:'0'; ?>',*/
                    'category'  :  'createAlbum'
                },
                auto       : false,
                dataType: 'json',
                buttonText: 'Upload Picture',
                buttonClass: 'btn btn-mini upload',
                'width'    : 230,
                'swf'      : "uploadify.swf",
                'uploader' : 'uploadify.php',

                'onSelect' : function(file) {
                    $('#create-album-btn').removeAttr("disabled");
                },
                'onCancel' : function(file) {
                    $("#create-album-btn").attr("disabled", "disabled");
                },
                'onQueueComplete' : function(queueData) {
                    $("form.albumform").attr('action','/admin/gallery-admin.php').submit();

                },
                onUploadSuccess: function (e, data, status) {
                    data = JSON.parse(data);
                    if(data) {
                        uploadIds.push(data.uploadId);
                        $('#resource_id').val(uploadIds);

                    }
                    console.log(data);
                },
                'onUploadComplete' : function(file) {
                    $("#create-album-btn").attr("disabled", "disabled");

                    //alert('The file ' + file.name + ' finished processing.');
                    //$('.pic').attr('src', '/uploads/'+e.name);
                }
            });
        });

        $('#create-album-btn').on('click', function() {
            $('#file_upload').uploadify('upload', '*');
        })

    });
</script>