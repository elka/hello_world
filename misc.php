<?php
function auth() {
        session_start();
        if(!isset($_SESSION['login'])){ 
                if( isset($_COOKIE['login']) &&
                        isset($_COOKIE['pass_hash'])) {
                        $login = $_COOKIE['login'];
                        $pass_hash = $_COOKIE['pass_hash'];
                        if(check_user($login, $pass_hash)) {
                                $_SESSION['login'] = $login;
                        }
                }
        } else {
                $login = $_SESSION['login'];
        }
        return $login;
}

function check_user($login, $hash) {
        $db = connectdb();
        $query = "SELECT * FROM users 
                          WHERE 
                                login = '$login' AND
                                pass_hash = sha1('$hash')";
        $res = mysql_query($query);
        return mysql_num_rows($res);
}

function reg_user($login, $pass, $surname, $name, $otchestvo, $email) {
        if($login == '' || $pass == '') {
                return 'Empty login or pass';
        }
        $db = connectdb();
        $query = "SELECT * FROM users WHERE login = '$login'";
        $res = mysql_query($query, $db);
        if(mysql_num_rows($res) > 0) {
                return 'Login exists';
        }
        $query = "INSERT INTO users(login, pass_hash, surname, name, otchestvo, email) 
                                        VALUES('$login',sha1('$pass'),'$surname', '$name', '$otchestvo', '$email')";
        if(!mysql_query($query)) {
                return 'DB error. Try later';
        }
        return 0;
}

function connectdb() {
        $db = mysql_connect('localhost', 'root', '');
        mysql_select_db('site');
        return $db;
}




?>
