<?php
// В PHP 4.1.0 и более ранних версиях следует использовать $HTTP_POST_FILES 
// вместо $_FILES.
include_once('misc.php');



$login = auth();
$uploaddir = 'files/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
$name=$_POST['name']; 
move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);

$pre=$_POST['pre'];




$z=$_GET['z'];

$db = connectdb();
$query = "INSERT INTO zadanie(login, predmet, razdel,path,name) VALUES('$login','$pre','$z','$uploadfile','$name')";
$res = mysql_query($query, $db);
header("Location:pre.php?pre=$pre");
?>