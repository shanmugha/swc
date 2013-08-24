<?php
    require_once(__DIR__ . '/../config/connection.php');
    $connect = new Connection();
?>

<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = '/uploads'; // Relative to the root

$verifyToken = md5('unique_salt' . $_POST['timestamp']);
$data = array();

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile   = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
    $fileName = $_FILES['Filedata']['name'];

    $album    = $_POST['albumId'];

    $category = $_POST['category'];

    error_log($album);
	// Validate the file type
	$fileTypes  = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts  = pathinfo($_FILES['Filedata']['name']);

	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);

        /*$fileExists = "select * from uploads where studentId = '$studentId'";
        $fileAlreadyExists = mysql_query($fileExists) or die ('Error updating database: '.mysql_error());*/

       /* if(mysql_fetch_array($fileAlreadyExists)) {
            $sql = "UPDATE uploads set path='/uploads/$fileName' where studentId = '$studentId'";
        } else {*/
            $sql = "INSERT INTO uploads VALUES ('', '/uploads/$fileName', '$category', '$album')";
        /*}*/

        $result = mysql_query($sql) or die ('Error updating database: '.mysql_error());
        $uploadId = mysql_insert_id();
/*        $_SESSION['uploadId']= $uploadId;
        error_log($_SESSION['uploadId']);*/


        if($result) {
            $data = array('uploadId' => $uploadId);
            echo json_encode($data);die;


        }

	} else {
		echo 'Invalid file type.';
	}
}
?>