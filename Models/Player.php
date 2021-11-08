<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Matter_list extends Db {
  private $table = 'cook_matter';

  public function __construct($dbh = null) {
    parent::__construct($dbh);
  }

  // * playerテーブルから全て取得
  public function findAll($page = 0) {
    $sql = "SELECT * FROM $this->table ";
    // $sql .= ' WHERE del_flg = 0';
    $sql .= ' LIMIT 20 OFFSET '.(20 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

  public function findById($id = 0) {
    $sql = "SELECT $this->table.* FROM $this->table ";
    $sql .= " WHERE $this->table.id = :id";
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
}

public function findById2($id = 0) {
  $sql = "SELECT cook_requester.* FROM cook_requester ";
  $sql .= " WHERE cook_requester.id = :id";
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id', $id, PDO::PARAM_INT);
  $sth->execute();
  $result = $sth->fetch(PDO::FETCH_ASSOC);
  return $result;
}

  public function countAll():int {
    $sql = 'SELECT count(*) as count FROM cook_matter';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $count = $sth->fetchColumn();
    return $count;
  }



// 案件応募切り替え
  public function findAll2($id = 0):array {
    $sql = "SELECT c.requester_id FROM  cook_requester c";
    $sql .= " WHERE c.requester_id = :id";
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

public function findAll3($id = 0):array {
  $sql = "SELECT c.matter_id FROM  cook_matter c";
  $sql .= " WHERE c.matter_id = :id";
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id', $id, PDO::PARAM_INT);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function c_All($id = 0):array {
  $sql = "SELECT * FROM  cook_users c";
  $sql .= " WHERE c.id = :id";
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id', $id, PDO::PARAM_INT);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function r_All($id = 0):array {
  $sql = "SELECT * FROM  requester_users c";
  $sql .= " WHERE c.id = :id";
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id', $id, PDO::PARAM_INT);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function comentAll($page = 0) {

  $sql = "SELECT i.title,i.name,i.created_ad	  FROM item i
  LEFT OUTER JOIN cook_users c
  ON i.c_id = c.id
  LEFT OUTER JOIN requester_users r
  ON i.r_id = r.id";
  $sql .= ' LIMIT 20 OFFSET '.(20 * $page);
  $sth = $this->dbh->prepare($sql);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function c_countAll():int {
  $sql = 'SELECT count(*) as count FROM item';
  $sth = $this->dbh->prepare($sql);
  $sth->execute();
  $count = $sth->fetchColumn();
  return $count;
}

// $page = 0;
// if(isset($this->request['get']['page'])) {
//     $page = $this->request['get']['page'];
// }
//  $players = $this->Player->findAll($page);
//  $players_count = $this->Player->countAll();
//  $params = [
//    'players' => $players,
//    'pages' => $players_count / 20
//  ];
//  return $params;

public function c_r_All($id):array {
  $sql = "SELECT cook_requester.* FROM  cook_requester";
  $sql .= " WHERE cook_requester.requester_id = '".$id."'";
  $sth = $this->dbh->prepare($sql);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function c_mail($id):array {
  $sql = "SELECT cook_matter.mail FROM  cook_matter";
  $sql .= " WHERE cook_matter.matter_id = '".$id."'";
  $sth = $this->dbh->prepare($sql);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);




  return $result;
}






}


