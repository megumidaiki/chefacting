<?php

session_start();
require_once(ROOT_PATH.'Controllers/PlayerController.php');
// var_dump($_GET["id"]);
$player = new PlayerController();
$params = $player->r_view();

// var_dump($params);
// echo $params["Matter_list"]["name"];
?>

<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/base.css">

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
          
          <form method="post" id="form" action="r_edit_con.php">

          <input type="hidden" name="id" value="<?=$params["Matter_list"]["id"] ?>">
            <p class="fieldtitle">名前<span>*</span></p>
            <input type="text" name="name" id="name" class="textfield" placeholder="山田太郎" value="<?=$params["Matter_list"]["name"] ?>"><br/>

            <p class="fieldtitle">フリガナ<span>*</span></p>
            <input type="text" name="furigana" id="kana" class="textfield" placeholder="ヤマダタロウ" value="<?=$params["Matter_list"]["furigana"] ?>"><br/>

            <p class="fieldtitle">電話番号<span>*</span></p>
            <input type="text"  name="tell"  class="textfield" placeholder="000-0000-0000" value="<?=$params["Matter_list"]["tell"] ?>"><br/>

            <p class="fieldtitle">メールアドレス<span>*</span></p>
            <input type="text" name="mail" id="mail" class="textfield" placeholder="test@test.co.jp" value="<?=$params["Matter_list"]["mail"] ?>"><br/>

            <p class="fieldtitle">調理してもらいたい住所<span>*</span></p>
            <input type="text" name="cook_area" id="cook_area" class="textfield" value="<?=$params["Matter_list"]["cook_area"] ?>"><br/>

            <p class="fieldtitle">開始時刻<span>*</span></p>
            <input type="time" name="what_time" id="what_time" class="textfield" value="<?=$params["Matter_list"]["what_time"] ?>"><br/>  

            <p class="fieldtitle">何時間か<span>*</span></p>     
            <select name="time" >
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
            <textarea name="remarks" id="remarks" class="textareafield"><?=$params["Matter_list"]["remarks"] ?></textarea><br/>
            <input type="submit" class="sendbtn" value="応　募">
            <input type="button" class="returnbtn" onclick="history.back()" value="戻　る">
          </form>
        </div>
      </div>
    </div>
  </div>
    
</body>
</html>