<?PHP                 
session_start();
require_once(ROOT_PATH.'Controllers/PlayerController.php');
$mypage = new PlayerController();
$params = $mypage->mypage3(); 
$params2 = $mypage->mypage4(); 
if(!isset($_SESSION['role'])){
    header('Location:/Players/login.php');
    }

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
      <a href="index.php">ログアウト</a>
      </div>
    </div>
</div>
<div>

   <div class="formarea">
    <div class="form">
     <div class="form-title">
        <p class="form-title-text"><?= $_SESSION['name'] ?>さん案件応募内容</p>
      </div>
      <div class="form-box">
        <div class="form-text">
          <p class="deco"></p>
          <p class="title-text2">応募案件</p>

          <?php if (!isset($params["Mypage3"][0]["id"])): ?>
          <div class='oubo'>
            <p>現在応募中の</p>
            <p>案件はありません</p>
          </div>
          <input type="button" class="returnbtn" onclick="history.back()" value="戻　る">
          <?php endif; ?>

          <?php foreach ($params2['Mypage4'] as $Mypage) : ?>
            <p class="fieldtitle">名前</p>
            <div><?= htmlspecialchars($Mypage['name']) ?></div>
            <p class="fieldtitle">フリガナ</p>
            <th><?= htmlspecialchars($Mypage['furigana']) ?></th>
            <p class="fieldtitle">料理経験年数</p>
            <th><?= htmlspecialchars($Mypage['y_o_experience']) ?></th>
            <p class="fieldtitle">出張可能日<span>*</span></p>
            <th><?= htmlspecialchars($Mypage['possible_date']) ?></th>
            <p class="fieldtitle">得意な料理ジャンル<span>*</span></p>
            <th><?= htmlspecialchars($Mypage['cooking']) ?></th>
            <p class="fieldtitle">1時間料金<span>*</span></p>     
            <th><?= htmlspecialchars($Mypage['hourly_wage']) ?>時間</th>
            <p class="fieldtitle">出張可能地域<span>*</span></p>
            <th><?= htmlspecialchars($Mypage['area']) ?></th>
            <p class="fieldtitle">メールアドレス<span>*</span></p>
            <th><?= htmlspecialchars($Mypage['mail']) ?></th>
            <p class="deco_inquiry">自己PR<span>*</span></p>
            <th><?= htmlspecialchars($Mypage['self_pr']) ?></th>
            <?php endforeach; ?>
            <?php foreach ($params['Mypage3'] as $Mypage2) : ?>
          <p class="title-text2">応募中情報</p>
          <div>
          <p class="fieldtitle">名前</p>
          <div><?= htmlspecialchars($Mypage2['name']) ?></div>
          <p class="fieldtitle">フリガナ</p>
          <div><?= htmlspecialchars($Mypage2['furigana']) ?></div>
          <p class="fieldtitle">電話番号</p>
          <div><?= htmlspecialchars($Mypage2['tell']) ?></div>
          <p class="fieldtitle">メールアドレス</p>
          <div><?= htmlspecialchars($Mypage2['mail']) ?></div>
          <p class="fieldtitle">調理してもらいたい住所</p>
          <div><?= htmlspecialchars($Mypage2['cook_area']) ?></div>
          <p class="fieldtitle">開始時刻</p>
          <div><?= htmlspecialchars($Mypage2['what_time']) ?></div>
          <p class="fieldtitle">何時間か</p>
          <div><?= htmlspecialchars($Mypage2['time']) ?></div>
          <p class="fieldtitle">備考</p>
          <div><?= nl2br(htmlspecialchars($Mypage2['remarks'])) ?></div>

          <?php $_SES["matter_id"] = $Mypage2["matter_id"];?>
          </div>
        </div>
        <?php if($_SESSION['role']==1): ?>
          <div class='edit_delete'>
            <a href="r_edit.php?id=<?php echo $Mypage2["id"]?>">編集</a>
          </div>
          <div class='edit_delete'>
            <a href="r_deletedeta.php?id=<?php echo $Mypage2["requester_id"]?>" onclick="return confirm('削除しますか?')">削除</a>
          </div>

        <?php endif; ?>

        <?php endforeach; ?>
      </div>
    </div>
  </div>

 </body>
</html>

