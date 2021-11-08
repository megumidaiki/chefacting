<?php
session_start();
$_SESSION['z']=1;

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>シェフ代行サービス</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  </head>
  <body>
    <div class="formarea">
      <div class="form">
        <div class="form-title">
            <p class="form-title-text">パスワード再発行ログイン</p>
          </div>
          <div class="form-box">
            <div class="form-text">
              <p class="deco">パスワードを再発行したいメールアドレスを入力してください</p>
              <div class="deco2">
              </div>
           <form action='r_pass_reset_con.php' method='post' class='pass_rest' id='form'>
              <?php if (isset($_SESSION["m"])): ?>
                  <div class='pop'>
                  <p>このメールアドレスは</p>
                  <p>登録されていません</p> 
              </div>
              <?PHP  $_SESSION["m"] = NULL;  ?>
                <?php endif; ?>
              <p class='pass_rest'>メールアドレス</p>
              <input type="email" name="email" id="email" placeholder="xxx@xxx.xxx">
              <p class='pass_rest'><input type="submit" value="再発行"></p>
              <input type="button" class="returnbtn" onclick="history.back()" value="戻　る">
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>


<script>

var mail_alert= "メールアドレスは必須入力です。または正しく入力ください。";


$('#form').submit(function(){

    if($('#email').val() == "" || !$('#email').val().match(/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/)){
        alert(mail_alert);
        return false;
      }else{
          $('#form').submit();
      }
 })
</script>
</html>