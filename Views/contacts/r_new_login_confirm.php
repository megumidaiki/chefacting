<?php
session_start();
require_once(ROOT_PATH.'Controllers/PlayerController.php');

if ($_POST['name'] == "") {
  $_SESSION['b']="名前は必須入力です。";
  header('Location:/contacts/r_new_login.php');
} 

if ($_POST['email']  == "") {
  $_SESSION['c']="メールアドレスは必須入力です。";
  header('Location:/contacts/r_new_login.php');
} 

if ($_POST['password']  == "") {
  $_SESSION['d']="パスワードは必須入力です。";
  header('Location:/contacts/r_new_login.php');
}


$Login = new PlayerController();

$params = $Login->new_login3();
if(!isset($_SESSION['a'])){
  $param = $Login->new_login2();
  $_SESSION['na']=1;
  header('Location:/contacts/index.php');
}else{
  header('Location:/contacts/r_new_login.php');
}






?>