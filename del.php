<?php

        include_once('misc.php');
        $id= $_GET['id'];
		$pre= $_GET['pre'];
		$db = connectdb();
		$query= "DELETE FROM zadanie where id='$id'";
		$res = mysql_query($query, $db);
		header("Location:pre.php?pre=$pre");
?>