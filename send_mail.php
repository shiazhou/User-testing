<?php
session_start();
require 'email.php'; // 引入你的邮件发送逻辑

// 确保用户已通过自动验证
if (empty($_SESSION['verified'])) {
    die("验证未通过，请先进行安全验证。");
}

// 获取用户邮箱
$email = $_POST['email'] ?? '';
if (empty($email)) die("邮箱不能为空。");

// 生成随机验证码
$code = rand(100000, 999999);
$_SESSION['email_code'] = $code;

// 邮件内容
$content = "<h2>您的注册验证码是：</h2><p style='font-size:20px; color:blue;'>$code</p><p>5分钟内有效。</p>";

// 调用 Cola 邮件 API
$sendResult = sendMail($email, '用户注册验证码', $content);

// 返回结果
if ($sendResult === true) {
    echo "验证码已发送到邮箱，请查收！";
} else {
    echo "发送失败：" . $sendResult;
}
?>