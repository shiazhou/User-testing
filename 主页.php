<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <title>个人中心 - 虚拟游戏交易平台</title>
  <style>
    /* 通用样式 */
    *{margin:0;padding:0;box-sizing:border-box;font-family:Arial,sans-serif;}
    body{background:#f5f5f5;display:flex;flex-direction:column;height:100vh;overflow:hidden;}
    .content{flex:1;overflow-y:auto;padding:10px;padding-bottom:50px;}
    
    /* 底部导航栏 */
    .navbar {
      display: flex;
      justify-content: space-around;
      align-items: center;
      background: #fff;
      border-top: 1px solid #ddd;
      height: 50px;
      position: fixed;
      bottom: 0;
      width: 100%; 
      box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.05);
    }

    .nav-item {
      flex: 1;
      text-align: center;
      font-size: 14px;
      color: #666;
      cursor: pointer;
      line-height: 50px;
      transition: color 0.3s;
    }

    .nav-item.active{color:#007bff;font-weight:bold;}
    
    /* 用户信息卡片 */
    .user-card {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 15px;
      color: white;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      display: flex;
      align-items: center;
    }
    
    .avatar {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.2);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      margin-right: 15px;
      border: 2px solid rgba(255, 255, 255, 0.3);
    }
    
    .user-info {
      flex: 1;
    }
    
    .user-name {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 5px;
    }
    
    .user-level {
      font-size: 12px;
      background: rgba(255, 255, 255, 0.2);
      padding: 2px 8px;
      border-radius: 12px;
      display: inline-block;
    }
    
    .user-detail {
      display: flex;
      margin-top: 10px;
    }
    
    .user-detail-item {
      margin-right: 15px;
      font-size: 12px;
      opacity: 0.9;
    }
    
    /* 数据统计卡片 */
    .stats-card {
      background: #fff;
      border-radius: 8px;
      margin-bottom: 15px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      display: flex;
      justify-content: space-around;
      padding: 15px 0;
    }
    
    .stat-item {
      text-align: center;
      flex: 1;
    }
    
    .stat-value {
      font-size: 18px;
      font-weight: bold;
      color: #333;
      margin-bottom: 5px;
    }
    
    .stat-label {
      font-size: 12px;
      color: #999;
    }
    
    /* 功能列表 */
    .feature-section {
      background: #fff;
      border-radius: 8px;
      margin-bottom: 15px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      overflow: hidden;
    }
    
    .section-title {
      padding: 12px 15px;
      font-size: 14px;
      color: #999;
      border-bottom: 1px solid #f0f0f0;
    }
    
    .feature-list {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
    }
    
    .feature-item {
      text-align: center;
      padding: 15px 0;
      border-bottom: 1px solid #f0f0f0;
      border-right: 1px solid #f0f0f0;
    }
    
    .feature-item:nth-child(4n) {
      border-right: none;
    }
    
    .feature-item:nth-last-child(-n+4) {
      border-bottom: none;
    }
    
    .feature-icon {
      font-size: 24px;
      margin-bottom: 8px;
    }
    
    .feature-name {
      font-size: 12px;
      color: #666;
    }
    
    /* 菜单列表 */
    .menu-section {
      background: #fff;
      border-radius: 8px;
      margin-bottom: 15px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      overflow: hidden;
    }
    
    .menu-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px;
      border-bottom: 1px solid #f0f0f0;
      cursor: pointer;
    }
    
    .menu-item:last-child {
      border-bottom: none;
    }
    
    .menu-left {
      display: flex;
      align-items: center;
    }
    
    .menu-icon {
      font-size: 18px;
      margin-right: 12px;
    }
    
    .menu-text {
      font-size: 14px;
      color: #333;
    }
    
    .menu-right {
      display: flex;
      align-items: center;
    }
    
    .menu-arrow {
      font-size: 12px;
      color: #ccc;
      margin-left: 8px;
    }
    
    .menu-badge {
      background: #ff4757;
      color: white;
      font-size: 10px;
      padding: 2px 6px;
      border-radius: 10px;
    }
    
    /* 设置按钮 */
    .settings-btn {
      background: #fff;
      border-radius: 8px;
      padding: 15px;
      text-align: center;
      font-size: 14px;
      color: #666;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      margin-bottom: 20px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <!-- 页面内容 -->
  <div class="content">
    <!-- 用户信息卡片 -->
    <div class="user-card">
      <div class="avatar">🎮</div>
      <div class="user-info">
        <div class="user-name">游戏爱好者_2023</div>
        <div class="user-level">VIP会员</div>
        <div class="user-detail">
          <div class="user-detail-item">积分: 1280</div>
          <div class="user-detail-item">余额: ¥2580.50</div>
          <div class="user-detail-item">优惠券: 5张</div>
        </div>
      </div>
    </div>
    
    <!-- 数据统计卡片 -->
    <div class="stats-card">
      <div class="stat-item">
        <div class="stat-value">28</div>
        <div class="stat-label">待收货</div>
      </div>
      <div class="stat-item">
        <div class="stat-value">12</div>
        <div class="stat-label">待付款</div>
      </div>
      <div class="stat-item">
        <div class="stat-value">5</div>
        <div class="stat-label">待评价</div>
      </div>
      <div class="stat-item">
        <div class="stat-value">2</div>
        <div class="stat-label">退款/售后</div>
      </div>
    </div>
    
    <!-- 功能列表 -->
    <div class="feature-section">
      <div class="section-title">我的服务</div>
      <div class="feature-list">
        <div class="feature-item">
          <div class="feature-icon">🎁</div>
          <div class="feature-name">优惠券</div>
        </div>
        <div class="feature-item">
          <div class="feature-icon">💎</div>
          <div class="feature-name">我的收藏</div>
        </div>
        <div class="feature-item">
          <div class="feature-icon">⭐</div>
          <div class="feature-name">我的评价</div>
        </div>
        <div class="feature-item">
          <div class="feature-icon">📦</div>
          <div class="feature-name">收货地址</div>
        </div>
        <div class="feature-item">
          <div class="feature-icon">💰</div>
          <div class="feature-name">账户余额</div>
        </div>
        <div class="feature-item">
          <div class="feature-icon">🎮</div>
          <div class="feature-name">游戏库</div>
        </div>
        <div class="feature-item">
          <div class="feature-icon">🎯</div>
          <div class="feature-name">积分商城</div>
        </div>
        <div class="feature-item">
          <div class="feature-icon">💼</div>
          <div class="feature-name">卖家中心</div>
        </div>
      </div>
    </div>
    
    <!-- 菜单列表 -->
    <div class="menu-section">
      <div class="menu-item">
        <div class="menu-left">
          <span class="menu-icon">🔔</span>
          <span class="menu-text">客服中心</span>
        </div>
        <div class="menu-right">
          <span class="menu-badge">2</span>
          <span class="menu-arrow">›</span>
        </div>
      </div>
      <div class="menu-item">
        <div class="menu-left">
          <span class="menu-icon">📝</span>
          <span class="menu-text">帮助与反馈</span>
        </div>
        <div class="menu-right">
          <span class="menu-arrow">›</span>
        </div>
      </div>
      <div class="menu-item">
        <div class="menu-left">
          <span class="menu-icon">⭐</span>
          <span class="menu-text">关于我们</span>
        </div>
        <div class="menu-right">
          <span class="menu-arrow">›</span>
        </div>
      </div>
    </div>
    
    <!-- 设置按钮 -->
    <div class="settings-btn">
      <span class="menu-icon">⚙️</span>
      <span>设置</span>
    </div>
  </div>

  <!-- 底部导航栏 -->
  <div class="navbar">
    <div class="nav-item" onclick="location.href='index.php'">首页</div>
    <div class="nav-item" onclick="location.href='订单页.php'">订单</div>
    <div class="nav-item" onclick="location.href='消息页.php'">信息</div>
    <div class="nav-item active" onclick="location.href='主页.php'">主页</div>
  </div>
</body>
</html>