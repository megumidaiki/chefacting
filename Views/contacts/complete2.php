
<?php
session_start();
require_once(ROOT_PATH.'Controllers/PlayerController.php');
 $_POST['matter_id'] =$_SESSION['matter_id'];

 $edit = new PlayerController();
 $edit->complete2();

$_SESSION['time'] = $_POST['time'];
$_SESSION['email1'] = $_POST['mail'];
$_SESSION['matter_id'] = $_POST['matter_id'];

$messge = "応募完了しました。\r\n"."調理者からの連絡お待ちください"."\r\n";
mail($_SESSION['email1'],'応募完了しました',$messge);
$_SESSION['email1'] =NULL;

$params = $edit->c_mail();


$messge2 = "応募ありました。\r\n"."マイページをご確認ください"."\r\n";
mail($params[0]["mail"],'応募がありました',$messge2);





header('Location:/contacts/matter_list.php');

?>











