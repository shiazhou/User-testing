<?php 
session_start();
// 检查用户是否已通过验证
if (!isset($_SESSION['verified']) || $_SESSION['verified'] !== true) {
    header('Location: verify.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>用户注册</title>
<style>
body {
  font-family: Arial;
  text-align: center;
  padding: 50px;
}
input { margin: 5px; padding: 8px; width: 200px; }
button { padding: 8px 16px; }
</style>
</head>
<body>
<h2>用户注册</h2>
<form id="registerForm">
  <input type="text" name="username" placeholder="用户名" required><br>
  <input type="email" name="email" placeholder="邮箱" required><br>
  <input type="password" name="password" placeholder="密码" required><br>
  <button type="button" id="sendCodeBtn">发送验证码</button><br>
  <input type="text" name="code" placeholder="输入邮箱验证码"><br>
  <button type="submit">注册</button>
</form>

<p id="msg"></p>

<script>
const msg = document.getElementById('msg');

document.getElementById('sendCodeBtn').onclick = () => {
  fetch('send_mail.php', {
    method: 'POST',
    body: new FormData(document.getElementById('registerForm'))
  }).then(res => res.text()).then(t => msg.innerText = t);
};

document.getElementById('registerForm').onsubmit = e => {
  e.preventDefault();
  fetch('verify_code.php', {
    method: 'POST',
    body: new FormData(e.target)
  }).then(res => res.text()).then(t => msg.innerText = t);
};
</script>
</body>
</html>