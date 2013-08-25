<?php
require_once(__DIR__ . '/../config/connection.php');
$connect = new Connection();
$id       = $_POST['id'];
$fileName = $_POST['name'];
$sql_del_uploads = "DELETE  FROM uploads where id = '$id'";
$result = mysql_query($sql_del_uploads) or die ('Error updating database: ' . mysql_error());
if($result) {
    unlink(__DIR__.'/../uploads/'.$fileName);
    echo "1";die;
}

?>