<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <title>消息中心 - 虚拟游戏交易平台</title>
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
    
    /* 页面标题 */
    .page-title {
      background: #fff;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 15px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      text-align: center;
      font-size: 18px;
      font-weight: bold;
      color: #333;
    }
    
    /* 消息类型筛选 */
    .message-tabs {
      background: #fff;
      border-radius: 8px;
      margin-bottom: 15px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      display: flex;
      overflow-x: auto;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
    
    .message-tab {
      flex: 1;
      padding: 12px 15px;
      text-align: center;
      font-size: 14px;
      color: #666;
      cursor: pointer;
      position: relative;
      min-width: 80px;
    }
    
    .message-tab.active {
      color: #007bff;
      font-weight: bold;
    }
    
    .message-tab.active::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 25%;
      width: 50%;
      height: 2px;
      background: #007bff;
    }
    
    /* 消息卡片 */
    .message-card {
      background: #fff;
      border-radius: 8px;
      margin-bottom: 15px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      padding: 15px;
      cursor: pointer;
      transition: transform 0.2s;
    }
    
    .message-card:active {
      transform: scale(0.98);
    }
    
    .message-card.unread {
      border-left: 4px solid #007bff;
    }
    
    .message-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 8px;
    }
    
    .message-title {
      font-size: 15px;
      font-weight: bold;
      color: #333;
      display: flex;
      align-items: center;
    }
    
    .message-icon {
      margin-right: 8px;
      font-size: 16px;
    }
    
    .message-time {
      font-size: 12px;
      color: #999;
    }
    
    .message-content {
      font-size: 14px;
      color: #666;
      line-height: 1.4;
      margin-bottom: 8px;
      display: -webkit-box;
      line-clamp: 2;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    
    .message-footer {
      font-size: 12px;
      color: #999;
    }
    
    /* 标签样式 */
    .message-tag {
      display: inline-block;
      padding: 2px 6px;
      border-radius: 3px;
      font-size: 11px;
      margin-left: 8px;
    }
    
    .tag-system {
      background: #e8f4fd;
      color: #007bff;
    }
    
    .tag-order {
      background: #e8f5e8;
      color: #28a745;
    }
    
    .tag-trade {
      background: #f3e8ff;
      color: #6f42c1;
    }
    
    .tag-promotion {
      background: #fff3cd;
      color: #ffc107;
    }
    
    /* 未读消息指示器 */
    .unread-dot {
      display: inline-block;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #ff4757;
      margin-left: 8px;
    }
    
    /* 空消息状态 */
    .empty-message {
      text-align: center;
      padding: 40px 20px;
      color: #999;
    }
    
    .empty-message-icon {
      font-size: 48px;
      margin-bottom: 15px;
    }
    
    .empty-message-text {
      font-size: 14px;
    }
  </style>
</head>
<body>
  <!-- 页面内容 -->
  <div class="content">
    <!-- 页面标题 -->
    <div class="page-title">消息中心</div>
    
    <!-- 消息类型筛选 -->
    <div class="message-tabs">
      <div class="message-tab active">全部</div>
      <div class="message-tab">系统通知</div>
      <div class="message-tab">订单消息</div>
      <div class="message-tab">交易消息</div>
      <div class="message-tab">活动消息</div>
    </div>
    
    <!-- 消息列表 -->
    <div class="message-card unread">
      <div class="message-header">
        <div class="message-title">
          <span class="message-icon">📢</span>
          系统维护通知
          <span class="message-tag tag-system">系统</span>
          <span class="unread-dot"></span>
        </div>
        <div class="message-time">10分钟前</div>
      </div>
      <div class="message-content">
        尊敬的用户，我们将于今晚23:00-次日凌晨2:00进行系统维护升级，期间可能会影响部分服务的正常使用，请您提前做好准备。
      </div>
      <div class="message-footer">点击查看详情</div>
    </div>
    
    <div class="message-card unread">
      <div class="message-header">
        <div class="message-title">
          <span class="message-icon">📦</span>
          订单发货通知
          <span class="message-tag tag-order">订单</span>
          <span class="unread-dot"></span>
        </div>
        <div class="message-time">1小时前</div>
      </div>
      <div class="message-content">
        您购买的"英雄联盟 ez未来战士皮肤"已发货，请登录游戏查收，如有问题请及时联系客服。
      </div>
      <div class="message-footer">订单号：20230610091542</div>
    </div>
    
    <div class="message-card">
      <div class="message-header">
        <div class="message-title">
          <span class="message-icon">💰</span>
          账户资金变动通知
          <span class="message-tag tag-trade">交易</span>
        </div>
        <div class="message-time">昨天 14:30</div>
      </div>
      <div class="message-content">
        您的账户于2023-06-14 14:30:15完成了一笔支付，金额：¥199.00，当前余额：¥2580.50。
      </div>
      <div class="message-footer">交易类型：商品购买</div>
    </div>
    
    <div class="message-card">
      <div class="message-header">
        <div class="message-title">
          <span class="message-icon">🎁</span>
          新用户专享优惠
          <span class="message-tag tag-promotion">活动</span>
        </div>
        <div class="message-time">2023-06-13</div>
      </div>
      <div class="message-content">
        欢迎使用我们的平台！新用户专享100元优惠券礼包已发放至您的账户，有效期30天，请在个人中心查看。
      </div>
      <div class="message-footer">点击领取</div>
    </div>
    
    <div class="message-card">
      <div class="message-header">
        <div class="message-title">
          <span class="message-icon">🔒</span>
          账户安全提醒
          <span class="message-tag tag-system">系统</span>
        </div>
        <div class="message-time">2023-06-10</div>
      </div>
      <div class="message-content">
        您的账户已成功登录，登录时间：2023-06-10 09:00:15，登录地点：北京市。如非本人操作，请立即修改密码。
      </div>
      <div class="message-footer">查看登录记录</div>
    </div>
  </div>

  <!-- 底部导航栏 -->
  <div class="navbar">
    <div class="nav-item" onclick="location.href='index.php'">首页</div>
    <div class="nav-item" onclick="location.href='订单页.php'">订单</div>
    <div class="nav-item active" onclick="location.href='消息页.php'">信息</div>
    <div class="nav-item" onclick="location.href='主页.php'">主页</div>
  </div>
</body>
</html>