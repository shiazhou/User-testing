<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <title>用户登录 - 虚拟游戏交易平台</title>
  <style>
    /* 通用样式 */
    *{margin:0;padding:0;box-sizing:border-box;font-family:Arial,sans-serif;}
    body{background:#f5f5f5;display:flex;flex-direction:column;min-height:100vh;}
    .content{flex:1;display:flex;flex-direction:column;align-items:center;padding:20px;}
    
    /* 页面标题 */
    .page-title {
      font-size: 24px;
      font-weight: bold;
      color: #333;
      margin: 40px 0 30px;
      text-align: center;
    }
    
    /* 登录表单 */
    .login-form {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
      padding: 30px 20px;
      width: 100%;
      max-width: 400px;
    }
    
    .form-group {
      margin-bottom: 20px;
    }
    
    .form-label {
      display: block;
      font-size: 14px;
      color: #666;
      margin-bottom: 8px;
    }
    
    .form-input {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 14px;
      transition: border-color 0.3s;
      outline: none;
    }
    
    .form-input:focus {
      border-color: #007bff;
    }
    
    .form-options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      font-size: 13px;
    }
    
    .remember-me {
      display: flex;
      align-items: center;
      color: #666;
    }
    
    .remember-me input {
      margin-right: 6px;
    }
    
    .forgot-password {
      color: #007bff;
      text-decoration: none;
    }
    
    .login-btn {
      width: 100%;
      padding: 12px;
      background: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    
    .login-btn:hover {
      background: #0056b3;
    }
    
    /* 其他登录方式 */
    .other-login {
      margin-top: 25px;
      text-align: center;
    }
    
    .other-login-title {
      font-size: 13px;
      color: #999;
      margin-bottom: 15px;
      position: relative;
    }
    
    .other-login-title::before,
    .other-login-title::after {
      content: '';
      position: absolute;
      top: 50%;
      width: 35%;
      height: 1px;
      background: #eee;
    }
    
    .other-login-title::before {
      left: 0;
    }
    
    .other-login-title::after {
      right: 0;
    }
    
    .social-login {
      display: flex;
      justify-content: center;
      gap: 30px;
    }
    
    .social-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: #f5f5f5;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      cursor: pointer;
      transition: transform 0.2s;
    }
    
    .social-icon:active {
      transform: scale(0.9);
    }
    
    /* 注册提示 */
    .register-tip {
      margin-top: 20px;
      text-align: center;
      font-size: 14px;
      color: #666;
    }
    
    .register-link {
      color: #007bff;
      text-decoration: none;
      font-weight: bold;
    }
    
    /* 错误提示 */
    .error-message {
      background: #fee;
      color: #ff4757;
      padding: 10px;
      border-radius: 4px;
      margin-bottom: 15px;
      font-size: 13px;
      border: 1px solid #fcc;
    }
  </style>
</head>
<body>
  <div class="content">
    <h1 class="page-title">虚拟游戏交易平台</h1>
    
    <form class="login-form" action="login.php" method="post">
      <!-- 错误提示区域 -->
      <?php if (isset($_GET['error'])): ?>
        <div class="error-message">
          <?php 
            $error = $_GET['error'];
            switch ($error) {
              case 'empty':
                echo '请填写所有必填字段';
                break;
              case 'invalid':
                echo '用户名或密码错误';
                break;
              case 'captcha':
                echo '验证码错误';
                break;
              default:
                echo '登录失败，请重试';
            }
          ?>
        </div>
      <?php endif; ?>
      
      <div class="form-group">
        <label class="form-label">用户名</label>
        <input type="text" class="form-input" name="username" placeholder="请输入用户名" required>
      </div>
      
      <div class="form-group">
        <label class="form-label">密码</label>
        <input type="password" class="form-input" name="password" placeholder="请输入密码" required>
      </div>
      
      <div class="form-group">
        <label class="form-label">验证码</label>
        <div style="display: flex; gap: 10px; align-items: center;">
          <input type="text" class="form-input" name="captcha" placeholder="请输入验证码" style="flex: 1;">
          <img src="#" alt="验证码" style="height: 40px; border-radius: 4px; cursor: pointer;">
        </div>
      </div>
      
      <div class="form-options">
        <label class="remember-me">
          <input type="checkbox" name="remember"> 记住我
        </label>
        <a href="#" class="forgot-password">忘记密码？</a>
      </div>
      
      <button type="submit" class="login-btn">登录</button>
      
      <div class="other-login">
        <div class="other-login-title">其他登录方式</div>
        <div class="social-login">
          <div class="social-icon">QQ</div>
          <div class="social-icon">VX</div>
          <div class="social-icon">WB</div>
        </div>
      </div>
    </form>
    
    <div class="register-tip">
      还没有账号？<a href="注册页.php" class="register-link">立即注册</a>
    </div>
  </div>
</body>
</html>