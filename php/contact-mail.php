<?php

mb_language("ja");
mb_internal_encoding("UTF-8");

// HPMailer のクラスをグローバル名前空間（global namespace）にインポート
// スクリプトの先頭で宣言する必要があります
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// PHPMailer のソースファイルの読み込み（ファイルの位置によりパスを適宜変更）
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

try{
/*=======認証情報=======*/
$host = "smtp.gmail.com";
$smtp_user = "shimadasora1406@gmail.com";
$smtp_password = "ldjwtzhhytnoxejj";
$from_address = "shimadasora1406@gmail.com";
$from_name = "島田大空";
$url = "./home.php";

/*=======POST情報=======*/
$name = $_POST["name"];//氏名
$mail = $_POST["mail"];//メールアドレス
$title = $_POST["title"];//題名
$content = $_POST["comment"];//問い合わせ内容

/*=======問い合わせ側：メール情報=======*/
$customer_to = $mail;//送信先メール
$customer_title = "お問い合わせいただき誠にありがとうございます。";//件名
$customer_content = "";//本文
$customer_content .= $name . "様\r\n";
$customer_content .= "\r\n";
$customer_content .= "この度は、お問い合わせいただき誠にありがとうございます。\r\n";
$customer_content .= "\r\n";
$customer_content .= "２日以内にご連絡致しますので今しばらくお待ちくださいませ。\r\n";

$customer_content .= "以下の内容が送信されました。\r\n";
$customer_content .= "-------------------------------------------------------------------------------------------------------- \r\n";
$customer_content .= "お名前 : " . $name . " \r\n";
$customer_content .= "メールアドレス : " . $mail . " \r\n";
$customer_content .= "題名 : " . $title . " \r\n";
$customer_content .= "お問い合わせ内容 : \r\n";
$customer_content .= $content . " \r\n";
$customer_content .= "-------------------------------------------------------------------------------------------------------- \r\n";
$customer_content .= "\r\n";

/*=======問い合わせ側：メール送信準備=======*/
$customer_mail = new PHPMailer();
$customer_mail->Debugoutput = function($str, $level) { syslog(LOG_ERR, "PHP Mailer:" . $str); };
$customer_mail->IsSMTP();
$customer_mail->SMTPAuth = true;
$customer_mail->SMTPDebug = 2;
$customer_mail->CharSet = "utf-8";
$customer_mail->SMTPSecure = "tls";
$customer_mail->Host = $host;
$customer_mail->Port = 587;
$customer_mail->IsHTML(false);
$customer_mail->Username = $smtp_user;
$customer_mail->Password = $smtp_password;
$customer_mail->SetFrom($smtp_user);
$customer_mail->From = $from_address;
$customer_mail->FromName = $from_name;
$customer_mail->Subject = $customer_title;
$customer_mail->Body = $customer_content;
$customer_mail->AddAddress($customer_to);

/*=======管理者側：メール情報=======*/
$admin_to = "shimadasora1406@gmail.com";//送信先メール
$admin_title = "【要確認】お問い合わせがありました";//件名
$admin_content = "";//本文
$admin_content .= "問い合わせがありました。 \r\n";
$admin_content .= " \r\n";
$admin_content .= "以下の内容が送信されました。 \r\n";
$admin_content .= "-------------------------------------------------------------------------------------------------------- \r\n";
$admin_content .= "お名前 : " . $name . " \r\n";
$admin_content .= "題名 : " . $title . " \r\n";
$admin_content .= "メールアドレス : " . $mail . " \r\n";
$admin_content .= "お問い合わせ内容 : \r\n";
$admin_content .= $content . " \r\n";
$admin_content .= "-------------------------------------------------------------------------------------------------------- \r\n";
$admin_content .= " \r\n";
$admin_content .= "ご確認の程、宜しくお願いいたします。 \r\n";

/*=======管理者側：メール送信準備=======*/
$admin_mail = new PHPMailer();
$admin_mail->Debugoutput = function($str, $level) { syslog(LOG_ERR, "PHP Mailer:" . $str); };
$admin_mail->IsSMTP();
$admin_mail->SMTPAuth = true;
$admin_mail->SMTPDebug = 2;
$admin_mail->CharSet = "utf-8";
$admin_mail->SMTPSecure = "tls";
$admin_mail->Host = $host;
$admin_mail->Port = 587;
$admin_mail->IsHTML(false);
$admin_mail->Username = $smtp_user;
$admin_mail->Password = $smtp_password;
$admin_mail->SetFrom($smtp_user);
$admin_mail->From = $from_address;
$admin_mail->FromName = $from_name;
$admin_mail->Subject = $admin_title;
$admin_mail->Body = $admin_content;
$admin_mail->AddAddress($admin_to);
/*=======メール送信実行=======*/
if($admin_mail->Send() && $customer_mail->Send()){
    header('Location:' . $url);
    exit;
}
}catch (Exception $e){
    echo "customer Error : " . $customer_mail->ErrorInfo . "\r\nadmin Error : " . $admin_mail->ErrorInfo;
}
?>