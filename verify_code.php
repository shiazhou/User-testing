<?php
session_start();
require 'db.connect.php';

$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$code = $_POST['code'] ?? '';

// 基本校验
if (empty($username) || empty($email) || empty($password) || empty($code)) {
    die("请填写所有信息。");
}

// 验证邮箱验证码
if (empty($_SESSION['email_code']) || $_SESSION['email_code'] != $code) {
    die("验证码错误或已失效。");
}

// 密码加密
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// 插入数据库
$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $hashedPassword);

if ($stmt->execute()) {
    echo "注册成功！";
    unset($_SESSION['email_code']); // 删除验证码
} else {
    echo "注册失败：" . $stmt->error;
}

$stmt->close();
$conn->close();
?>