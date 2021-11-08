<?php
session_start();
require_once(ROOT_PATH.'Controllers/PlayerController.php');

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
  
  <div class="formarea">
      <div class="form">
        <div class="form-title">
          <p class="form-title-text">確認画面</p>
        </div>
        <div class="form-box">
          <div class="form-text">
            <div class="deco2">
              下記の内容をご確認の上送信ボタンを押してください。<br/>
              内容を訂正する場合は戻るを押してください。
            </div>
          </div>
          <div class='form-text'>
          <?php
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES, "UTF-8");
            $furigana = htmlspecialchars($_POST['furigana'], ENT_QUOTES, "UTF-8");
            $y_o_experience = htmlspecialchars($_POST['y_o_experience'], ENT_QUOTES, "UTF-8");
            $possible_date = htmlspecialchars($_POST['possible_date'], ENT_QUOTES, "UTF-8");
            $cooking= htmlspecialchars($_POST['cooking'], ENT_QUOTES, "UTF-8");
            $hourly_wage = htmlspecialchars($_POST['hourly_wage'], ENT_QUOTES, "UTF-8");
            $area = htmlspecialchars($_POST['area'], ENT_QUOTES, "UTF-8");
            $email = htmlspecialchars($_POST['email'], ENT_QUOTES, "UTF-8");
            $body = htmlspecialchars($_POST['body'], ENT_QUOTES, "UTF-8");

            $name_count = mb_strlen($name);
            $furigana_count = mb_strlen($furigana);

            $vali_address = "/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/";

            $send_true = 0;

            echo '<p class="fiel">氏名</p>';
            if ($name == "") {
              echo '<p class="datafield"><span>氏名は必須入力です。</span></p>';
            } elseif (20 <= $name_count) {
              echo '<p class="datafield"><span>10文字以内でご入力ください。</span></p>';
            } else {
              echo '<p class="datafield">'.$name.'</p>';
              $send_true++;
            }
            
            echo '<p class="fiel">フリガナ</p>';
            if ($furigana == "") {
              echo '<p class="datafield"><span>フリガナは必須入力です。</span></p>';
            } elseif (20 <= $furigana_count) {
              echo '<p class="datafield"><span>10文字以内でご入力ください。</span></p>';
            } else {
              echo '<p class="datafield">'.$furigana.'</p>';
              $send_true++;
            }
            
            echo '<p class="fiel">料理経験年数</p>';
            if ($y_o_experience == "") {
              echo '<p class="datafield"><br/>料理経験年数は必須入力です。</p>';
            } else {
              echo '<p class="datafield">'.$y_o_experience.'</p>';
              $send_true++;
            }

            echo '<p class="fiel">出張可能日</p>';
            if ($possible_date == "") {
              echo '<p class="datafield"><span>出張可能日は必須入力です。</span></p>';
            } else {
              echo '<div class="datafield-textarea">'.$possible_date.'</div>';
              $send_true++;
            }       

            echo '<p class="fiel">得意な料理ジャンル</p>';
            if ($cooking == "") {
              echo '<p class="datafield"><span>得意な料理ジャンルは必須入力です。</span></p>';
            } else {
              echo '<div class="datafield-textarea">'.$cooking.'</div>';
              $send_true++;
            }       
            
            echo '<p class="fiel">一時間料金</p>';
            if ($hourly_wage == "") {
              echo '<p class="datafield"><span>一時間料金は必須入力です。</span></p>';
            } else {
              echo '<div class="datafield-textarea">'.$hourly_wage.'</div>';
              $send_true++;
            }

            echo '<p class="fiel">出張可能地域</p>';
            if ($area == "") {
              echo '<p class="datafield"><span>出張可能地域は必須入力です。</span></p>';
            } else {
              echo '<div class="datafield-textarea">'.$area.'</div>';
              $send_true++;
            }

            echo '<p class="fiel">メールアドレス</p>';
            if ($email == "") {
              echo '<p class="datafield"><span>メールアドレスは必須入力です。</span></p>';
            } elseif (preg_match($vali_address, $email) == 0) {
              echo '<p class="datafield"><span>メールアドレスは正しくご入力ください。</span></p>';
            } else {
              echo '<p class="datafield">'.$email.'</p>';
              $send_true++;
            }
            
            echo '<p class="fiel">自己PR</p>';
            if ($body == "") {
              echo '<p class="datafield"><span>自己PRは必須入力です。</span></p>';
            } else {
              echo '<div class="datafield-textarea">'.nl2br($body).'</div>';
              $send_true++;
            }

            echo '<form method="post" action="complete.php">
                  <input type="hidden" name="name" value="'.$name.'">
                  <input type="hidden" name="furigana" value="'.$furigana.'">
                  <input type="hidden" name="y_o_experience" value="'.$y_o_experience.'">
                  <input type="hidden" name="possible_date" value="'.$possible_date.'">
                  <input type="hidden" name="cooking" value="'.$cooking.'">
                  <input type="hidden" name="hourly_wage" value="'.$hourly_wage.'">
                  <input type="hidden" name="area" value="'.$area.'">
                  <input type="hidden" name="email" value="'.$email.'">
                  <input type="hidden" name="body" value="'.$body.'">
                  <div class="btnbox">';
            if ($send_true > 7) {
              echo '<input type="submit" class="sendbtn" value="送　信">';
            } else {
              echo '<div class="sendbtn"><p>送　信できません</p></div>';
            }
            echo '<input type="button" class="sendbtn" onclick="history.back()" value="戻　る">
                  </div>
                  </form>';
          ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>