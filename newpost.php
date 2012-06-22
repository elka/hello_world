<?php
	
		include_once('misc.php');
		$login = auth();
        if(isset($_POST['post'])) {
				$post= $_POST['post'];
				$title= $_POST['title'];
				$pre= $_POST['pre'];
				$db = connectdb();
				$query = "INSERT INTO pos(predmet,title,post) 
                                        VALUES('$pre','$title','$post')";
				$res = mysql_query($query, $db);
		}
       
		header("Location:pre.php?pre=$pre");
?>              
    
