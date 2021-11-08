<?PHP                 
session_start();
//見た目の担当
require_once(ROOT_PATH.'Controllers/PlayerController.php');
$player = new PlayerController();
$params=$player->index();      




?>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/base.css">

  <title>シェフ代行サービス</title>
</head>



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
<div class="a_i_n">
  <p>依頼者の方は案件の詳細ボタンを押して</p>
  <p>詳細ページから応募してください</p>
</div>
<?php if (isset($_SESSION['time'])): ?>
   <div class='pop'>案件投稿しました</div>
   
   <?PHP  $_SESSION['time'] = NULL;  ?>
<?php endif; ?>



<table>
  <?php foreach ($params['Matter_lists'] as $Matter_lists) : ?>
  <tr>

   <th>出張可能日</th>
   <th>得意な料理ジャンル</th>
   <th>一時間料金</th>
   <th>出張可能地域</th>
   <th></th>
  <tr>
   <th><?= htmlspecialchars($Matter_lists['possible_date']) ?></th>
   <th><?= htmlspecialchars($Matter_lists['cooking']) ?></th>
   <th><?= htmlspecialchars($Matter_lists['hourly_wage']) ?></th>
   <th><?= htmlspecialchars($Matter_lists['area']) ?></th>
   <th><a href="matter_list_detail.php?id=<?php echo $Matter_lists['id'] ?>">詳細</a></th>
   </tr>
   <?php endforeach; ?>

</table>

<div class="paging">
    <?php
        for ($i=0;$i<=$params['pages'];$i++) {
            if(isset($_GET['pages']) && $_GET['pages'] == $i){
                echo $i+1;
            }else {
                echo "<a href='?page=".$i."'>".($i+1)."</a>";
            }
        }
    ?>
    </div>


