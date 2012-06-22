<?php
        include_once('misc.php');
		$login = auth();
        if(isset($_POST['predmet'])) {
				$predmet= $_POST['predmet'];
				$db = connectdb();
				$query = "INSERT INTO pred(login, predmet) 
                                        VALUES('$login','$predmet')";
				$res = mysql_query($query, $db);
		}
		header('Location:pre.php');
?>