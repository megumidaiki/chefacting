<?php
//データ更新

//データベースに接続
require_once(ROOT_PATH .'/Models/Db.php');

class Update extends Db {
  public function __construct($dbh = null) {
    parent::__construct($dbh);
  }

  public function editupdate($id = 0) {
    // $er = 0 ;
    $name = $_SESSION['name']; 
    $furigana = $_SESSION['furigana'] ;
    $y_o_experience = $_SESSION['y_o_experience'];
    $possible_date = $_SESSION['possible_date'];
    $cooking = $_SESSION['cooking'];
    $hourly_wage = $_SESSION['hourly_wage'];
    $area = $_SESSION['area'] ;
    $email = $_SESSION['email'];
    $body = $_SESSION['body'];
    // list($Y, $m, $d) = explode('-', $birth);
    // if(empty($_SESSION['name'])){
    //   $name_vl = 'この項目は必須入力です。';
    //   $er++;
    // }

    // if(empty($club)){
    //   $club_vl = 'この項目は必須入力です。';
    //   $er++;
    // }else {
    //   $club_vl = '';
    // }

    // if(empty($birth)){
    //   $birth_vl = 'この項目は必須入力です。';
    //   $er++;
    // }elseif ($birth !== date('Y-m-d',strtotime($birth))) {
    //   $birth_vl = '存在しない日付です。または不正な数字です。';
    //   $er++;
    // }else {
    //   $birth_vl = '';
    // }

    // if(empty($height)){
    //   $height_vl = 'この項目は必須入力です。';
    //   $er++;
    // }elseif(!preg_match("/^[0-9]+$/", $height)) {
    //   $height_vl = '番号は不正です。';
    //   $er++;
    // }else {
    //   $height_vl = '';
    // }

    // if(empty($weight)){
    //   $weight_vl = 'この項目は必須入力です。';
    //   $er++;
    // }elseif(!preg_match("/^[0-9]+$/", $weight)) {
    //   $weight_vl = '番号は不正です。';
    //   $er++;
    // }else {
    //   $weight_vl = '';
    // }

    // if(!preg_match("/^[0-9]+$/", $uniform_num)){
    //   $uniform_num_vl = '番号は不正です。';
    //   $er++;
    // }else {
    //   $uniform_num_vl = '';
    // }


    // if($er > 0){
    //   $_SESSION['uniform_num'] = $_POST['uniform_num'];
    //   $_SESSION['position'] = $_POST['position'];
    //   $_SESSION['name'] = $_POST['name'];
    //   $_SESSION['club'] = $_POST['club'];
    //   $_SESSION['country'] = $_POST['country'];
    //   $_SESSION['birth'] = $_POST['birth'];
    //   $_SESSION['height'] = $_POST['height'];
    //   $_SESSION['weight'] = $_POST['weight'];
    //   $_SESSION['id'] = $_POST['id'];
    //   $_SESSION['name_vl'] = $name_vl;
    //   $_SESSION['club_vl'] = $club_vl;
    //   $_SESSION['birth_vl'] = $birth_vl;
    //   $_SESSION['height_vl'] = $height_vl;
    //   $_SESSION['weight_vl'] = $weight_vl;
    //   $_SESSION['uniform_num_vl'] = $uniform_num_vl;
    //   $url = "../Players/edit.php?id=$id";
    //   header( 'Location:'.$url ) ;
    // }else{
      $sql="UPDATE cook_matter c SET c.name = '".$name."', c.furigana = '".$furigana."', c.y_o_experience = '".$y_o_experience."', c.possible_date = '".$possible_date."', c.cooking = '".$cooking."', c.hourly_wage = '".$hourly_wage."', c.area = '".$area."', c.email = '".$email."' , c.body = '".$body;
      $sth = $this->dbh->prepare($sql);
      $sth->bindParam();
      $sth->execute();

      // $_SESSION['name'] = NULL; 
      // $_SESSION['furigana']  = NULL;
      // $_SESSION['y_o_experience'] = NULL;
      // $_SESSION['possible_date'] = NULL;
      // $_SESSION['cooking'] = NULL;
      // $_SESSION['hourly_wage'] = NULL;
      // $_SESSION['area'] = NULL;
      // $_SESSION['email'] = NULL;
      // $_SESSION['body'] = NULL;

      // $url = "../Players/index.php";
      // header( 'Location:'.$url ) ;
    // }
  }


  //データ更新
  public function contactUpdate($name,$furigana,$y_o_experience,$possible_date,$cooking,$hourly_wage,$area,$mail,$self_pr,$id):Array {
    try {
      $this->dbh->beginTransaction();


        //バリデーション
      // $name_count = mb_strlen($name);
      // $kana_count = mb_strlen($kana);
         
      // $val_address = "/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/";

      // if ($name == "" || $kana == "" || $email == "" || $body== "") {
      //   return header('Location: edit.php?id='.$id.'');
      //   exit();
      // } else {
      //   false;
      // }

      // if(10 <= $name_count) {
      //   return header('Location: edit.php?id='.$id.'');
      //   exit();
      // } else {
      //   false;
      // }

      // if(10 <= $kana_count) {
      //   return header('Location: edit.php?id='.$id.'');
      //   exit();
      // } else {
      //   false;
      // }

      // if ((preg_match('/^[0-9]+$/', $tel) == 0)) {
      //   return header('Location: edit.php?id='.$id.'');
      //   exit();
      // } else {
      //   false;
      // }

      // if ((preg_match($val_address, $email) == 0)) {
      //   return header('Location: edit.php?id='.$id.'');
      //   exit();
      // } else {
      //   false;
      // }
      
      $sql = 'UPDATE cook_matter SET name=?, furigana=?, y_o_experience=?, possible_date=?, cooking=?, hourly_wage=?, area=?, mail=? , self_pr=? WHERE id=?';
      $sth = $this->dbh->prepare($sql);
      $data[] = $name;
      $data[] = $furigana;
      $data[] = $y_o_experience;
      $data[] = $possible_date;
      $data[] = $cooking;
      $data[] = $hourly_wage;
      $data[] = $area;
      $data[] = $mail;
      $data[] = $self_pr;
      $data[] = $id;
      $sth->execute($data);

      $this->dbh->commit();

      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $result;

    } catch (Exception $e) {
      $this->dbh->rollBack();
      echo $e;
      echo 'ただいま障害によりエラーが発生しております。';
      exit();
    }
  }

   //データ更新
   public function contactUpdate2($name,$furigana,$tell,$mail,$cook_area,$what_time,$time,$remarks,$id):Array {
    try {
      $this->dbh->beginTransaction();


        //バリデーション
      // $name_count = mb_strlen($name);
      // $kana_count = mb_strlen($kana);
         
      // $val_address = "/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/";

      // if ($name == "" || $kana == "" || $email == "" || $body== "") {
      //   return header('Location: edit.php?id='.$id.'');
      //   exit();
      // } else {
      //   false;
      // }

      // if(10 <= $name_count) {
      //   return header('Location: edit.php?id='.$id.'');
      //   exit();
      // } else {
      //   false;
      // }

      // if(10 <= $kana_count) {
      //   return header('Location: edit.php?id='.$id.'');
      //   exit();
      // } else {
      //   false;
      // }

      // if ((preg_match('/^[0-9]+$/', $tel) == 0)) {
      //   return header('Location: edit.php?id='.$id.'');
      //   exit();
      // } else {
      //   false;
      // }

      // if ((preg_match($val_address, $email) == 0)) {
      //   return header('Location: edit.php?id='.$id.'');
      //   exit();
      // } else {
      //   false;
      // }
      
      $sql = 'UPDATE cook_requester SET name=?, furigana=?, tell=?, mail=?, cook_area=?, what_time=?, time=?, remarks=? WHERE id=?';
      $sth = $this->dbh->prepare($sql);
      $data[] = $name;
      $data[] = $furigana;
      $data[] = $tell;
      $data[] = $mail;
      $data[] = $cook_area ;
      $data[] = $what_time;
      $data[] = $time ;
      $data[] = $remarks ;
      $data[] = $id;
      $sth->execute($data);

      $this->dbh->commit();

      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $result;

    } catch (Exception $e) {
      $this->dbh->rollBack();
      echo $e;
      echo 'ただいま障害によりエラーが発生しております。';
      exit();
    }
  }


}
