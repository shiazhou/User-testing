<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <title>订单管理 - 虚拟游戏交易平台</title>
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
    
    /* 订单状态筛选 */
    .order-tabs {
      background: #fff;
      border-radius: 8px;
      margin-bottom: 15px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      display: flex;
      overflow-x: auto;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
    
    .order-tab {
      flex: 1;
      padding: 12px 15px;
      text-align: center;
      font-size: 14px;
      color: #666;
      cursor: pointer;
      position: relative;
      min-width: 80px;
    }
    
    .order-tab.active {
      color: #007bff;
      font-weight: bold;
    }
    
    .order-tab.active::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 25%;
      width: 50%;
      height: 2px;
      background: #007bff;
    }
    
    /* 订单卡片 */
    .order-card {
      background: #fff;
      border-radius: 8px;
      margin-bottom: 15px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      overflow: hidden;
    }
    
    .order-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 15px;
      border-bottom: 1px solid #f0f0f0;
      background: #fafafa;
    }
    
    .order-time {
      font-size: 13px;
      color: #666;
    }
    
    .order-status {
      font-size: 13px;
      color: #ff4757;
      font-weight: bold;
    }
    
    .order-content {
      padding: 15px;
    }
    
    .order-product {
      display: flex;
      margin-bottom: 12px;
    }
    
    .order-product-image {
      width: 80px;
      height: 80px;
      border-radius: 6px;
      object-fit: cover;
      margin-right: 12px;
    }
    
    .order-product-info {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    
    .order-product-name {
      font-size: 14px;
      color: #333;
      margin-bottom: 5px;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      height: 36px;
    }
    
    .order-product-game {
      font-size: 12px;
      color: #666;
      margin-bottom: 8px;
    }
    
    .order-product-price {
      font-size: 16px;
      color: #ff4757;
      font-weight: bold;
    }
    
    .order-footer {
      padding: 12px 15px;
      border-top: 1px solid #f0f0f0;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .order-total {
      font-size: 14px;
      color: #333;
    }
    
    .order-total-price {
      font-size: 16px;
      color: #ff4757;
      font-weight: bold;
      margin-left: 5px;
    }
    
    .order-actions {
      display: flex;
      gap: 8px;
    }
    
    .order-btn {
      padding: 6px 12px;
      border-radius: 4px;
      font-size: 12px;
      cursor: pointer;
      border: 1px solid #ddd;
      background: #fff;
      color: #666;
      transition: all 0.2s;
    }
    
    .order-btn:active {
      opacity: 0.8;
    }
    
    .order-btn-primary {
      background: #007bff;
      color: #fff;
      border-color: #007bff;
    }
    
    .order-btn-danger {
      background: #ff4757;
      color: #fff;
      border-color: #ff4757;
    }
    
    /* 空订单状态 */
    .empty-order {
      text-align: center;
      padding: 40px 20px;
      color: #999;
    }
    
    .empty-order-icon {
      font-size: 48px;
      margin-bottom: 15px;
    }
    
    .empty-order-text {
      font-size: 14px;
      margin-bottom: 20px;
    }
    
    .go-shopping-btn {
      padding: 8px 20px;
      background: #007bff;
      color: #fff;
      border: none;
      border-radius: 20px;
      font-size: 14px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <!-- 页面内容 -->
  <div class="content">
    <!-- 页面标题 -->
    <div class="page-title">我的订单</div>
    
    <!-- 订单状态筛选 -->
    <div class="order-tabs">
      <div class="order-tab active">全部</div>
      <div class="order-tab">待支付</div>
      <div class="order-tab">待发货</div>
      <div class="order-tab">待收货</div>
      <div class="order-tab">已完成</div>
      <div class="order-tab">已取消</div>
    </div>
    
    <!-- 订单列表 -->
    <div class="order-card">
      <div class="order-header">
        <div class="order-time">2023-06-15 14:30:25</div>
        <div class="order-status">待支付</div>
      </div>
      <div class="order-content">
        <div class="order-product">
          <img class="order-product-image" src="https://picsum.photos/300/200?random=1" alt="游戏皮肤">
          <div class="order-product-info">
            <div>
              <div class="order-product-name">王者荣耀 李白限定皮肤 千年之狐</div>
              <div class="order-product-game">王者荣耀</div>
            </div>
            <div class="order-product-price">¥128.00 x1</div>
          </div>
        </div>
      </div>
      <div class="order-footer">
        <div class="order-total">
          共1件商品 合计：<span class="order-total-price">¥128.00</span>
        </div>
        <div class="order-actions">
          <button class="order-btn order-btn-danger">取消订单</button>
          <button class="order-btn order-btn-primary">去支付</button>
        </div>
      </div>
    </div>
    
    <div class="order-card">
      <div class="order-header">
        <div class="order-time">2023-06-10 09:15:42</div>
        <div class="order-status">已发货</div>
      </div>
      <div class="order-content">
        <div class="order-product">
          <img class="order-product-image" src="https://picsum.photos/300/200?random=2" alt="游戏皮肤">
          <div class="order-product-info">
            <div>
              <div class="order-product-name">英雄联盟 ez未来战士皮肤</div>
              <div class="order-product-game">英雄联盟</div>
            </div>
            <div class="order-product-price">¥199.00 x1</div>
          </div>
        </div>
      </div>
      <div class="order-footer">
        <div class="order-total">
          共1件商品 合计：<span class="order-total-price">¥199.00</span>
        </div>
        <div class="order-actions">
          <button class="order-btn">查看详情</button>
          <button class="order-btn order-btn-primary">确认收货</button>
        </div>
      </div>
    </div>
    
    <div class="order-card">
      <div class="order-header">
        <div class="order-time">2023-06-05 18:45:12</div>
        <div class="order-status">已完成</div>
      </div>
      <div class="order-content">
        <div class="order-product">
          <img class="order-product-image" src="https://picsum.photos/300/200?random=3" alt="游戏账号">
          <div class="order-product-info">
            <div>
              <div class="order-product-name">原神 胡桃角色账号 毕业武器</div>
              <div class="order-product-game">原神</div>
            </div>
            <div class="order-product-price">¥399.00 x1</div>
          </div>
        </div>
      </div>
      <div class="order-footer">
        <div class="order-total">
          共1件商品 合计：<span class="order-total-price">¥399.00</span>
        </div>
        <div class="order-actions">
          <button class="order-btn">再次购买</button>
          <button class="order-btn">查看详情</button>
        </div>
      </div>
    </div>
  </div>

  <!-- 底部导航栏 -->
  <div class="navbar">
    <div class="nav-item" onclick="location.href='index.php'">首页</div>
    <div class="nav-item active" onclick="location.href='订单页.php'">订单</div>
    <div class="nav-item" onclick="location.href='消息页.php'">信息</div>
    <div class="nav-item" onclick="location.href='主页.php'">主页</div>
  </div>
</body>
</html>