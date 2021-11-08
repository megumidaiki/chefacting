
<?php
session_start();

// session_destroy();
// session_start();


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

  <div class='topmane'>
   <h1>シェフ代行サービス</h1>
   <h2>調理するのが得意で、食べる事の楽しさを伝えたい人は調理者の方ボタンへ</h2>
   <h2>料理を作って欲しい方、美味しいご飯を食べたい人は依頼者の方ボタンへ</h2>
  </div>
  <?php if (isset($_SESSION['na'])): ?>
   <div class='pop'>
     <p>会員登録完了しました</p>
     <?PHP  $_SESSION["na"] = NULL;  ?>
   </div>
  <?php endif; ?>

  <?php if (isset($_SESSION['a'])): ?>
   <div class='pop'>
     <p>パスワード変更完了しました</p>
   </div>
  <?php endif; ?>
  <?PHP   session_destroy(); ?>
  <?php if (isset($_SESSION["o"])): ?>
                  <div class='pop'>
                  <p>メールアドレスまたは</p>
                  <p>パスワードが違います</p>
              </div>
   <?PHP  $_SESSION["o"] = NULL;  ?>
  <?php endif; ?>  


    <div class="menubar"> 
      <div class="signin">
        <p id="signinopen" class="header-link">調理者の方</p>
      </div>
      <div class="signin2">
        <p id="signinopen" class="header-link">依頼者の方</p>
      </div>
    </div>

    <div id="overlay" class="overlay"></div>
    <div class='cook_login'>
      <h2>調理者の方ログイン</h2>
      <div class='login_post'>
        <form id='form' action='login_confirm.php' method='post'>
            <?php if (isset($Q)): ?>
              <div class='pop'>案件投稿しました</div>
              <?PHP  $Q = NULL;  ?>
            <?php endif; ?>
    
            <p>メールアドレス</p>
            <input type="email" name="email" id="email" placeholder="xxx@xxx.xxx">
            <p>パスワード</p>
            <input type='password' name='password' id="password">
            <p><input type="submit" value="ログイン"></p>
            <input type="button" class="returnbtn" onclick="history.back()" value="戻　る">
        </form>
        <a href="c_pass_reset.php">パスワード忘れた方はこちらへ</a>
        <a href="c_new_login.php">新規会員登録はこちへ</a>
      </div>
    </div>
    <div id="overlay" class="overlay"></div>
    <div class='cook_login2'>
      <h2>依頼者の方ログイン</h2>
      <div class='login_post2'>
        <form action='login_confirm2.php' method='post'>
          <p>メールアドレス</p>
          <input type="email" name="email" id="email" placeholder="xxx@xxx.xxx">
          <p>パスワード</p>
          <input type='password' name='password' id="password">
          <p><input type="submit" value="ログイン"></p>
          <input type="button" class="returnbtn" onclick="history.back()" value="戻　る">
        </form>
        <a href="r_pass_reset.php">パスワード忘れた方はこちらへ</a>
        <a href="r_new_login.php">新規会員登録はこちへ</a>
      </div>
    </div>











 <script>

    // ログイン画面のモーダルウィンドウ
      $(function () {
        $('.signin').click(function () {
          $('#overlay, .cook_login').fadeIn();
        });
        $('.overlay').click(function () {
          $('#overlay, .cook_login').fadeOut();
        });

        $('.signin2').click(function () {
          $('#overlay, .cook_login2').fadeIn();
        });
        $('.overlay').click(function () {
          $('#overlay, .cook_login2').fadeOut();
        });
      });

  // ログイン画面のバリデーション
  var mail_alert ="メールアドレスは正しくご入力ください。";
  var password_alert ="パスワードは正しくご入力ください。";

  $('#form').submit(function(){

      if($('#email').val() == "" || !$('#email').val().match(/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/)){
          alert(mail_alert);
          return false;
      }else if($('#password').val() == "" ){
          alert(password_alert);      
          return false;
      }else{
          $('#form').submit();
      }
  })

    
 </script>
</body>
</html>