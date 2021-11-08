
<?php
session_start();
require_once(ROOT_PATH.'Controllers/PlayerController.php');
$player = new PlayerController();
$b=$player->view3();  



// if(!isset($_SESSION['role'])){
//   header('Location:/contacts/index.php');
//   }
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
  <div class='top'>
    <div class='top_list'>
      <div>
      <a href="matter_list.php">案件一覧</a>
      </div>
      <div>
      <a href="request.php">リクエスト</a>
      </div>
      <div>
      <a href="mypage.php">マイページ</a>
      </div>
      <div>
      <a href="index.php">ログアウト</a>
      </div>
    </div>
  </div>

    <?php if (isset($_SESSION["d"])): ?>
   <div class='pop'>
      <p>案件を削除しました</p> 
      <p>また案件投稿お待ちしております</p>
   </div>
   <?PHP  $_SESSION["d"] = NULL;  ?>
    <?php endif; ?>

    <?php if (isset($b["Matter_list"][0]["matter_id"])): ?>
    <div class='oubo'>
     <p>現在案件投稿済みです</p>
     <p>応募をお待ちください</p>
    </div>
    <?php endif; ?>
  <div class="formarea">

  <?php if (!isset($b["Matter_list"][0]["matter_id"])): ?>
    <div class="form">
     <div class="form-title">
        <p class="form-title-text">案件投稿</p>
      </div>
      <div class="form-box">
        <div class="form-text">
            <p class="deco">下記の項目をご記入の上送信ボタンを押してください</p>
            <div class="deco2">
              <span>*</span>は必須項目となります。
            </div>
          
          <form method="post" id="form" action="insert.php">
           

            <p class="fieldtitle">名前<span>*</span></p>
            <input type="text" name="name" id="name" class="textfield" placeholder="山田太郎"><br/>

            <p class="fieldtitle">フリガナ<span>*</span></p>
            <input type="text" name="furigana" id="kana" class="textfield" placeholder="ヤマダタロウ"><br/>

            <p class="fieldtitle">料理経験年数<span>*</span></p>
            <input type="number" id="y_o_experience" name="y_o_experience" min="0" class="textfield" placeholder="5年"><br/>
            <p class="fieldtitle">出張可能日<span>*</span></p>
            <input type="date" name="possible_date" id="date" class="textfield" ><br/>

            <p class="fieldtitle">得意な料理ジャンル<span>*</span></p>
            <input type="text" name="cooking" id="cooking" class="textfield" ><br/>  

            <p class="fieldtitle">1時間料金<span>*</span></p>     
            <select name="hourly_wage" id="hourly_wage">
              <option value="1500円">1500円</option>
              <option value="2000円">2000円</option>
              <option value="2500円">2500円</option>
              <option value="3000円">3000円</option>
              <option value="3500円">3500円</option>
              <option value="4000円">4000円</option>
              <option value="4500円">4500円</option>
              <option value="5000円">5000円</option>
            </select>     

            <p class="fieldtitle">出張可能地域<span>*</span></p>
            <input type="text" name="area" id="area" class="textfield" placeholder="都内全域"><br/>  
            
            <p class="fieldtitle">メールアドレス<span>*</span></p>
            <input type="text" name="email" id="email" class="textfield" placeholder="test@test.co.jp"><br/>

            <p class="deco_inquiry">自己PR<span>*</span></p>
            <textarea name="body" id="body" class="textareafield" placeholder="例）買い物含めて2時間あれば1週間分の料理(作り置きも合わせて)作る事ができます。材料費は別途5000円かかります。"></textarea><br/>
            <input type="submit" class="sendbtn" value="送　信">
          </form>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
  <script>

    var name_alert = "氏名は必須入力です。２０字以内でご入力ください。";
    var kana_alert = "フリガナは必須入力です。２０字以内でご入力ください。";
    var y_o_experience_alert = "料理経験年数は必須入力です。";
    var date_alert ="出張可能日は必須入力です。";
    var cooking_alert = "得意な料理のジャンルは必須入力です。";
    var hourly_wage_alert = "一時間料金は必須入力です。";
    var area_alert = "出張可能地域は必須入力です。";
    var mail_alert = "メールアドレスは正しくご入力ください。。";
    var body_alert ="自己PRは必須入力です。";

    $('#form').submit(function(){

        if($('#name').val() == "" || $('#name').val().length > 20){
            alert(name_alert);
            return false;
        }else if($('#kana').val() == "" || $('#kana').val().length > 20){
            alert(kana_alert);
            return false;
        }else if($('#y_o_experience').val() == "" ){
            alert(y_o_experience_alert);
            return false; 
        }else if($('#date').val() == "" ){
            alert(date_alert);
            return false;       
        }else if($('#cooking').val() == "" ){
            alert(cooking_alert);
            return false;   
        }else if($('#hourly_wage').val() == "" ){
            alert(hourly_wage_alert);
            return false;   
          }else if($('#area').val() == "" ){
            alert(area_alert);
            return false;   
          }else if($('#email').val() == "" || !$('#email').val().match(/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/)){
            alert(mail_alert);
            return false;
          }else if($('#body').val() == ""){
              alert(body_alert);
              return false;
          }else{
              $('#form').submit();
          }
     })
    </script>
  
</body>
</html>