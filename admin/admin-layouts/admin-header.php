<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $resourcePath ='/../public/' ?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>admin</title>
    <link rel="stylesheet" href="<?php echo $resourcePath;?>css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo $resourcePath;?>css/style.css" />
    <!--<script src="http://code.jquery.com/jquery-latest.min.js"></script>-->
    <script src="<?php echo $resourcePath;?>js/jquery.min.js"></script>
    <script src="<?php echo $resourcePath;?>js/jqbootstrapvalidation.js"></script>
    <script type="text/javascript" src="<?php echo $resourcePath;?>js/modernizr.custom.86080.js"></script>
    <script src="<?php echo $resourcePath;?>js/bootstrap.min.js"></script>
    <!--<script type="text/javascript" src="https://rnhckrdotcom.googlecode.com/svn/bloggerwidget/rnhckr-tripleflap.js"></script>
   --> <script type="text/javascript">
        $(document).ready(function() {;
            $(".active-tab").click(function(){
                $(".active-tab").next(".sub-nav").toggle(); });
            $(".active-list").click(function(){
                $(".active-list").next(".sub-t").toggle(); });
        });
    </script>
</head>
<body>
<header class="header">
    <div class="container clearfix">
        <a class="logo" href="#"><img src="<?php echo $resourcePath;?>img/layout/logo.png" />St.Ann's School</a>
        <a class="login" href="#sign-up" data-toggle="modal" role="button" ><i class="icon-share icon-white"></i>Sign Out</a>
    </div>
</header>
<?php
   /*
    * connect to database
    */
    require_once(__DIR__ . '/../../config/connection.php');
    $connect = new Connection();
    $url = explode('/', $_SERVER["REQUEST_URI"]);
    ob_start();
    session_start();
?>
<section class="admin-tab">
    <ul class="tab-bar">
        <li>
            <a class="active-tab" href="#student" data-toggle="tab">People</a>
            <ul class="sub-nav" <?php if(in_array($url[2], array('teachers.php','students.php', 'management.php'))){?> style="display: block" <?php }?>>
                <li><a class="sub-list <?php if($url[2] == 'teachers.php'){echo 'current';}?>" href="teachers.php">Teachers</a></li>
                <li><a class="sub-list <?php if($url[2] == 'students.php'){echo 'current';}?>" href="students.php">Students</a></li>
                <li><a class="sub-list <?php if($url[2] == 'management.php'){echo 'current';}?>" href="management.php">Management</a></li>
            </ul>
        </li>
        <li>
            <a class="active-tab" href="#gallery" data-toggle="tab">Gallery</a>
            <ul class="sub-nav" <?php if(in_array($url[2], array('gallery-admin.php'))){?> style="display: block" <?php }?>>
                <li><a class="sub-list <?php if($url[2] == 'gallery-admin.php'){echo 'current';}?>" href="gallery-admin.php">Gallery</a></li>
            </ul>
        </li>
        <li>
            <a class="active-tab" href="#news" data-toggle="tab">News</a>
            <ul class="sub-nav" <?php if(in_array($url[2], array('news.php'))){?> style="display: block" <?php }?>>
                <li><a class="sub-list <?php if($url[2] == 'news.php'){echo 'current';}?>" href="news.php">News</a></li>
            </ul>
        </li>
        <li><a class="active-list" href="#">About School</a>
            <ul class="sub-t">
                <li><a class="sub-list" href="#">Infrastructure</a></li>
                <li><a class="sub-list" href="#">Address and Details</a></li>
                <li><a class="sub-list" href="#">Otherst</a></li>
            </ul>
        </li>
        <li><a href="#">Examination</a></li>
        <li><a href="#">Events</a></li>
        <li><a href="#">Settings</a></li>
    </ul>