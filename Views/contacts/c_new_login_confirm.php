<?php
session_start();
require_once(ROOT_PATH.'Controllers/PlayerController.php');
$Login = new PlayerController();

$params = $Login->new_login();

if ($_POST['name'] == "") {
  $_SESSION['b']="名前は必須入力です。";
  header('Location:/contacts/c_new_login.php');
} elseif ($_POST['email']  == "") {
  $_SESSION['c']="メールアドレスは必須入力です。";
  header('Location:/contacts/c_new_login.php');
}elseif ($_POST['password']  == "") {
  $_SESSION['d']="パスワードは必須入力です。";
  header('Location:/contacts/c_new_login.php');
}elseif (!isset($_SESSION['a'])) {
  $param = $Login->new_login1();
}else {
  header('Location:/contacts/c_new_login.php');
}







?>
