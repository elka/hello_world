<?php 
        include_once('misc.php');
        $rv = 0;
        if( isset($_POST['login']) && isset($_POST['name']) && isset($_POST['surname']) &&
                isset($_POST['pass'])) {
                $rv = reg_user($_POST['login'], $_POST['pass'],$_POST['surname'],$_POST['name'],$_POST['otchestvo'],$_POST['email']);
                if(!$rv) {
                        session_start();
                        $_SESSION['login'] = $_POST['login'];
                        header('Location:index.php');
                }
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
		<div class="shapka">
			<div class="shl">Регистрация </div>
			<div class="shr">
				<a id="r"href="reg.php" >Регистрация</a></li>
                <form action="login.php" method="POST">
                    <input type="textfield" name="login"/>
                    <input type="password" name="pass"/>
					<br>
                    <input type="submit" value="Войти"/>
                </form>
			</div>
		</div>
		<div class="osn">
		<form action="reg.php" method="POST">
						 <? if($rv) { ?>
                        <div class="warning">
                                <?=$rv?>
                        </div>
						<? } ?>
                        <table class="reg">
                                <tr>
                                        <td>Логин:</td>
                                        <td><input type="textfield" name="login"/></td>
                                </tr>
                                <tr>
                                        <td>Пароль:</td>
                                        <td><input type="password" name="pass"/></td>
                                </tr>
								<tr>
                                        <td>Фамилия:</td>
                                        <td><input type="textfield" name="surname"/></td>
                                </tr>
								<tr>
                                        <td>Имя:</td>
                                        <td><input type="textfield" name="name"/></td>
                                </tr>
								<tr>
                                        <td>Отчество:</td>
                                        <td><input type="textfield" name="otchestvo"/></td>
                                </tr>
								<tr>
                                        <td>E-mail:</td>
                                        <td><input type="email" name="email"/></td>
                                </tr>
                                <tr>
                                        <td colspan="2">
                                                <input type="submit" value="Регистрация"/>
                                        </td>
                                </tr>
                        </table>
                </form>
		</div>
		</body>
</html>
      