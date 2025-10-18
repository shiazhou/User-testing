<?php
// 数据库连接配置
$host = 'localhost';
$user = 'root';      // 默认 root
$pass = '';          // 默认无密码（XAMPP）
$dbname = 'user_system';

// 创建数据库连接
$conn = new mysqli($host, $user, $pass, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("数据库连接失败: " . $conn->connect_error);
}

// 设置字符集
$conn->set_charset("utf8mb4");
?>