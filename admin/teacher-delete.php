<?php
require_once(__DIR__ . '/../config/connection.php');
$connect = new Connection();
$id = $_POST['id'];
$sql_select_form_school = "DELETE  FROM teacher where id = '$id'";
$result = mysql_query($sql_select_form_school) or die ('Error updating database: ' . mysql_error());
echo "1";die;
?>