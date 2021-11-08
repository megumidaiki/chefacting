<?PHP                 
session_start();
require_once(ROOT_PATH.'Controllers/PlayerController.php');
$player = new PlayerController();
$goal = new PlayerController();
$params = $player->view();
$param = $params['Matter_list'];
$_SESSION['r_id'] = $param['id'];

$a=$player->C_r_All();  

     
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
<?php if (isset($_SESSION['hourly_wage'])): ?>
   <div class='pop'>案件投稿しました</div>
   <?PHP  $_SESSION['hourly_wage'] = NULL;  ?>
<?php endif; ?>
<div class="formarea">
    <div class="form">
     <div class="form-title">
        <p class="form-title-text">案件詳細</p>
      </div>
      <div class="form-box">
        <div class="form-text">
            <p class="deco">下記の項目をご記入の上送信ボタンを押してください</p>
            <div class="deco2">
            </div>

            <p class="fieldtitle">名前</p>
            <div><?= htmlspecialchars($param['name']) ?></div>

            <p class="fieldtitle">フリガナ</p>
            <th><?= htmlspecialchars($param['furigana']) ?></th>

            <p class="fieldtitle">料理経験年数</p>
            <th><?= htmlspecialchars($param['y_o_experience']) ?></th>

            <p class="fieldtitle">出張可能日<span>*</span></p>
            <th><?= htmlspecialchars($param['possible_date']) ?></th>


            <p class="fieldtitle">得意な料理ジャンル<span>*</span></p>
            <th><?= htmlspecialchars($param['cooking']) ?></th>


            <p class="fieldtitle">1時間料金<span>*</span></p>     
            <th><?= htmlspecialchars($param['hourly_wage']) ?>時間</th>


            <p class="fieldtitle">出張可能地域<span>*</span></p>
            <th><?= htmlspecialchars($param['area']) ?></th>

            
            <p class="fieldtitle">メールアドレス<span>*</span></p>
            <th><?= htmlspecialchars($param['mail']) ?></th>


            <p class="deco_inquiry">自己PR<span>*</span></p>
            <th><?= nl2br(htmlspecialchars($param['self_pr'])) ?></th>


            <?php if ( !isset($a[0]["requester_id"]) && $_SESSION['role'] == 1): ?>
              <div class="annken">
               <a href="matter_post.php?id=<?php echo $param["id"] ?>" >案件応募</a>
              </div>
            <?php endif; ?>
            <div class="annken">
             <p onclick="history.back()">戻る</p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>


