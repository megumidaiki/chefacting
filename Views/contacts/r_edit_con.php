<?php
session_start();
require_once(ROOT_PATH.'Controllers/PlayerController.php');
var_dump($_POST);
$id = $_POST['id']; 
$name = $_POST['name']; 
$furigana = $_POST['furigana'] ;
$tell = $_POST['tell'];
$mail = $_POST['mail'];
$cook_area = $_POST['cook_area'];
$what_time= $_POST['what_time'];
$time = $_POST['time'] ;
$remarks = $_POST['remarks'];

$Login = new PlayerController();
$params = $Login-> c_edit_update2();





$_SESSION['mail'] = $mail;

header("Location: ../contacts/r_mypage.php");
?>