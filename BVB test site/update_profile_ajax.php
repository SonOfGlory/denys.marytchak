<?php
include("db.php");
if($_POST['data'])
{
$data=$_POST['data'];
$data = mysql_escape_String($data);
mysql_query("update knyga set message='$data' where `id` = '".$_GET['id']."'");
}
?>