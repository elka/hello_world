<?php
        include_once('misc.php');
        $predmet= $_GET['predmet'];
		$db = connectdb();
		$query= "DELETE FROM pred where predmet='$predmet'";
		$res = mysql_query($query, $db);
		header('Location:pre.php');
?>