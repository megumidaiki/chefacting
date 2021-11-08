<?php
require_once(ROOT_PATH.'Controllers/PlayerController.php');
$delete = new PlayerController();

$params_d = $delete->r_m_delt();

header('Location:/contacts/r_mypage.php');


?>