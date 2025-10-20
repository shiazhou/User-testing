<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <title>首页 - 虚拟游戏交易平台</title>
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
      height: 50px; /* 增加导航栏高度 */
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
      line-height: 50px; /* 和 .navbar 高度一样 */
      transition: color 0.3s;
    }

    .nav-item.active{color:#007bff;font-weight:bold;}
    
    /* 头部搜索区域 */
    .header {
      background: #fff;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 15px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }
    
    .search-bar {
      display: flex;
      align-items: center;
      background: #f5f5f5;
      border-radius: 20px;
      padding: 8px 15px;
    }
    
    .search-bar input {
      flex: 1;
      border: none;
      background: transparent;
      outline: none;
      font-size: 14px;
      margin-left: 8px;
    }
    
    /* 分类导航 */
    .category-nav {
      background: #fff;
      border-radius: 8px;
      padding: 15px 0;
      margin-bottom: 15px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }
    
    .category-grid {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      gap: 10px;
      padding: 0 10px;
    }
    
    .category-item {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    
    .category-icon {
      width: 40px;
      height: 40px;
      background: #e8f4fd;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 5px;
      color: #007bff;
      font-size: 20px;
    }
    
    .category-name {
      font-size: 12px;
      color: #333;
    }
    
    /* 轮播图 */
    .banner {
      background: #fff;
      border-radius: 8px;
      padding: 10px;
      margin-bottom: 15px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      position: relative;
      overflow: hidden;
      height: 150px;
    }
    
    .banner-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 6px;
    }
    
    /* 商品区域 */
    .product-section {
      margin-bottom: 20px;
    }
    
    .section-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
      padding: 0 5px;
    }
    
    .section-title {
      font-size: 18px;
      font-weight: bold;
      color: #333;
    }
    
    .section-more {
      font-size: 14px;
      color: #999;
    }
    
    .product-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 10px;
    }
    
    .product-card {
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      transition: transform 0.2s, box-shadow 0.2s;
    }
    
    .product-card:active {
      transform: scale(0.98);
    }
    
    .product-image {
      width: 100%;
      height: 120px;
      object-fit: cover;
    }
    
    .product-info {
      padding: 10px;
    }
    
    .product-name {
      font-size: 14px;
      color: #333;
      margin-bottom: 5px;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      height: 40px;
    }
    
    .product-game {
      font-size: 12px;
      color: #666;
      margin-bottom: 8px;
    }
    
    .product-price {
      font-size: 16px;
      color: #ff4757;
      font-weight: bold;
    }
    
    .original-price {
      font-size: 12px;
      color: #999;
      text-decoration: line-through;
      margin-left: 5px;
    }
    
    .product-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 5px;
    }
    
    .product-sales {
      font-size: 11px;
      color: #999;
    }
    
    .tag-new {
      background: #ff4757;
      color: #fff;
      font-size: 10px;
      padding: 2px 4px;
      border-radius: 3px;
    }
    
    .tag-hot {
      background: #ffa502;
      color: #fff;
      font-size: 10px;
      padding: 2px 4px;
      border-radius: 3px;
    }
    
    /* 适配小屏幕 */
    @media (max-width: 320px) {
      .category-icon {
        width: 35px;
        height: 35px;
        font-size: 18px;
      }
      
      .product-image {
        height: 100px;
      }
      
      .banner {
        height: 120px;
      }
    }
  </style>
</head>
<body>
  <!-- 页面内容 -->
  <div class="content">
    <!-- 头部搜索区域 -->
    <div class="header">
      <div class="search-bar">
        <span>🔍</span>
        <input type="text" placeholder="搜索游戏、商品或装备">
      </div>
    </div>
    
    <!-- 轮播图 -->
    <div class="banner">
      <img class="banner-image" src="https://picsum.photos/800/400" alt="促销活动">
    </div>
    
    <!-- 分类导航 -->
    <div class="category-nav">
      <div class="category-grid">
        <div class="category-item">
          <div class="category-icon">🎮</div>
          <div class="category-name">游戏账号</div>
        </div>
        <div class="category-item">
          <div class="category-icon">✨</div>
          <div class="category-name">游戏皮肤</div>
        </div>
        <div class="category-item">
          <div class="category-icon">🛡️</div>
          <div class="category-name">游戏装备</div>
        </div>
        <div class="category-item">
          <div class="category-icon">💰</div>
          <div class="category-name">游戏币</div>
        </div>
        <div class="category-item">
          <div class="category-icon">⚡</div>
          <div class="category-name">代练代打</div>
        </div>
      </div>
    </div>
    
    <!-- 热门商品 -->
    <div class="product-section">
      <div class="section-header">
        <div class="section-title">🔥 热门商品</div>
        <div class="section-more">查看更多 ></div>
      </div>
      <div class="product-grid">
        <div class="product-card">
          <img class="product-image" src="https://picsum.photos/300/200?random=1" alt="游戏皮肤">
          <div class="product-info">
            <div class="product-name">王者荣耀 李白限定皮肤 千年之狐</div>
            <div class="product-game">王者荣耀</div>
            <div class="product-price">
              ¥128.00
              <span class="original-price">¥158.00</span>
            </div>
            <div class="product-footer">
              <div class="product-sales">已售1256件</div>
              <div class="tag-hot">热门</div>
            </div>
          </div>
        </div>
        <div class="product-card">
          <img class="product-image" src="https://picsum.photos/300/200?random=2" alt="游戏皮肤">
          <div class="product-info">
            <div class="product-name">英雄联盟 ez未来战士皮肤</div>
            <div class="product-game">英雄联盟</div>
            <div class="product-price">
              ¥199.00
            </div>
            <div class="product-footer">
              <div class="product-sales">已售892件</div>
              <div class="tag-hot">热门</div>
            </div>
          </div>
        </div>
        <div class="product-card">
          <img class="product-image" src="https://picsum.photos/300/200?random=3" alt="游戏账号">
          <div class="product-info">
            <div class="product-name">原神 胡桃角色账号 毕业武器</div>
            <div class="product-game">原神</div>
            <div class="product-price">
              ¥399.00
              <span class="original-price">¥499.00</span>
            </div>
            <div class="product-footer">
              <div class="product-sales">已售35件</div>
              <div class="tag-hot">热门</div>
            </div>
          </div>
        </div>
        <div class="product-card">
          <img class="product-image" src="https://picsum.photos/300/200?random=4" alt="游戏皮肤">
          <div class="product-info">
            <div class="product-name">绝地求生 黄金AK皮肤</div>
            <div class="product-game">绝地求生</div>
            <div class="product-price">
              ¥88.00
              <span class="original-price">¥128.00</span>
            </div>
            <div class="product-footer">
              <div class="product-sales">已售428件</div>
              <div class="tag-hot">热门</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- 新品上架 -->
    <div class="product-section">
      <div class="section-header">
        <div class="section-title">✨ 新品上架</div>
        <div class="section-more">查看更多 ></div>
      </div>
      <div class="product-grid">
        <div class="product-card">
          <img class="product-image" src="https://picsum.photos/300/200?random=5" alt="游戏装备">
          <div class="product-info">
            <div class="product-name">CSGO 渐变蝴蝶刀</div>
            <div class="product-game">CSGO</div>
            <div class="product-price">
              ¥1299.00
              <span class="original-price">¥1499.00</span>
            </div>
            <div class="product-footer">
              <div class="product-sales">已售18件</div>
              <div class="tag-new">新品</div>
            </div>
          </div>
        </div>
        <div class="product-card">
          <img class="product-image" src="https://picsum.photos/300/200?random=6" alt="游戏装备">
          <div class="product-info">
            <div class="product-name">穿越火线 火麒麟永久武器</div>
            <div class="product-game">穿越火线</div>
            <div class="product-price">
              ¥299.00
              <span class="original-price">¥399.00</span>
            </div>
            <div class="product-footer">
              <div class="product-sales">已售256件</div>
              <div class="tag-new">新品</div>
            </div>
          </div>
        </div>
        <div class="product-card">
          <img class="product-image" src="https://picsum.photos/300/200?random=7" alt="游戏皮肤">
          <div class="product-info">
            <div class="product-name">和平精英 玛莎拉蒂载具皮肤</div>
            <div class="product-game">和平精英</div>
            <div class="product-price">
              ¥188.00
              <span class="original-price">¥258.00</span>
            </div>
            <div class="product-footer">
              <div class="product-sales">已售632件</div>
              <div class="tag-new">新品</div>
            </div>
          </div>
        </div>
        <div class="product-card">
          <img class="product-image" src="https://picsum.photos/300/200?random=8" alt="游戏账号">
          <div class="product-info">
            <div class="product-name">魔兽世界 怀旧服账号 满级法师</div>
            <div class="product-game">魔兽世界</div>
            <div class="product-price">
              ¥599.00
              <span class="original-price">¥699.00</span>
            </div>
            <div class="product-footer">
              <div class="product-sales">已售22件</div>
              <div class="tag-new">新品</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 底部导航栏 -->
  <div class="navbar">
    <div class="nav-item active" onclick="location.href='index.php'">首页</div>
    <div class="nav-item" onclick="location.href='订单页.php'">订单</div>
    <div class="nav-item" onclick="location.href='消息页.php'">信息</div>
    <div class="nav-item" onclick="location.href='主页.php'">主页</div>
  </div>
</body>
</html>