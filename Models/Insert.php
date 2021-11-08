<?php
  require_once(ROOT_PATH .'/Models/Db.php');
//DB接続
   class Insert extends Db {
    private $table = 'cook_matter';
    private $table2 = 'cook_requester';

    public function __construct($dbh = null) {
      parent::__construct($dbh);
    }

    public function Create($matter_id, $name, $furigana, $y_o_experience, $possible_date, $cooking ,$hourly_wage ,$area ,$email ,$body) {
 
      try {
        $this->dbh->beginTransaction();

        $sql = 'INSERT INTO '.$this->table.'(matter_id,name, furigana, y_o_experience, possible_date, cooking, hourly_wage, area, mail, self_pr) VALUES (?, ?, ?, ?, ?, ?, ? ,? ,? ,?)';
        $sth = $this->dbh->prepare($sql);
        $data[] = $matter_id;
        $data[] = $name;
        $data[] = $furigana;
        $data[] = $y_o_experience;
        $data[] = $possible_date;
        $data[] = $cooking;
        $data[] = $hourly_wage;
        $data[] = $area;
        $data[] = $email;
        $data[] = $body;
        $sth->execute($data);
  
        $this->dbh->commit();
  
      } catch (Exception $e) {
        $this->dbh->rollBack();
        echo $e;
  
        echo 'ただいま障害によりエラーが発生しております。';
        exit();
      }
    }

    public function Create2($matter_id,$requester_id, $name, $furigana, $tell, $mail, $cook_area ,$what_time ,$time ,$remarks) {
      try {
        $this->dbh->beginTransaction();

        $sql = 'INSERT INTO '.$this->table2.'(matter_id, requester_id, name, furigana, tell, mail, cook_area , what_time ,time ,remarks) VALUES (?,?,?, ?, ?, ?, ?, ?, ? ,? )';
        $sth = $this->dbh->prepare($sql);
        $data[] = $matter_id;
        $data[] = $requester_id;
        $data[] = $name;
        $data[] = $furigana;
        $data[] = $tell;
        $data[] = $mail;
        $data[] = $cook_area;
        $data[] = $what_time;
        $data[] = $time;
        $data[] = $remarks;
        $sth->execute($data);
  
        $this->dbh->commit();


  
      } catch (Exception $e) {
        $this->dbh->rollBack();
        echo $e;
  
        echo 'ただいま障害によりエラーが発生しております。';
        exit();
      }
    }

    public function c_coment($id,$c_id,$name) {

      try {
        $this->dbh->beginTransaction();
        $sql = 'INSERT INTO item ( title,c_id,name ) VALUES ( ? ,?,?)';
        $sth = $this->dbh->prepare($sql);
        $data[] = $id;
        $data[] = $c_id;
        $data[] = $name;
        $sth->execute($data);
        
  
        $this->dbh->commit();
  
      } catch (Exception $e) {
        $this->dbh->rollBack();
        echo $e;
  
        echo 'ただいま障害によりエラーが発生しております。';
        exit();
      }
    }

    public function r_coment($id,$c_id) {

      try {
        $this->dbh->beginTransaction();
        $sql = 'INSERT INTO item ( title,r_id ) VALUES ( ? ,?)';
        $sth = $this->dbh->prepare($sql);
        $data[] = $id;
        $data[] = $c_id;
        $sth->execute($data);
        
  
        $this->dbh->commit();
  
      } catch (Exception $e) {
        $this->dbh->rollBack();
        echo $e;
  
        echo 'ただいま障害によりエラーが発生しております。';
        exit();
      }
    }


  }
  ?>