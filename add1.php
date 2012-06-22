<?php
include_once('misc.php');
$login = auth();
$pre=$_POST['pre'];
$z=$_GET['z'];
$ssulka=$_POST['ssulka'];
$name=$_POST['name'];
$db = connectdb();
$query = "INSERT INTO zadanie(login, predmet, razdel,path,name) VALUES('$login','$pre','$z','$ssulka','$name')";
$res = mysql_query($query, $db);
header("Location:pre.php?pre=$pre");
?>