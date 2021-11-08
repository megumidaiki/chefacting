<?php
session_start();
require_once(ROOT_PATH.'Controllers/PlayerController.php');
$Login = new PlayerController();
if(isset($_SESSION['c'])){
  $_POST['email']=$_SESSION['email'];
  $_SESSION['c']=NULL;
  $params = $Login->r_login_rest();
}


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
    </div>

    <div class="formarea">
      <div class="form">
        <div class="form-title">
            <p class="form-title-text">パスワード変更画面</p>
          </div>
          <div class="form-box">
            <div class="form-text">
              <div class="deco2">
              </div>
              <form id='form' action='r_pass_reset_comp.php' method='post'>
           <?php if (isset($_SESSION["t"])): ?>
                <div class='pop'>
                     <p>パスワードが一致しません</p>
                 </div>
                <?PHP  $_SESSION["t"] = NULL;  ?>
            <?php endif; ?>

            <p class="form-title-text">変更したいパスワード</p>
            <input type='password' name='password1' id="password1">

            <p class="form-title-text">変更したいパスワード確認</p>
            <input type='password' name='password2' id="password2">


            <p ><input type="submit" value="変更画面へ" class='pass_rest'></p>

            <input type="button"  onclick="history.back()" value="戻　る">
        </form>
          </div>
        </div>
      </div>
    </div>
  </body>

      </body>
</html>


      <script>
  // ログイン画面のバリデーション

  var password_alert ="パスワードはどちらも必須入力です。";

  $('#form').submit(function(){

if($('#password1').val() == "" ){
          alert(password_alert);      
          return false;
      }else if($('#password2').val() == "" ){
          alert(password_alert);      
          return false;
      }else{
          $('#form').submit();
      }
  })

</script>