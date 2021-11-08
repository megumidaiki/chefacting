<?php
session_start();
require_once(ROOT_PATH.'Controllers/PlayerController.php');
var_dump($_POST);
$id = $_POST['id']; 
$name = $_POST['name']; 
$furigana = $_POST['furigana'] ;
$y_o_experience = $_POST['y_o_experience'];
$possible_date = $_POST['possible_date'];
$cooking = $_POST['cooking'];
$hourly_wage = $_POST['hourly_wage'];
$area = $_POST['area'] ;
$mail = $_POST['mail'];
$self_pr = $_POST['self_pr'];

$Login = new PlayerController();
$params = $Login-> c_edit_update();





$_SESSION['mail'] = $mail;

header("Location: ../contacts/mypage.php");
?>