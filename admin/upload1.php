<?php
require_once(__DIR__ . '/../config/connection.php');
//include(dirname(__FILE__)."/../config/config.php");
$connect = new Connection();
?>
<?php

require('uploader.php');
//$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
$upload_dir = $_SERVER['DOCUMENT_ROOT'] .'/uploads/';
$valid_extensions = array('gif', 'png', 'jpeg', 'jpg');

$Upload = new FileUpload('files');
$ext = $Upload->getExtension();
$actual_image_name   = time().'.'.$ext;
$Upload->newFileName = $actual_image_name;

$result = $Upload->handleUpload($upload_dir, $valid_extensions);



if (!$result) {
    echo json_encode(array('success' => false, 'msg' => $Upload->getErrorMsg()));
} else {
    $path = $Upload->getSavedFile();
    sleep(1);
    $widthArray = array(200,100,50);
    foreach($widthArray as $newwidth) {
        $filename = compressImage($Upload->getExtension(),$path, $newwidth, $upload_dir, $actual_image_name);
    }

    /*echo json_encode(array('success' => true, 'file' => $Upload->getFileName(),
        'data' =>"<a class='example-image-link' href='/admin/uploads/200_{$actual_image_name}'  data-lightbox='roadtrip'><img class='example-image' src='/admin/uploads/100_{$actual_image_name}'/></a>"
    ));*/

    $sql = "INSERT INTO uploads VALUES ('', '$actual_image_name', '/uploads/$actual_image_name', 'gallery', '$_GET[album]')";


    $result = mysql_query($sql) or die ('Error updating database: '.mysql_error());
    $uploadId = mysql_insert_id();
    echo json_encode(array('success' => true, 'file' => $Upload->getFileName(),
        'data' =>''
    ));
}


function compressImage($ext, $uploadedfile, $newwidth, $path, $actual_image_name) {
    if($ext=="jpg" || $ext=="jpeg" ) {
        $src = imagecreatefromjpeg($uploadedfile);
    } else if($ext=="png") {
        $src = imagecreatefrompng($uploadedfile);
    } else if($ext=="gif") {
        $src = imagecreatefromgif($uploadedfile);
    } else {
        $src = imagecreatefrombmp($uploadedfile);
    }

    list($width,$height)=getimagesize($uploadedfile);
    $newheight=($height/$width)*$newwidth;
    $tmp=imagecreatetruecolor($newwidth,$newheight);
    imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
    $filename = $path.$newwidth.'_'.$actual_image_name;
    imagejpeg($tmp,$filename,100);
    imagedestroy($tmp);
    return $filename;
}