<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Mypage extends Db{


    private $table = 'cook_matter';

    public function __construct($dbh = null){
        parent::__construct($dbh);
    }
    

  // 調理者の紐付け案件一覧
  public function findAll($id) {

    $name = $_SESSION['id']; 
    $sql = "SELECT * FROM $this->table 
    WHERE $name = $this->table.matter_id ";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

    // 調理者の紐付け応募者一覧
  public function findAll2($id) {

    $name = $_SESSION['id']; 
    $sql = "SELECT r.id,r.matter_id,r.requester_id,r.name,r.furigana,r.tell,r.mail,r.cook_area,r.what_time,r.time,r.remarks FROM cook_requester r
    LEFT JOIN cook_matter c
    ON r.matter_id = c.matter_id 
    WHERE r.matter_id = c.matter_id ";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

      // 依頼者の紐付け応募情報一覧
  public function findAll3($id) {

    $name = $_SESSION['id']; 
    $sql = "SELECT * FROM cook_requester 
    WHERE $name = cook_requester.requester_id 
    ";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

        // 依頼者の紐付け応募情報一覧
  public function findAll4($id) {
    $name = $_SESSION['id']; 
    $sql = "SELECT m.name,m.furigana,m.y_o_experience,m.possible_date,m.cooking,m.hourly_wage,m.area,m.mail,m.self_pr
    FROM cook_matter m
    LEFT JOIN  cook_requester r
    ON m.matter_id = r.matter_id 
    WHERE r.requester_id = $name
    ";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }


}

// SELECT
// 抽出したいカラム 
// FROM
// メインテーブル
// (RIGHT/LEFT)  JOIN
// 結合するテーブル１
// ON
// メインテーブルとリレーションしている外部キー(複合主キー)
// (RIGHT/LEFT) JOIN
// 結合するテーブル２
// ON
// メインテーブルとリレーションしている外部キー(複合主キー)
// WHERE
// 条件