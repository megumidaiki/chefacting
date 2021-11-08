<?PHP                 
session_start();
require_once(ROOT_PATH.'Controllers/PlayerController.php');
$player = new PlayerController();
$params = $player->view();
$param = $params['Matter_list'];


if(!isset($_SESSION['role'])){
    header('Location:/Players/login.php');
    }
     


   $_SESSION['matter_id'] = $param['matter_id'];


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
      <?php if(isset($_SESSION['role']) && $_SESSION['role']==1): ?>
      <div>   
        <a href="r_mypage.php">マイページ</a>
      </div>
      <?php endif; ?>
      <?php if(isset($_SESSION['role']) && $_SESSION['role']==0): ?>
      <div>   
        <a href="mypage.php">マイページ</a>
      </div>
      <?php endif; ?>
      <div>
      <a href="index.php">ログアウト</a>
      </div>
    </div>
</div>
  <div class="formarea">
    <div class="form">
     <div class="form-title">
        <p class="form-title-text">案件応募</p>
      </div>
      <div class="form-box">
        <div class="form-text">
            <p class="deco">下記の項目をご記入の上送信ボタンを押してください</p>
            <div class="deco2">
              <span>*</span>は必須項目となります。
            </div>
          
          <form method="post" id="form" action="insert2.php">

            <p class="fieldtitle">名前<span>*</span></p>
            <input type="text" name="name" id="name" class="textfield" placeholder="山田太郎"><br/>

            <p class="fieldtitle">フリガナ<span>*</span></p>
            <input type="text" name="furigana" id="kana" class="textfield" placeholder="ヤマダタロウ"><br/>

            <p class="fieldtitle">電話番号<span>*</span></p>
            <input type="text"  name="tell"  class="textfield" placeholder="000-0000-0000"><br/>

            <p class="fieldtitle">メールアドレス<span>*</span></p>
            <input type="text" name="mail" id="mail" class="textfield" placeholder="test@test.co.jp"><br/>

            <p class="fieldtitle">調理してもらいたい住所<span>*</span></p>
            <input type="text" name="cook_area" id="cook_area" class="textfield" ><br/>

            <p class="fieldtitle">開始時刻<span>*</span></p>
            <input type="time" name="what_time" id="what_time" class="textfield" ><br/>  

            <p class="fieldtitle">何時間か<span>*</span></p>     
            <select name="time" id="time" >
              <option value="1時間">1時間</option>
              <option value="2時間">2時間</option>
              <option value="3時間">3時間</option>
              <option value="4時間">4時間</option>
              <option value="5時間">5時間</option>
              <option value="6時間">6時間</option>
              <option value="7時間">7時間</option>
              <option value="8時間">8時間</option>
            </select>     

            <p class="fieldtitle">備考<span>*</span></p>
            <textarea name="remarks" id="remarks" class="textareafield"></textarea><br/>
            <input type="submit" class="sendbtn" value="応　募">
            <input type="button" class="returnbtn" onclick="history.back()" value="戻　る">
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>

    var name_alert = "氏名は必須入力です。２０字以内でご入力ください。";
    var kana_alert = "フリガナは必須入力です。２０字以内でご入力ください。";
    var tel_alert= "電話番号は正しくご入力ください。";
    var mail_alert = "メールアドレスは正しくご入力ください。";
    var cook_alert ="調理してもらいたい住所は必須入力です。";
    var what_time_alert = "開始時刻は必須入力です。";
    var time_alert = "何時間かは必須入力です。";
    var remaks_alert ="備考は必須入力です。";

    $('#form').submit(function(){

        if($('#name').val() == "" || $('#name').val().length > 20){
            alert(name_alert);
            return false;
        }else if($('#kana').val() == "" || $('#kana').val().length > 20){
            alert(kana_alert);
            return false;
        }else if(!$('#tel').val() == "" && !$('#tel').val().match(/^[0-9]+$/)){
            alert(tel_alert);
            return false;  
          }else if($('#email').val() == "" || !$('#email').val().match(/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/)){
            alert(mail_alert);
            return false;    
        }else if($('#cook_area').val() == "" ){
            alert(cook_alert);
            return false;   
        }else if($('#what_time').val() == "" ){
            alert(what_time_alert);
            return false;   
          }else if($('#time').val() == "" ){
            alert(time_alert);
            return false;   
          }else if($('#remarks').val() == ""){
              alert(remaks_alert);
              return false;
          }else{
              $('#form').submit();
          }
     })






    </script>
    
</body>
</html>