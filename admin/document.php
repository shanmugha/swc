<?php require_once('admin-layouts/admin-header.php'); ?>

    <?php

    if (isset($_FILES['doc'])) {
        //echo "<pre>";print_r($_FILES);die;
        $targetFolder = $_SERVER['DOCUMENT_ROOT']."/uploads/document/";
        if(file_exists($targetFolder.'stanns')) {
            die("File already exists");
        }
        $allowedTypes = array('application/msword','application/doc');
        if (in_array($_FILES['doc']['type'], $allowedTypes)) {

            move_uploaded_file($_FILES["doc"]["tmp_name"], $targetFolder . 'stanns');
        } else {
            die("Only doc types are allowed");
        }
    }

    ?>

    <div class="tab-content">
        <h2>Welcome Admin</h2>
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" id="#tab1" data-toggle="tab">Document Upload</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">

                    <div class="content-box">
                        <div class="content-box-header">
                            <h3 class="c-head">Document Upload</h3>
                            <div class="clear"></div>
                        </div>
                        <div class="content-box-content">
                            <div style="margin-left: 60px;"><label><span style="color: red">*</span> Please upload a doc file.<br></label></div>
                            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="control-group">
                                    <label for="inputEmail" class="control-label">Doc file upload</label>
                                    <div class="controls">
                                        <input type="file"  name="doc"  id="doc"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button class="btn btn-success" type="submit">upload</button>
                                    </div>
                                </div>
                            </form>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php require_once('admin-layouts/admin-footers.php'); ?>