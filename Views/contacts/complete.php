<?php

session_start();
require_once(ROOT_PATH.'Controllers/PlayerController.php');

// $_SESSION['name'] = $_POST['name'];
// $_SESSION['furigana'] = $_POST['furigana'];
// $_SESSION['y_o_experience'] = $_POST['y_o_experience'];
// $_SESSION['possible_date'] = $_POST['possible_date'];
// $_SESSION['cooking'] = $_POST['cooking'];
// $_SESSION['hourly_wage'] = $_POST['hourly_wage'];
// $_SESSION['area'] = $_POST['area'];
// $_SESSION['email'] = $_POST['email'];
// $_SESSION['body'] = $_POST['body'];

$edit = new PlayerController();
$edit->complete();
header('Location:/contacts/chef_post.php');



  
?>