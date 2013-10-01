<?php

ob_start();
$baseurl = 'http://localhost/swc/';
//session start
session_start();
if (!empty($_SESSION['user'])) {
    header('Location:'.$baseurl.'admin/teachers.php');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $resourcePath = 'public/'?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fullscreen Background Image Slideshow with CSS3 - A Css-only fullscreen background image slideshow" />
    <meta name="keywords" content="css3, css-only, fullscreen, background, slideshow, images, content" />
    <meta name="author" content="Sujith K S" />
    <title>home</title>

    <link rel="stylesheet" href="<?php echo $resourcePath ?>/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo $resourcePath ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $resourcePath ?>/css/style1.css" />

   <!-- <link rel="stylesheet" href="<?php /*echo $resourcePath */?>/css/menu.css">-->
    <link rel="stylesheet" href="<?php echo $resourcePath ?>/css/uploadify.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $resourcePath ?>/css/style.css" />
    <link rel="stylesheet" href="<?php echo $resourcePath ?>/css/ddaccrodin.css" />
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--<script src="http://code.jquery.com/jquery-latest.min.js"></script>-->
    <script type="text/javascript" src="<?php echo $resourcePath ?>/js/jquery.min.js"></script>

    <script type="text/javascript" src="<?php echo $resourcePath ?>/js/modernizr.custom.86080.js"></script>
    <script type="text/javascript" src="<?php echo $resourcePath ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $resourcePath ?>/js/rnhckr-tripleflap.js"></script>
	
	
    <!-- END-->
    <?php
    /*
     * connect to database
     *
	 *  http://stackoverflow.com/questions/8041330/include-file-from-different-directory
	 */


    // require_once dirname(__FILE__). '/config/connection.php';
    include(dirname(__FILE__) . "/config/connection.php");
    $connect = new Connection();
    ?>
</head>