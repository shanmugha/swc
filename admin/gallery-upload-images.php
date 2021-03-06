<?php

//require_once('admin-layouts/admin-header.php'); 
include("admin-layouts/admin-header.php");

?>
<script src="../public/js/simpleAjaxUploader.js"></script>
<script src="../public/js/jquery.blockUI.js"></script>
<!--<script src="<?php /*echo $resourcePath;*/?>js/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php /*echo $resourcePath;*/?>css/uploadify.css">-->


<script>
    $(function(){
        /*$('.edit').on('click', function(){

            $.ajax({
                type: "POST",
                url: "student-edit.php",
                data: { id: $(this).attr('rowId') }
            }).done(function( data ) {
                    $('.tab2-form').trigger('click');
                    $('.formcontent').html(data);
                });
        });*/

        $('.delBtn').on('click', function(){
            if (confirm("Are you sure you want to delete this row?")) {
                $.ajax(
                    {
                        type: "POST",
                        url: "gallery-upload-images-delete.php",
                        data: {
                            id   :$(this).attr('rowId'),
                            name :$(this).attr('fileName')
                        },
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
            <li><a href="#tab2" class="tab2-form" data-toggle="tab">Forms</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">

                <div class="content-box">
                    <div class="content-box-header">

                        <h3 class="c-head">Albums</h3>
						
                        <div class="clear"></div>
                    </div>
                    <div class="content-box-content">
                        <div class="notification attention png_bg">
                            <div class="alert alert-success hide">
                                <a class="close" data-dismiss="alert">×</a>
                                <strong>Success:</strong> Image Uploaded..
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Album Name</th>
                                <th>Image Name</th>
                                <th>Picture</th>
                                <th>Change/Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $adjacents = 3;
                            $query = "SELECT COUNT(*) FROM uploads";
                            $total_items = mysql_fetch_array(mysql_query($query));

                            /* Setup vars for query. */
                            $targetpage = "";
                            $limit = 2; //how many items to show per page
                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                                $start = ($page - 1) * $limit; //first item to display on this page
                            } else {
                                $page = 0;
                                $start = 0; //if no page var is given, set start to 0
                            }

                            if ($page == 0) $page = 1; //if no page var is given, default to 1.
                            $prev = $page - 1; //previous page is page - 1
                            $next = $page + 1; //next page is page + 1
                            $lastpage = ceil($total_items[0] / $limit); //lastpage is = total pages / items per page, rounded up.
                            $lpm1 = $lastpage - 1; //last page minus 1
                            ?>
                            <?php
                            $sql_album_upload = "SELECT a.album_name,u.path,u.album,u.name,u.id  FROM album a JOIN uploads u on a.id = u.album order By id DESC  LIMIT $start, $limit";
                            $result = mysql_query($sql_album_upload) or die ('Error updating database: ' . mysql_error());
                            ?>
                            <?php
                            if($result) {
                                $iterator = 1;
                                while ($row = mysql_fetch_array($result)):?>
                                    <tr>
                                        <td><?php echo $iterator++;?></td>
                                        <td class="span4"><?php echo $row['album_name'];?></td>
                                        <td class="span4"><?php echo $row['name'];?></td>
                                        <td class="span2"><img src="<?php echo '/uploads/100_'.$row['name'];?>" style=""></td>
                                        <td>
                                            <a title="Upload" href="#" class="upload-ico" rowId="<?php echo $row['id'];?>"><i class="icon-upload"></i></a>
                                            <a title="Delete" href="javascript:void(0) " fileName="<?php echo $row['name'];?>" class="delBtn" rowId="<?php echo $row['id'];?>"><i class="icon-trash"></i></a>

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
                        <h3 class="c-head">Upload Images</h3>

                        <div class="clear"></div>
                    </div>
                    <div class="content-box-content">
                        <?php
                            $sql_album = "SELECT id,album_name FROM album";
                            $result = mysql_query($sql_album) or die ('Error updating database: ' . mysql_error());
                            if($result) {
                        ?>
                                <!--<div class="progres" id="progres"  style="width: 700px">

                                </div>-->
                        <form class="form-horizontal" method="post">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Select Album</label>
                                <div class="controls">

                                    <select class="span5" name="albumId" id="albumId">
                                        <?php  while ($row = mysql_fetch_array($result)): ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['album_name']?></option>
                                        <?php endwhile; ?>
                                    </select>

                                </div>
                            </div>

                            <div class="control-group">
                                <label for="inputEmail" class="control-label">Upload Images</label>
                                <div class="controls">
                                    <!--<input id="file_upload" name="file_upload" type="file" multiple="true">-->
                                    <!--<input type="text" placeholder="Album Name" name="albumName" id="albumName">-->
                                    <input type="button" id="upload-btn" class="btn btn-primary btn-large clearfix" value="Choose file"> <span> jpg, jpeg, png, gif MaxSize (5 MB)</span>
                                </div>
                                <input type="hidden" value="0" id='hfGallery'/>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <input type="hidden" name="create-edit" value="0"/>
                                    <button type="button" class="btn btn-success" id="save">Upload</button>
                                    <a class="btn" href="<?php /*echo $_SERVER['PHP_SELF'];*/?>" type="button">Close</a>
                                </div>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php require_once('admin-layouts/admin-footers.php'); ?>

<script type="text/javascript">


    $(function () {
        album = $('#albumId').val();

        //$('#dTable').dataTable();


        var btn = document.getElementById('upload-btn');
        var uploader = new ss.SimpleUpload({
            button: btn, // HTML element used as upload button
            url: '/admin/upload1.php', // URL of server-side upload handler
            name: 'files', // Parameter name of the uploaded file
            responseType: 'json',
            data: {album:album},
            allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
            multiple: true,


            onSubmit: function(filename, extension) {
                blockUi();
            },
            onComplete:   function(filename, response) {
                blockUiComplete();
                location.reload();

            }
        });

        $('#albumId').on('change', function(){
            album = $(this).val();
            uploader.setData({album:album});

        });
    });

    function blockUi() {
        $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        } });
    }

    function blockUiComplete() {
        setTimeout($.unblockUI, 0);
    }

</script>

<!--<script type="text/javascript">
    <?php /*$timestamp = time();*/?>
    $(function() {
        var queueCnt = 0;
        $('input[type=file]').each(function (){
            upload();
        });

        function upload(){
            $("#save").attr("disabled", "disabled");
            $('#file_upload').uploadify({
                'formData'      : {
                    'timestamp' : '<?php /*echo $timestamp;*/?>',
                    'token'     : '<?php /*echo md5('unique_salt' . $timestamp);*/?>',
                    'category'  :  'gallery'
                },
                auto       : false,
                dataType: 'json',
                buttonText: 'Select Picture',
                buttonClass: 'btn btn-mini upload',
                'width'    : 230,
                'swf'      : "uploadify.swf",
                'uploader' : 'uploadify.php',
                'onUploadStart' : function(file) {
                    var albumId = $("#albumId option:selected").val();
                    $("#file_upload").uploadify("settings", "formData", {
                        'albumId':albumId
                    });
                },
                onUploadSuccess: function (e, data, status) {
                    $("#save").attr("disabled", "disabled");
                    //location.reload();
                },
                'onSelect' : function(queue) {
                    queueCnt++;
                    $('#save').removeAttr("disabled");
                },
                'onCancel' : function(file) {
                    queueCnt--;
                    if(queueCnt == 0){
                        $("#save").attr("disabled", "disabled");
                    }
                },
                'onUploadComplete' : function(file) {
                    queueCnt--;
                    if(queueCnt == 0) {
                        location.reload();
                    }
                }

            });
        }

        $('#save').on('click', function() {
            $('#file_upload').uploadify('upload', '*');
        });

        $('.upload-ico').on('click', function(){
           alert("df");
        })

    });
</script>
-->