<?php
session_start();
require_once(ROOT_PATH.'Controllers/PlayerController.php');

$Login = new PlayerController();
$params = $Login->login_view2();

?>