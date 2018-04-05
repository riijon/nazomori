<?php
/**
 * Created by PhpStorm.
 * User: RikuTakenaka
 * Date: 2018/03/08
 * Time: 0:28
 */

mb_language("ja");
mb_internal_encoding("UTF-8");
header('Content-Type: text/html; charset=UTF-8');
// 変数とタイムゾーンを初期化
$header = null;
$clean = array();
date_default_timezone_set('Asia/Tokyo');
$message = '';

// ヘッダー情報を設定
$header = "MIME-Version: 1.0\n";
$header .= "From: nazomori project <info@nazomori.com>\n";
$header .= "Reply-To: nazomori project <info@nazomori.com>\n";

// サニタイズ
if( !empty($_POST) ) {
    foreach( $_POST as $key => $value ) {
        $clean[$key] = htmlspecialchars( $value, ENT_QUOTES);
    }
}

//var_dump($clean);
//exit;

$message = "種類：" . $clean["type"] . "\n名前：" . $clean["name"] . "\n組織：" . $clean["organization"] . "\nE-mail：" . $clean["email"] . "\nTel：" . $clean["tel"] . "\n自由記入欄：" . $clean["content"];

$subject = "謎杜サイトで" . $clean["type"] . "のお問い合わせです。";

if (!mb_send_mail("info@nazomori.com", $subject, $message, $header)) {
    echo <<<EOM
<script type="text/javascript" charset="UTF-8">
  alert( "正しくメールが送信されませんでした。大変お手数ですが、もう一度ご記入ください。" );
  window.location.href = 'http://nazomori.com/';
</script>
EOM;
    exit();
} else {
//    echo "success send mail!";
    echo <<<EOM
<script type="text/javascript" charset="UTF-8">
  alert( "お問い合わせいただきありがとうございます！数日以内に返信いたします。" );
  window.location.href = 'http://nazomori.com/';
</script>
EOM;
    exit();
}