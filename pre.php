<?php
	include_once('misc.php');
	$login = auth();
	$predmets=array();
	$zadanies=array();
	$db = connectdb();
	$query = "SELECT predmet FROM pred where login='$login'";
	$com = mysql_query($query);
	if ($com!="") {
		while ($row=mysql_fetch_assoc($com)) {
			$predmets[]= $row['predmet'];
		};
	};
	$pre=$_GET['pre'];
	$query = "SELECT * FROM zadanie where ((login='$login')AND(predmet='$pre'))" ;
	$com1 = mysql_query($query);
	
	if ($com1!="") {
		while ($row1=mysql_fetch_assoc($com1)) {
			$zadanies[]= array ("razdel" => $row1['razdel'], 
							"id" => $row1['id'],
							"name" => $row1['name']);
		};
	};
	$pre=$_GET['pre'];
	
	
		$comments[] = array();
		$query = "SELECT * FROM pos where predmet='$pre'";
		$com = mysql_query($query);
		while ($row=mysql_fetch_assoc($com)) {
		$comments[] = array("title" => $row['title'],
                                    "post" => $row['post']);
		}
?>
<!DOCTYPE html> <!-- HTML 5.0 -->
<html>
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset = utf-8" />
				<link rel="stylesheet" type="text/css" href="style.css"/>
                <title>Проект Бабальянц, Горяченкова</title>
        </head>
        <body>
		<center>
		<div class="shapka">
			<div class="shl">Добро пожаловать, <? echo " $login " ?> </div>
			<div class="shr1"><a id="r"href="index.php" >На главную</a> | <a id="r"href="logout.php" >Выйти</a></div> 
		</div>
		<div class="tel">
			<div class="predmet">
			
				<div class="zag1">Предметы</div>
				<ul>
					<? foreach($predmets as $predmet){
					
						echo "<li>
							<a id='r' href='pre.php?pre=$predmet'> $predmet</a> 
							<a href='delpre.php?predmet=$predmet'><img src='img/2.png' /> </a> 
						</li>" ; 
					} ?>
				</ul>
				<form action="inspre.php" method="POST">
					<input type="textfield" name="predmet"/>
					<input type="submit" value="Добавить предмет"/>
				</form>
			</div>
			
			<? if (isset($_GET['pre'])) {?>
				<div class="telo">
				
					<div class="zag1">Добавить задание</div>
					<?  foreach($zadanies as $zadanie){
							if ($zadanie["razdel"]==1) { 
							$k1=$zadanie["name"]; 
							echo " <span class='t1'> $k1 </span>"; 
							$id=$zadanie["id"];
							$pre=$_GET['pre'];
							echo $pre;
							echo "<a href='del.php?id=$id&pre=$pre'><img src='img/3.png' /></a> " ;
							?> <br/> <?
						}
					} 
					
					?>
					<form enctype="multipart/form-data" action="add.php?z=1" method="POST">
					<!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
					<input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
					<!-- Название элемента input определяет имя в массиве $_FILES -->
					Введите имя файла
					<input type="textfield" name="name"  />
					<input name="userfile" type="file" />
					<? echo "<input type='hidden' name='pre' value=$pre />" ?>
					<input type="submit" value="Добавить" />
					</form>
					
					<br/>
					<div class="zag1">Добавить материалы курса</div>
					<?  foreach($zadanies as $zadanie){
							if ($zadanie["razdel"]==2) { 
							$k1=$zadanie["name"]; 
							echo " $k1 "; 
							$id=$zadanie["id"];
							echo "<a href='del.php?id=$id&pre=$pre'><img src='img/3.png' /></a> " ;
							?> <br/> <?
						}
					} ?>
					
					<form enctype="multipart/form-data" action="add.php?z=2" method="POST">
					<!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
					<input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
					<!-- Название элемента input определяет имя в массиве $_FILES -->
					Введите имя файла
					<input type="textfield" name="name"  />
					<input name="userfile" type="file" />
					<? echo "<input type='hidden' name='pre' value=$pre />" ?>
					<input type="submit" value="Добавить" />
					</form>
					
					<br/>
					<div class="zag1">Добавить полезные ресурсы</div>
					<?  foreach($zadanies as $zadanie){
							if ($zadanie["razdel"]==3) { 
							$k1=$zadanie["name"]; 
							echo " $k1 "; 
							$id=$zadanie["id"];
							echo "<a href='del.php?id=$id&pre=$pre'><img src='img/3.png' /></a> " ;
							?> <br/> <?
						}
					} ?>
					
					<form action="add1.php?z=3" method="POST">
					Введите имя файла
					<input type="textfield" name="name"  />
					Введите полный адрес ссылки<input name="ssulka" type="textfield" />
					<? echo "<input type='hidden' name='pre' value=$pre />" ?>
					<input type="submit" value="Добавить" />
					</form>
					
					<? 
		
					foreach($comments as $comment) {
                        echo "<b>{$comment["title"]}</b>  
                                  <br />
                              <p>{$comment["post"]}</p>";
						}
					?>
					<form action="newpost.php" method="POST">  
						Title: <input type="textfield" name="title" />
					<br />
					<? echo "<input type='hidden' name='pre' value=$pre />" ?>
					<textarea name="post"></textarea>
					<br />
					<input type="submit" value="Запостить" />
        </form>
				</div>
				
			<? } ?>
		</div>
		</center>
		</body>
</html>