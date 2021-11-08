<?php
require_once(ROOT_PATH.'/Models/Player.php');
require_once(ROOT_PATH .'/Models/Mypage.php');
require_once(ROOT_PATH .'/Models/Delete.php');
require_once(ROOT_PATH .'/Models/Update.php');
require_once(ROOT_PATH .'/Models/Login.php');
require_once(ROOT_PATH .'/Models/Insert.php');


class PlayerController{
   private $request;
   private $Matter_list; 
   private $mypage;
   private $Delete;
   private $Update;
   private $Login;
   private $Insert;

   public function __construct(){
     // リクエストパラメーターの取得
     $this->request['get'] = $_GET;
     $this->request['post'] = $_POST;     

     //  モデルオブジェクトの作成
     $this->Matter_list = new Matter_list();
    $dbh = $this->Matter_list->get_db_handler();
    $this->Mypage = new Mypage($dbh);
    $this->Delete = new Delete($dbh);
    $this->Update = new Update($dbh);
    $this->Login = new Login($dbh);
    $this->Insert = new Insert($dbh);
}

   public function index(){
    $page = 0;
    if(isset($this->request['get']['page'])) {
        $page = $this->request['get']['page'];
    }
     $Matter_lists = $this->Matter_list->findAll($page);
     $Matter_list_count = $this->Matter_list->countAll();
     $params = [
       'Matter_lists' => $Matter_lists,
       'pages' => $Matter_list_count / 20
     ];
     return $params;
   }

   public function view(){
     
    if(empty($this->request['get']['id'])){
        echo '指定のパラメーターが不正です。このページを表示できません。';
        exit;
    }

    $Matter_list = $this->Matter_list->findById($this->request['get']['id']);
    $params = [
        'Matter_list' => $Matter_list 
    ];
    return $params;
   }

  //  依頼者応募切り替え
   public function view2(){
     
    if(empty($this->request['get']['id'])){
        echo '指定のパラメーターが不正です。このページを表示できません。';
        exit;
    }
    $id=[];
    $id = $_SESSION['id'] ; 
    $Matter_list = $this->Matter_list->findAll2($id);
    $params = [
        'Matter_list' => $Matter_list 
    ];
    return $params;
   }

     //  調理者応募切り替え
     public function view3(){
     
      if(empty($_SESSION['id'])){
          echo '指定のパラメーターが不正です。このページを表示できません。';
          exit;
      }
      $id=[];
      $id = $_SESSION['id'] ; 
      $Matter_list = $this->Matter_list->findAll3($id);
      $params = [
          'Matter_list' => $Matter_list 
      ];
      return $params;
     }

     public function c_user(){
     
      if(empty($_SESSION['id'])){
          echo '指定のパラメーターが不正です。このページを表示できません。';
          exit;
      }
      $id=[];
      $id = $_SESSION['id'] ; 
      $Matter_list = $this->Matter_list->c_All($id);
      $params = [
          'Matter_list' => $Matter_list 
      ];
      return $params;
     }

   public function r_view(){
     
    if(empty($this->request['get']['id'])){
        echo '指定のパラメーターが不正です。このページを表示できません。';
        exit;
    }

    $Matter_list = $this->Matter_list->findById2($this->request['get']['id']);
    $params = [
        'Matter_list' => $Matter_list 
    ];
    return $params;
   }

   public function mypage() {
    $this->request['matter_id'] = $_SESSION['id'] ; 
    if(empty($this->request['matter_id'])){
      echo '指定のパラメーターが不正です。このページを表示できません。';
      exit;
    }

    $Mypage = $this->Mypage->findAll($this->request['matter_id']);
    $params = [
        'Mypage' => $Mypage 
    ];
    return $params;
  }
  public function mypage2() {
    $this->request['matter_id'] = $_SESSION['id'] ; 
    if(empty($this->request['matter_id'])){
      echo '指定のパラメーターが不正です。このページを表示できません。';
      exit;
    }

    $Mypage2 = $this->Mypage->findAll2($this->request['matter_id']);
    $params2 = [
        'Mypage2' => $Mypage2
    ];
    return $params2;
  }

  public function mypage3() {
    $this->request['matter_id'] = $_SESSION['id'] ; 
    if(empty($this->request['matter_id'])){
      echo '指定のパラメーターが不正です。このページを表示できません。';
      exit;
    }

    $Mypage3 = $this->Mypage->findAll3($this->request['matter_id']);
    $params3 = [
        'Mypage3' => $Mypage3
    ];
    return $params3;
  }
  public function mypage4() {
    $this->request['matter_id'] = $_SESSION['id'] ; 
    if(empty($this->request['matter_id'])){
      echo '指定のパラメーターが不正です。このページを表示できません。';
      exit;
    }

    $Mypage4 = $this->Mypage->findAll4($this->request['matter_id']);
    $params4 = [
        'Mypage4' => $Mypage4
    ];
    return $params4;
  }

  public function view_delete(){
    if(empty($this->request['get']['id'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
    }
    $delete = $this->Delete->finddl($this->request['get']['id']);
    $params_delete =[
        'delete' => $delete
    ];
    return $params_delete;
  }

  public function view_de(){
    if(empty($this->request['get']['id'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
    }
    $delete = $this->Delete->findd($this->request['get']['id']);
    $params_delete =[
        'delete' => $delete
    ];
    return $params_delete;
  }

  public function view_de2(){
    if(empty($this->request['get']['id'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
    }
    $delete = $this->Delete->findd2($this->request['get']['id']);
    $params_delete =[
        'delete' => $delete
    ];
    return $params_delete;
  }

  public function c_m_delt(){
    if(empty($this->request['get']['id'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
    }
    $delete = $this->Delete->contactDelete($this->request['get']['id']);
    $delete2 = $this->Delete->contactDelete2($_SESSION["matter_id"]);


    $params_delete =[
        'delete' => $delete , 'delete2' => $delete2
    ];
    return $params_delete;
  }

  public function r_m_delt(){
    if(empty($this->request['get']['id'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
    }
    $delete = $this->Delete->contactDelete3($this->request['get']['id']);


    $params_delete =[
        'delete' => $delete
    ];
    return $params_delete;
  }
  public function coment_delt(){
    if(empty($this->request['get']['id'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
    }
    $delete = $this->Delete->comentDelete($this->request['get']['id']);


    $params_delete =[
        'delete' => $delete
    ];
    return $params_delete;
  }

  public function edit_update(){

    $update = $this->Update->editUpdate();
  }
  public function c_edit_update(){

    $update = $this->Update->contactUpdate($this->request['post']['name'], $this->request['post']['furigana'], $this->request['post']['y_o_experience'], $this->request['post']['possible_date'], $this->request['post']['cooking'], $this->request['post']['hourly_wage'], $this->request['post']['area'], $this->request['post']['mail'], $this->request['post']['self_pr'],$this->request['post']['id']);
    
  }

  public function c_edit_update2(){

    $update = $this->Update->contactUpdate2($this->request['post']['name'], $this->request['post']['furigana'],$this->request['post']['tell'], $this->request['post']['mail'], $this->request['post']['cook_area'], $this->request['post']['what_time'], $this->request['post']['time'], $this->request['post']['remarks'],$this->request['post']['id']);
    
  }


  public function login_view() {
    $login=$this->Login->login();
    }

  public function login_view2() {
    $login=$this->Login->login2();
    }
  public function login_21() {
    $login=$this->Login->login21();
    $login=$this->Login->login211();
    }
   public function r_login_re() {
    $login=$this->Login->r_login_re1();
    $login=$this->Login->r_login_re2();
    }

  public function c_login_rest() {
    $login=$this->Login->c_login_reset($this->request['post']['email'],$this->request['post']['password']);
    }

  public function r_login_rest() {
    $login=$this->Login->r_login_reset($this->request['post']['email'],$this->request['post']['password']);
    }

    public function new_login() {

      $login=$this->Login->c_new_login2($this->request['post']['email']);
      }
      public function c_login_re() {
        $login=$this->Login->c_login_re();
        }
      public function r_login_change() {
        
        $login=$this->Login->r_login_change($this->request['post']['password1'],$this->request['post']['email']);
       }

    public function c_login_change() {

      $login=$this->Login->c_login_change($this->request['post']['password1'],$this->request['post']['email']);
      }

    public function new_login1() {

      $login=$this->Login->c_new_login($this->request['post']['name'],$this->request['post']['email'],$this->request['post']['password']);
       }

      public function new_login2() {
        $login=$this->Login->r_new_login($this->request['post']['name'],$this->request['post']['email'],$this->request['post']['password']);
        }

    public function new_login3() {
      $login=$this->Login->r_new_login2($this->request['post']['email']);
       }

        

    public function complete() {
      $this->request['matter_id'] = $_SESSION['id'] ; 
      // $this->request['post']['name'] = htmlspecialchars($this->request['post']['name'], ENT_QUOTES, "UTF-8");
      // $this->request['post']['kana'] = htmlspecialchars($this->request['post']['kana'], ENT_QUOTES, "UTF-8");
      // $this->request['post']['tel'] = htmlspecialchars($this->request['post']['tel'], ENT_QUOTES, "UTF-8");
      // $this->request['post']['email'] = htmlspecialchars($this->request['post']['email'], ENT_QUOTES, "UTF-8");
      // $this->request['post']['body'] = htmlspecialchars($this->request['post']['body'], ENT_QUOTES, "UTF-8");
      
      $this->Insert->Create($this->request['matter_id'],$this->request['post']['name'], $this->request['post']['furigana'], $this->request['post']['y_o_experience'], $this->request['post']['possible_date'], $this->request['post']['cooking'], $this->request['post']['hourly_wage'], $this->request['post']['area'], $this->request['post']['email'], $this->request['post']['body']);

      $_SESSION['id'] = $this->request['matter_id']; 
    }

    public function complete2() {
      $this->request['matter_id'] = $_SESSION['matter_id'] ; 
      $this->request['requester_id'] =$_SESSION['id'];

      // $this->request['post']['name'] = htmlspecialchars($this->request['post']['name'], ENT_QUOTES, "UTF-8");
      // $this->request['post']['kana'] = htmlspecialchars($this->request['post']['kana'], ENT_QUOTES, "UTF-8");
      // $this->request['post']['tel'] = htmlspecialchars($this->request['post']['tel'], ENT_QUOTES, "UTF-8");
      // $this->request['post']['email'] = htmlspecialchars($this->request['post']['email'], ENT_QUOTES, "UTF-8");
      // $this->request['post']['body'] = htmlspecialchars($this->request['post']['body'], ENT_QUOTES, "UTF-8");
      
      $this->Insert->Create2($this->request['matter_id'],$this->request['requester_id'],$this->request['post']['name'], $this->request['post']['furigana'], $this->request['post']['tell'], $this->request['post']['mail'], $this->request['post']['cook_area'], $this->request['post']['what_time'], $this->request['post']['time'], $this->request['post']['remarks']);


      $_SESSION['id'] = $this->request['requester_id'] ;
    }

    public function c_coment() {
      $this->request['c_id'] = $_SESSION['id'] ; 
      $this->request['name'] = $_SESSION['name'] ; 
      $Insert=$this->Insert->c_coment($this->request['post']['id'],$this->request['c_id'],$this->request['name'],);
      }

      public function c_comentAll() {
        $page = 0;

        $Matter_list = $this->Matter_list->comentAll($page);
        $Matter_list_count = $this->Matter_list->c_countAll();

        $params = [
          'Matter_list' => $Matter_list,'pages' => $Matter_list_count / 20
      ];
      return $params ;
      }
      public function C_r_All() {
        $id = $_SESSION['id'];
        $Matter_list = $this->Matter_list->c_r_All($id);

      return $Matter_list;
        }
        public function c_mail() {
          $id = $_SESSION['matter_id'];
          $Matter_list = $this->Matter_list->c_mail($id);
  
        return $Matter_list;
          }
  
    




}

?>