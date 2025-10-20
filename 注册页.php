<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <title>用户注册 - 虚拟游戏交易平台</title>
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
    
    /* 注册表单 */
    .register-form {
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
    
    .form-row {
      display: flex;
      gap: 10px;
      align-items: center;
    }
    
    .form-row input:first-child {
      flex: 1;
    }
    
    .verify-btn {
      padding: 12px 15px;
      background: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 14px;
      cursor: pointer;
      white-space: nowrap;
      min-width: 110px;
    }
    
    .verify-btn:disabled {
      background: #ccc;
      cursor: not-allowed;
    }
    
    .register-btn {
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
      margin-top: 10px;
    }
    
    .register-btn:hover {
      background: #0056b3;
    }
    
    /* 协议同意 */
    .agreement {
      font-size: 12px;
      color: #999;
      text-align: center;
      margin-top: 20px;
    }
    
    .agreement a {
      color: #007bff;
      text-decoration: none;
    }
    
    /* 登录提示 */
    .login-tip {
      margin-top: 20px;
      text-align: center;
      font-size: 14px;
      color: #666;
    }
    
    .login-link {
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
    
    /* 成功提示 */
    .success-message {
      background: #efe;
      color: #28a745;
      padding: 10px;
      border-radius: 4px;
      margin-bottom: 15px;
      font-size: 13px;
      border: 1px solid #cfc;
    }
    
    /* 密码强度提示 */
    .password-strength {
      margin-top: 5px;
      font-size: 12px;
      color: #999;
    }
    
    .strength-weak { color: #ff4757; }
    .strength-medium { color: #ffc107; }
    .strength-strong { color: #28a745; }
  </style>
</head>
<body>
  <div class="content">
    <h1 class="page-title">虚拟游戏交易平台</h1>
    
    <form class="register-form" action="register.php" method="post">
      <!-- 消息提示区域 -->
      <?php if (isset($_GET['error'])): ?>
        <div class="error-message">
          <?php 
            $error = $_GET['error'];
            switch ($error) {
              case 'empty':
                echo '请填写所有必填字段';
                break;
              case 'username':
                echo '用户名已被注册';
                break;
              case 'phone':
                echo '手机号格式错误或已被使用';
                break;
              case 'captcha':
                echo '验证码错误';
                break;
              case 'password':
                echo '密码至少包含6个字符';
                break;
              case 'confirm':
                echo '两次输入的密码不一致';
                break;
              default:
                echo '注册失败，请重试';
            }
          ?>
        </div>
      <?php elseif (isset($_GET['success'])): ?>
        <div class="success-message">注册成功！请登录</div>
      <?php endif; ?>
      
      <div class="form-group">
        <label class="form-label">用户名</label>
        <input type="text" class="form-input" name="username" placeholder="请设置用户名" required>
      </div>
      
      <div class="form-group">
        <label class="form-label">手机号</label>
        <input type="tel" class="form-input" name="phone" placeholder="请输入手机号" required>
      </div>
      
      <div class="form-group">
        <label class="form-label">验证码</label>
        <div class="form-row">
          <input type="text" class="form-input" name="captcha" placeholder="请输入验证码" required>
          <button type="button" class="verify-btn" onclick="sendVerificationCode()">获取验证码</button>
        </div>
      </div>
      
      <div class="form-group">
        <label class="form-label">设置密码</label>
        <input type="password" class="form-input" name="password" placeholder="请设置6-20位密码" required oninput="checkPasswordStrength(this.value)">
        <div class="password-strength" id="passwordStrength">密码强度：未设置</div>
      </div>
      
      <div class="form-group">
        <label class="form-label">确认密码</label>
        <input type="password" class="form-input" name="confirm_password" placeholder="请再次输入密码" required>
      </div>
      
      <button type="submit" class="register-btn">注册并登录</button>
      
      <div class="agreement">
        注册即表示您同意 <a href="#">《用户协议》</a> 和 <a href="#">《隐私政策》</a>
      </div>
    </form>
    
    <div class="login-tip">
      已有账号？<a href="登录页.php" class="login-link">立即登录</a>
    </div>
  </div>
  
  <script>
    // 密码强度检查
    function checkPasswordStrength(password) {
      const strengthEl = document.getElementById('passwordStrength');
      
      if (!password) {
        strengthEl.textContent = '密码强度：未设置';
        strengthEl.className = 'password-strength';
        return;
      }
      
      if (password.length < 6) {
        strengthEl.textContent = '密码强度：弱（至少6个字符）';
        strengthEl.className = 'password-strength strength-weak';
      } else if (password.length >= 8 && /[A-Z]/.test(password) && /[0-9]/.test(password)) {
        strengthEl.textContent = '密码强度：强';
        strengthEl.className = 'password-strength strength-strong';
      } else {
        strengthEl.textContent = '密码强度：中';
        strengthEl.className = 'password-strength strength-medium';
      }
    }
    
    // 发送验证码倒计时
    function sendVerificationCode() {
      const verifyBtn = document.querySelector('.verify-btn');
      const phoneInput = document.querySelector('input[name="phone"]');
      
      // 简单验证手机号格式
      if (!/^1[3-9]\d{9}$/.test(phoneInput.value)) {
        alert('请输入正确的手机号格式');
        return;
      }
      
      // 倒计时功能
      let countdown = 60;
      verifyBtn.disabled = true;
      verifyBtn.textContent = `${countdown}秒后重发`;
      
      const timer = setInterval(() => {
        countdown--;
        verifyBtn.textContent = `${countdown}秒后重发`;
        
        if (countdown <= 0) {
          clearInterval(timer);
          verifyBtn.disabled = false;
          verifyBtn.textContent = '获取验证码';
        }
      }, 1000);
      
      // 这里可以添加AJAX请求发送验证码
      console.log('发送验证码到：', phoneInput.value);
    }
  </script>
</body>
</html>