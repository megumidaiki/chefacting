<?php
session_start();
require_once(ROOT_PATH.'Controllers/PlayerController.php');
$delete = new PlayerController();
$params_d = $delete->c_m_delt();
$_SESSION["d"]="aaa";

header('Location:/contacts/chef_post.php');


?>