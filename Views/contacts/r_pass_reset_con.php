<?php
session_start();
require_once(ROOT_PATH.'Controllers/PlayerController.php');
$Login = new PlayerController();
if(isset($_SESSION['z'])){
  $params = $Login->r_login_re();
  $_SESSION['z']=NULL;
}
if(isset($_POST['email'])){
$_SESSION['email']=$_POST['email'];
}

$_SESSION['c']=1;

?>

<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>


  <title>シェフ代行サービス</title>

</head>
<body>

</div>
      <div class='new_log'>




      </div>

      <div class="formarea">
      <div class="form">
        <div class="form-title">
            <p class="form-title-text">再発行パスワード入力画面</p>
          </div>
          <div class="form-box">
            <div class="form-text">
              <div class="deco2">
              </div>
              <form id='form' action='r_pass_reset_con2.php' method='post'>
               <?php if (isset($_SESSION["t"])): ?>
                  <div class='pop'>
                      <p>パスワードが一致しません</p>
                  </div>
                  <?PHP  $_SESSION["t"] = NULL;  ?>
              <?php endif; ?>

            <p class="form-title-text">メールに届いたパスワード入力してください</p>
            <input type='password' name='password' id="password" class='pass_rest'>


            <p><input type="submit" value="変更画面へ"></p>

            <input type="button" class='pass_rest' onclick="history.back()" value="戻　る" >
        </form>
          </div>
        </div>
      </div>
    </div>
  </body>

      
<script>
  // ログイン画面のバリデーション
  var password_alert ="パスワードは正しくご入力ください。";

  $('#form').submit(function(){

      if($('#password').val() == "" ){
          alert(password_alert);      
          return false;
      }else{
          $('#form').submit();
      }
  })

</script>

   
</body>
</html>