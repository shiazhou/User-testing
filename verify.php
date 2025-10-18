<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>安全验证中...</title>
<style>
body {
  font-family: Arial;
  text-align: center;
  padding-top: 100px;
}
.loading {
  font-size: 18px;
  color: #555;
}
</style>
</head>
<body>
  <div class="loading">正在进行安全验证，请稍候...</div>
  <script>
    // 模拟自动验证（延迟 3 秒）
    setTimeout(() => {
      fetch('verify_check.php')
        .then(res => res.text())
        .then(text => {
          if (text === 'ok') {
            window.location.href = 'register.php';
          } else {
            document.querySelector('.loading').innerText = '验证失败，请刷新重试。';
          }
        });
    }, 3000);
  </script>
</body>
</html>