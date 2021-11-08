<?php
session_start();
require_once(ROOT_PATH.'Controllers/PlayerController.php');
$player = new PlayerController();
$params = $player->c_user();  
$param = $player->c_comentAll();  
$name=$_SESSION['name'];

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>シェフ代行sa-bisu 
  </title>
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
<div class="recest">
  <p>リクエストを投稿してください</p> 

  <input type="text" id="main" />
  <button id="send">送信</button></p>
    
  <?php foreach ($param["Matter_list"] as $rec) : ?>
    <div>
      <div><?= htmlspecialchars($rec["name"]) ?></div>
      <div><?= htmlspecialchars($rec["title"]) ?></div>
      <div class="time"><?= htmlspecialchars($rec["created_ad"]) ?></div>
    </div>
  <?php endforeach; ?>
  <div id="return" ></div>
</div>
  <script src="./main.js"></script>

  <script src="./main.js"></script>
  <div class="paging">
    <?php
        for ($i=0;$i<=$param['pages'];$i++) {
            if(isset($_GET['pages']) && $_GET['pages'] == $i){
                echo $i+1;
            }else {
                echo "<a href='?page=".$i."'>".($i+1)."</a>";
            }
        }
    ?>
</div>

</body>
</html>
<script>

var name_alert = "コメントは必須入力です。３０字以内でご入力ください。";


$(function(){
    $("#send").on("click", function(event){

      if($('#main').val() == "" || $('#main').val().length > 30){
            alert(name_alert);
            return false;
          }else{
              $('#send').submit();
          }

      let id = $("#main").val();
      $.ajax({
        type: "POST",
        url: "comment_send.php",
        data: { "id" : id },
        dataType : "json"
      }).done(function(data){

        var now = new Date();
        var year = now.getFullYear();
        var mon = now.getMonth()+1; //１を足すこと
        var day = now.getDate();
        var hour = now.getHours();
        var min = now.getMinutes();
        var sec = now.getSeconds();
         console.log(data);
        $("#return").append('<div><?=$name?></div><div>'+data.id+'</div><div class="time">'+year + "-" + mon + "-" + day + "   " + hour + ":" + min + ":" + sec + "</div>");
    
      }).fail(function(XMLHttpRequest, status, e){
        console.log(XMLHttpRequest);
        alert(e);
      });
    });
  });
</script>

