
<?php
session_start();



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
            <p class="form-title-text">新規会員登録</p>
          </div>
          <div class="form-box">
            <div class="form-text">
              <div class="deco2">
              </div>
              <form id='form' action='c_new_login_confirm.php' method='post'>
            <p class="form-title-text">お名前</p>
            <?php if (isset($_SESSION['b'])): ?>
            <div><?php  echo  $_SESSION['b'];    ?></div>
            <?PHP  $_SESSION['b'] = NULL;  ?>
            <?php endif; ?>
            <input type="text" name="name" id="name" >
            <p class="form-title-text">メールアドレス</p>
            <?php if (isset($_SESSION['a'])): ?>
            <div><?php  echo  $_SESSION['a'];    ?></div>
            <?PHP  $_SESSION['a'] = NULL;  ?>
            <?php endif; ?>
            <?php if (isset($_SESSION['c'])): ?>
            <div><?php  echo  $_SESSION['c'];    ?></div>
            <?PHP  $_SESSION['c'] = NULL;  ?>
            <?php endif; ?>
            <input type="email" name="email" id="email" placeholder="xxx@xxx.xxx">
            <p class="form-title-text">パスワード</p>
            <?php if (isset($_SESSION['d'])): ?>
            <div><?php  echo  $_SESSION['d'];    ?></div>
            <?PHP  $_SESSION['d'] = NULL;  ?>
            <?php endif; ?>
            <input type='password' name='password' id="password">
            <p class='pass_rest'><input type="submit" value="登録"></p>
            <input type="button" class="returnbtn" onclick="history.back()" value="戻　る">
        </form>
          </div>
        </div>
      </div>
    </div>
  </body>
 


      <script>

    var name_alert = "氏名は必須入力です。２０字以内でご入力ください。";
    var kana_alert = "パスワードは必須入力です。２０字以内でご入力ください。";
    var y_o_experience_alert = "パスワードは必須入力です。";

    $('#form').submit(function(){

        if($('#name').val() == "" || $('#name').val().length > 20){
            alert(name_alert);
            return false;
        }else if($('#password').val() == "" ){
            alert(y_o_experience_alert);
          }else if($('#email').val() == "" || !$('#email').val().match(/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/)){
            alert(mail_alert);
            return false;
          }else{
              $('#form').submit();
          }
     })
    </script>



      
</body>



