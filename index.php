<?php
	include_once('misc.php');
	$login = auth();
	$predmets=array();
	$db = connectdb();
	$query = "SELECT * FROM pred";
	$com = mysql_query($query);
	if ($com!="") {
		while ($row=mysql_fetch_assoc($com)) {
			$predmets[]=array("pred"=> $row['predmet'],
								"lg" => $row['login']);
		};
	};
?>
<!DOCTYPE html> <!-- HTML 5.0 -->
<html>
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf8">
				<link rel="stylesheet" type="text/css" href="style.css"/>
                <title>Проект Бабальянц, Горяченкова</title>
        </head>
        <body>
		<center>
		<div class="shapka">
			<div class="shl">Добро пожаловать<? if( isset($login)) { echo ", $login"; } ?> </div>
			<div class="shr">
			<? if( isset($login)) { ?>
			<a id="r"href="pre.php" >На свою страницу</a> | <a id="r"href="logout.php" >Выйти</a>
			<? } 
			else { ?>
				<a id="r"href="reg.php" >Регистрация</a></li>
                <form action="login.php" method="POST">
                    <input type="textfield" name="login"/>
                    <input type="password" name="pass"/>
					<br>
                    <input type="submit" value="Войти"/>
                </form>
			<? }?>
			</div>
		</div>
		
		<div class="t">
			<br/>
			<? foreach($predmets as $predmet){
			$pre=$predmet["pred"];
			$lg=$predmet["lg"];
				echo "	<a class='ris' href='stran.php?pre=$pre&lg=$lg'><div > $pre</div></a>" ; 
			} ?>
		</div>
		</center>
		</body>
</html>