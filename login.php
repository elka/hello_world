<?php







        include_once('misc.php');
        if(isset($_POST['login']) &&
           isset($_POST['pass'])) {
		   if (check_user($_POST['login'],$_POST['pass'])) {
                        session_start();
                        $_SESSION['login'] = $_POST['login'];
						header('Location:pre.php');
						exit;
           }
        }
        header('Location:index.php');
?>
