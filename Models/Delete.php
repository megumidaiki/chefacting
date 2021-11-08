<?php
require_once(ROOT_PATH .'/Models/Db.php');
//construct構築する

class Delete extends Db {
  public function __construct($dbh = null) {
    parent::__construct($dbh);
  }

public function finddl($id = 0){
  //del_flgを1にする
    $sql = 'UPDATE cook_matter  ';
    $sql .= ' WHERE id = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
}

public function findd($id = 0){
  //del_flgを1にする
    $sql = 'UPDATE cook_matter  ';
    $sql .= ' WHERE matter_id = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':matter_id', $id, PDO::PARAM_INT);
    $sth->execute();
}

public function findd2($id = 0){
  //del_flgを1にする
    $sql = 'UPDATE cook_requester ';
    $sql .= ' WHERE id = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
}

//データ削除（調理者案件）
public function contactDelete($id = 0):Array {
  try {
    $this->dbh->beginTransaction();

    $sql = 'DELETE FROM '.'cook_matter'.' WHERE id=?';
    $sth = $this->dbh->prepare($sql);
    $data[] = $id;
    $sth->execute($data);

    $this->dbh->commit();

    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;

  } catch (Exception $e) {
    $this->dbh->rollBack();

    return 'ただいま障害によりエラーが発生しております。';
    exit();
  }
}

//データ削除（調理者案件の依頼者）
public function contactDelete2($id = 0):Array {
  try {
    $this->dbh->beginTransaction();

    $sql = 'DELETE FROM '.'cook_requester'.' WHERE matter_id=?';
    $sth = $this->dbh->prepare($sql);
    $data[] = $id;
    $sth->execute($data);

    $this->dbh->commit();

    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;

  } catch (Exception $e) {
    $this->dbh->rollBack();

    return 'ただいま障害によりエラーが発生しております。';
    exit();
  }
}


//データ削除（調理者案件の依頼者）
public function contactDelete3($id = 0):Array {
  try {
    $this->dbh->beginTransaction();

    $sql = 'DELETE FROM '.'cook_requester'.' WHERE requester_id=?';
    $sth = $this->dbh->prepare($sql);
    $data[] = $id;
    $sth->execute($data);

    $this->dbh->commit();

    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;

  } catch (Exception $e) {
    $this->dbh->rollBack();

    return 'ただいま障害によりエラーが発生しております。';
    exit();
  }
}

//コメント削除（調理者案件の依頼者）
public function comentDelete($id = 0):Array {
  try {
    $this->dbh->beginTransaction();

    $sql = 'DELETE FROM '.'item'.' WHERE id=?';
    $sth = $this->dbh->prepare($sql);
    $data[] = $id;
    $sth->execute($data);

    $this->dbh->commit();

    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;

  } catch (Exception $e) {
    $this->dbh->rollBack();

    return 'ただいま障害によりエラーが発生しております。';
    exit();
  }
}











}









?>