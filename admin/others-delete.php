<?php
//require_once(__DIR__ . '/../config/connection.php');
include(dirname(__FILE__)."/../config/connection.php");
$connect = new Connection();
$id = $_POST['id'];
$sql_select_form_others = "DELETE  FROM others where id = '$id'";
$result = mysql_query($sql_select_form_others) or die ('Error updating database: ' . mysql_error());
echo "1";die;
?>