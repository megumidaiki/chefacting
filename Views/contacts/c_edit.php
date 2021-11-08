<?php

session_start();
require_once(ROOT_PATH.'Controllers/PlayerController.php');
$player = new PlayerController();
$params = $player->view();
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
      <div>
      <a href="mypage.php">マイページ</a>
      </div>
      <div>
      <a href="index.php">ログアウト</a>
      </div>
    </div>
  </div>



<div class="formarea">
    <div class="form">
     <div class="form-title">
        <p class="form-title-text">案件編集</p>
      </div>
      <div class="form-box">
        <div class="form-text">
            <p class="deco">下記の項目をご記入の上保存ボタンを押してください</p>
            <div class="deco2">
              <span>*</span>は必須項目となります。
            </div>
          
          <form method="post" id="form" action="c_edit_con.php">


            <input type="hidden" name="id" value="<?=$params["Matter_list"]["id"] ?>">
            <p class="fieldtitle">名前<span>*</span></p>
            <input type="text" name="name" id="name" class="textfield" placeholder="山田太郎" value="<?=$params["Matter_list"]["name"] ?>"><br/>
            

            <p class="fieldtitle">フリガナ<span>*</span></p>
            <input type="text" name="furigana" id="kana" class="textfield" placeholder="ヤマダタロウ" value="<?=$params["Matter_list"]["furigana"] ?>"><br/>

            <p class="fieldtitle">料理経験年数</p>
            <input type="number"  name="y_o_experience" min="0" class="textfield" placeholder="5年" value="<?=$params["Matter_list"]["y_o_experience"] ?>"><br/>
            <p class="fieldtitle">出張可能日<span>*</span></p>
            <input type="date" name="possible_date" id="date" class="textfield" value="<?=$params["Matter_list"]["possible_date"] ?>"><br/>

            <p class="fieldtitle">得意な料理ジャンル<span>*</span></p>
            <input type="text" name="cooking" id="good_at" class="textfield" value="<?=$params["Matter_list"]["cooking"] ?>"><br/>  

            <p class="fieldtitle">1時間料金<span>*</span></p>     
            <select name="hourly_wage" value="<?=$params["Matter_list"]["hourly_wage"] ?>">
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
            <input type="text" name="area" id="area" class="textfield" placeholder="都内全域" value="<?=$params["Matter_list"]["area"] ?>"><br/>  
            
            <p class="fieldtitle">メールアドレス<span>*</span></p>
            <input type="text" name="mail" id="email" class="textfield" placeholder="test@test.co.jp" value="<?=$params["Matter_list"]["mail"] ?>"><br/>

            <p class="deco_inquiry">自己PR<span>*</span></p>
            <textarea name="self_pr" id="body" class="textareafield" placeholder="例）買い物含めて2時間あれば1週間分の料理(作り置きも合わせて)作る事ができます。材料費は別途5000円かかります。" ><?=$params["Matter_list"]["self_pr"] ?></textarea><br/>
            <input type="submit" class="sendbtn" value="保○存">
            <input type="button" class="returnbtn" onclick="history.back()" value="戻　る">
          </form>
        </div>
      </div>
    </div>
  </div>
  <div id="result"></div>