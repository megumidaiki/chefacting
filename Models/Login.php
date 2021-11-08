<?php

require_once(ROOT_PATH.'/Models/Db.php');



class Login extends Db{

    public function __construct($dbh = null){
        parent::__construct($dbh);
    }


	public function login(){

		$email=$_POST['email'];
		$password= $_POST['password'];

    $sql="SELECT * FROM cook_users WHERE email=?";
		$sth=$this->dbh->prepare($sql);
		$sth->execute(array($email));
		$result=$sth->fetch(PDO::FETCH_ASSOC);

		if(!isset($result['email'])){
      $_SESSION['o']="エラー";
			header('Location:/contacts/index.php');
			return false;
		}
    $hash=password_hash($result['password'],PASSWORD_DEFAULT);
		if(password_verify ($password , $hash ) ){
			$_SESSION['role']=$result['role'];
			$_SESSION['id']=$result['id'];
			$_SESSION['name']=$result['name'];
			header('Location:/contacts/chef_post.php');
		}else{
      $_SESSION['o']="エラー";
			header('Location:/contacts/index.php');

			exit;
		}
	}
	public function c_login_re($email,$password){


    $sql="SELECT * FROM cook_users WHERE email=?";
		$sth=$this->dbh->prepare($sql);
		$sth->execute(array($email));
		$result=$sth->fetch(PDO::FETCH_ASSOC);

		if(!isset($result['email'])){
			echo "<p>メールアドレスまたはパスワードが間違っています。</p>";
			echo "<a href='index.php'>戻る</a>";
			return false;
		}
    $hash=password_hash($result['password'],PASSWORD_DEFAULT);
		if(password_verify ($password , $hash ) ){
			$_SESSION['role']=$result['role'];
			$_SESSION['id']=$result['id'];
			$_SESSION['name']=$result['name'];
			header('Location:/contacts/chef_post.php');
		}else{
			echo "<p>メールアドレスまたはパスワードが間違っています。</p>";
			echo "<a href='index.php'>戻る</a>";

			exit;
		}
	}
	public function login2(){

		$email=$_POST['email'];
		$password= $_POST['password'];

    $sql="SELECT * FROM requester_users WHERE email=?";
		$sth=$this->dbh->prepare($sql);
		$sth->execute(array($email));
		$result=$sth->fetch(PDO::FETCH_ASSOC);

		if(!isset($result['email'])){
      $_SESSION['o']="エラー";
			header('Location:/contacts/index.php');
			return false;
		}
    $hash=password_hash($result['password'],PASSWORD_DEFAULT);
		if(password_verify ($password , $hash ) ){
			$_SESSION['role']=$result['role'];
			$_SESSION['id']=$result['id'];
			$_SESSION['name']=$result['name'];
			header('Location:/contacts/matter_list.php');
		}else{
      $_SESSION['o']="エラー";
			header('Location:/contacts/index.php');

			exit;
		}
	}

	public function c_login_reset(){

		$email=$_POST['email'];
		$password= $_POST['password'];

    $sql="SELECT * FROM cook_users WHERE email=?";
		$sth=$this->dbh->prepare($sql);
		$sth->execute(array($email));
		$result=$sth->fetch(PDO::FETCH_ASSOC);

		if(!isset($result['email'])){
      $_SESSION['t']="エラー";
			header('Location:/contacts/c_pass_reset_con.php');
			return false;
		}
    $hash=password_hash($result['password'],PASSWORD_DEFAULT);
		if(password_verify ($password , $hash ) ){
			$_SESSION['role']=$result['role'];
			$_SESSION['id']=$result['id'];

		}else{
      $_SESSION['t']="エラー";
			header('Location:/contacts/c_pass_reset_con.php');

			exit;
		}
	}

	public function r_login_reset(){

		$email=$_POST['email'];
		$password= $_POST['password'];

    $sql="SELECT * FROM requester_users WHERE email=?";
		$sth=$this->dbh->prepare($sql);
		$sth->execute(array($email));
		$result=$sth->fetch(PDO::FETCH_ASSOC);

		if(!isset($result['email'])){
      $_SESSION['t']="エラー";
			$_SESSION['email']= $_POST['email'];
			header('Location:/contacts/r_pass_reset_con.php');
			return false;
		}
    $hash=password_hash($result['password'],PASSWORD_DEFAULT);
		if(password_verify ($password , $hash ) ){
			$_SESSION['role']=$result['role'];
			$_SESSION['id']=$result['id'];

		}else{
      $_SESSION['t']="エラー";
			$_SESSION['email']= $_POST['email'];
			header('Location:/contacts/r_pass_reset_con.php');

			exit;
		}
	}

	public function c_new_login($name,$email,$password){


		try {
			$this->dbh->beginTransaction();

			$sql = 'INSERT INTO '.'cook_users'.'(name,email,password ) VALUES (?, ?, ?)';
			$sth = $this->dbh->prepare($sql);
			$data[] = $name;
			$data[] = $email;
			$data[] = $password;

			$sth->execute($data);

			$this->dbh->commit();

			$_SESSION['na'] = $data;
			header('Location:/contacts/index.php');


		} catch (Exception $e) {
			$this->dbh->rollBack();
			echo $e;

			echo 'ただいま障害によりエラーが発生しております。';
			exit();
		}
	}

	public function c_new_login2($email){

    $sql="SELECT * FROM cook_users  WHERE email=?";
		$sth=$this->dbh->prepare($sql);
		$sth->execute(array($email));
		$result=$sth->fetch(PDO::FETCH_ASSOC);

		if(isset($result['email'])){
			$_SESSION['a']="メールアドレスはすでに登録されています。";
			return false;
		}
	}

	public function r_new_login2($email){

    $sql="SELECT * FROM requester_users  WHERE email=?";
		$sth=$this->dbh->prepare($sql);
		$sth->execute(array($email));
		$result=$sth->fetch(PDO::FETCH_ASSOC);

		if(isset($result['email'])){
			$_SESSION['a']="メールアドレスはすでに登録されています。";
			return false;
		}
	}


	public function r_new_login($name,$email,$password){

		try {
			$this->dbh->beginTransaction();

			$sql = 'INSERT INTO '.'requester_users'.'(name,email,password ) VALUES (?, ?, ?)';
			$sth = $this->dbh->prepare($sql);
			$data[] = $name;
			$data[] = $email;
			$data[] = $password;

			$sth->execute($data);

			$this->dbh->commit();

			$_SESSION['name'] = $data;
			header('Location:/contacts/index.php');



		} catch (Exception $e) {
			$this->dbh->rollBack();
			echo $e;

			echo 'ただいま障害によりエラーが発生しております。';
			exit();
		}
	}

	public function login21(){

		$email=$_POST['email'];

    $sql="SELECT * FROM cook_users  WHERE email=?";
		$sth=$this->dbh->prepare($sql);
		$sth->execute(array($email));
		$result=$sth->fetch(PDO::FETCH_ASSOC);

		if(!isset($result['email'])){
      $_SESSION['m']="エラー";
			header('Location:/contacts/c_pass_reset.php');
			return false;
		}

	}

	public function login211(){

		$email=$_POST['email'];

    // ランダムパスワード生成
		$pass = bin2hex(random_bytes(5));
		// メール内容
		$messge = "パスワード変更しました。\r\n".$pass."\r\n";
		mail( $email,'パスワード変更しました',$messge);
    $hash=password_hash($pass,PASSWORD_DEFAULT);


		

		$sql = "UPDATE cook_users  SET password = '".$pass."' WHERE email ='".$email."'";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

	}

	public function c_login_change($pass,$email){

	
		$sql = "UPDATE cook_users  SET password = '".$pass."' WHERE email ='".$email."'";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

	}

	public function r_login_change($pass,$email){

	
		$sql = "UPDATE requester_users SET password = '".$pass."' WHERE email ='".$email."'";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

	}

	public function r_login_re1(){

		$email=$_POST['email'];

    $sql="SELECT * FROM requester_users WHERE email=?";
		$sth=$this->dbh->prepare($sql);
		$sth->execute(array($email));
		$result=$sth->fetch(PDO::FETCH_ASSOC);

		if(!isset($result['email'])){
      $_SESSION['m'] = 1;
			header('Location:/contacts/r_pass_reset.php');
			return false;
		}

	}

	public function r_login_re2(){

		$email=$_POST['email'];

    // ランダムパスワード生成
		$pass = bin2hex(random_bytes(5));
		// メール内容
		$messge = "パスワード変更しました。\r\n".$pass."\r\n";
		mail( $email,'パスワード変更しました',$messge);
    $hash=password_hash($pass,PASSWORD_DEFAULT);


		

		$sql = "UPDATE requester_users  SET password = '".$pass."' WHERE email ='".$email."'";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

	}


















	

	public function login22(){

		$email=$_POST['email'];


    // ランダムパスワード生成
		$pass = bin2hex(random_bytes(5));
		// メール内容
		$messge = "パスワード変更しました。\r\n".$pass."\r\n";
		mail( $email,'パスワード変更しました',$messge);
    $hash=password_hash($pass,PASSWORD_DEFAULT);


		try {
		$this->dbh->beginTransaction();
		

		$sql2 = "UPDATE cook_users c SET c.password = ".$pass." WHERE c.email = ".$email;
		$sth2 = $this->dbh->prepare($sql2);
		$sth2->execute();


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