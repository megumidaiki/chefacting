<?php

  session_start();
  require_once(ROOT_PATH.'Controllers/PlayerController.php');
  // var_dump($_POST['id']);

  $Insert = new PlayerController();
  $params = $Insert->c_coment();



  $id = htmlspecialchars($_POST['id']);
  $list = array("id" => $id) ;





  header("Content-type: application/json; charset=UTF-8");
  echo json_encode($list);




  exit;
  ?>




