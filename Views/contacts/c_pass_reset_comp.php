<?php
session_start();
require_once(ROOT_PATH.'Controllers/PlayerController.php');


if($_POST['password1'] == $_POST['password2']){

  $_POST['email']=$_SESSION['email'];
  $Login = new PlayerController();
  $params = $Login->c_login_change();
  $_SESSION['a']= 1;
  header('Location:/contacts/index.php');
}else {
  $_SESSION['t'] = 'パスワードが一致しません';
  header('Location:/contacts/r_pass_reset_con2.php');
}

?>
