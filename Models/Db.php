<?php
//データベースに接続を担当

//データベースの情報の取得
require_once(ROOT_PATH .'/database.php');

//データベース接続用のクラス
class Db {
  //アクセスの禁止
  protected $dbh;

public function __construct($dbh = null) {
     if(!$dbh) {//接続情報が存在しない場合
      try {
        $this->dbh = new PDO (
          //データベースPHPから情報を取得
            'mysql:dbname='.DB_NAME.
            ';host='.DB_HOST, DB_USER, DB_PASSWD
        );
        //接続成功
      } catch (PDOException $e) {
        echo "接続失敗：".$e->getMessage() . "\n";
        exit();
      }
    }else {//接続情報が存在する場合
      $this->dbh =$dbh;
    }
  }
  public function get_db_handler() {
    return $this->dbh;
  }
}