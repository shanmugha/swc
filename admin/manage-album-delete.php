<?php
//require_once(__DIR__ . '/../config/connection.php');
include(dirname(__FILE__)."/../config/connection.php");
$connect = new Connection();
$id = $_POST['id'];
$sql = "DELETE FROM uploads where album IN ('$id')";
mysql_query($sql) or  die ('Error deleting: ' . mysql_error());

$sql_select_form_album = "DELETE  FROM album where id = '$id'";
$result = mysql_query($sql_select_form_album) or die ('Error updating database: ' . mysql_error());
echo "1";die;

?>