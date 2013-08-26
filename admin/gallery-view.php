<?php 
//require_once('admin-layouts/admin-header.php'); 
include(dirname(__FILE__)."admin-layouts/admin-header.php");
?>

<?php
/*$targetPath = $_SERVER['DOCUMENT_ROOT'];
$file = $targetPath.'/gallery.xml';



if (file_exists($file)) {
    $xml = simplexml_load_file($file);
    $xml->
    $xml->asXML($file);
    error_log(print_r($xml));die;

} else {
    print_r( error_log('sdsds'));die;

}*/
//$galleries = $xml->image;

/*$gallery = $galleries->addChild('gallery');
$gallery->addChild('name', 'a gallery');
$gallery->addChild('filepath', 'path/to/gallery');
$gallery->addChild('thumb', 'mythumb.jpg');*/


?>

<script src="/js/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/css/uploadify.css">

<!--START SIMPLEVIEWER EMBED.-->
<script type="text/javascript" src="/public/simpleviewer/svcore/js/simpleviewer.js"></script>

<script type="text/javascript">
    simpleviewer.ready(function () {
        var flashvars = {};
        /*simpleviewer.load('sv-container', '100%', '100%', '222222', true);*/
        flashvars.galleryURL = "gallery.php";
        simpleviewer.load('sv-container', '100%', '100%', '222222', true);
        //simpleviewer.load("sv-container", "100%", "100%", "222222", true, flashvars, params, attributes);
    });
</script>



<div class="tab-content">
    <h2>Welcome Admin</h2>
    <div class="tabbable">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" id="#tab1" data-toggle="tab">Gallery</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">

                <div class="content-box">
                    <div class="content-box-header">
                        <h3 class="c-head">Create Album</h3>
                        <div class="clear"></div>
                    </div>
                    <div class="content-box-content" style="height: 900px;">
                        <div id="sv-container"></div>


                        <div class="notification attention png_bg">
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>




<?php require_once('admin-layouts/admin-footers.php'); ?>
