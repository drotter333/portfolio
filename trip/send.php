<?php
// 文字化け防止の設定
mb_language("Japanese");
mb_internal_encoding("UTF-8");

$company    = $_POST['company'];
$name       = $_POST['name'];
$department = $_POST['department'];
$phone      = $_POST['phone'];
$mail       = $_POST['mail'];
$message    = $_POST['message'];

$to = "drotter0921@gmail.com"; 
$subject = "HPより送信";
$body = "名前: " . $name . "\n";
$body .= "メール: " . $mail . "\n";
$body .= "内容: " . $message;
$headers = "From: " . $mail;

if (mb_send_mail($to, $subject, $body, $headers)) {
    header("Location: top.html");
    exit;
} else {
    header("Location: top.html");
    exit;
}
?>