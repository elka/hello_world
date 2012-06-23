<?php
	include_once('misc.php');
	$login = auth();
	$pre=$_GET['pre'];
	$zadanies=array();
	$db = connectdb();
	$query = "SELECT * FROM zadanie where predmet='$pre'" ;
	$com = mysql_query($query);
	if ($com!="") {
		while ($row=mysql_fetch_assoc($com)) {
			$zadanies[]= array ("razdel" => $row['razdel'], 
							"path" => $row['path'],
							"name" => $row['name']);
		};
	};
	$lg=$_GET['lg'];
	$query = "SELECT * FROM users where login='$lg'" ;
	$com = mysql_query($query);
	if ($com!="") {
		while ($row=mysql_fetch_assoc($com)) {
			$data[]= array ("surname" => $row['surname'], 
							"name" => $row['name'],
							"email"=>$row['email'],
							"otchestvo" => $row['otchestvo']);
		};
	};
	
		$comments[] = array();
		$query = "SELECT * FROM pos where predmet='$pre'";
		$com = mysql_query($query);
		while ($row=mysql_fetch_assoc($com)) { $comments[] = array("title" => $row['title'], "post" => $row['post']); }
	
?>
<!DOCTYPE html> <!-- HTML 5.0 -->
<html>
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset = cp1251" />
				<link rel="stylesheet" type="text/css" href="style.css"/>
                <title>Проект Бабальянц, Горяченкова</title>
        </head>
        <body>
		<center>
		<div class="shapka">
			<div class="shl">Добро пожаловать<? if( isset($login)) { echo ", $login"; } ?> </div>
			<div class="shr">
				<? if( isset($login)) { ?>
					<a id="r"href="index.php" >На главную</a> | <a id="r"href="logout.php" >Выйти</a>
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
			</div><center>
		<div class="tt">
			<div class="telo1">
			<? 
		
		 foreach($comments as $comment) {
                        echo "<b>{$comment["title"]}</b>  
                                  <br />
                              <p>{$comment["post"]}</p>";
                }
        ?>
                
       		
			</div>
			
			<div class="telo1">
					
					<ul>
					<div class="zag2">Задания</div>
					<?  foreach($zadanies as $zadanie){
							if ($zadanie["razdel"]==1) { 
							$name=$zadanie["name"]; 
							$path=$zadanie["path"]; 
							echo "<li> <a href='$path' target='_blank'>$name</a> </li>" ;
							?> <br/> <?
						}
					} ?>
										
					<br/>
					<div class="zag2">Материалы курса</div>
					<?  foreach($zadanies as $zadanie){
							if ($zadanie["razdel"]==2) { 
							$name=$zadanie["name"]; 
							$path=$zadanie["path"]; 
							echo " <li> <a href='$path' target='_blank'>$name</a> </li> " ;
							?> <br/> <?
						}
					} ?>
					
					<br/>
					<div class="zag2">Полезные ресурсы</div>
					<?  foreach($zadanies as $zadanie){
							if ($zadanie["razdel"]==3) { 
							$name=$zadanie["name"]; 
							$path=$zadanie["path"]; 
							echo "<li>  <a href='http://$path' target='_blank'>$name</a> </li> " ;
							?> <br/> <?
						}
					} ?>
					</ul>
					<div class="zag2">Лектор</div>
					
					<?  foreach($data as $dat){ 
							$surname=$dat["surname"]; 
							$name=$dat["name"];
							$otchestvo=$dat["otchestvo"];
							$email=$dat["email"];
							echo "$surname $name $otchestvo <br/>   
							<a href='mailto:$email' >$email</a>
							" ;
							?> <br/> <?
						
					} ?>
					
					<? 
					$surname=$data["surname"];
					echo "$surname" ;?>
			</div>
		</div>	</center>
		</center>
		</body>
</html>