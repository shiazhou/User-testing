<?php
// 开启会话
session_start();

// 清除所有会话变量
$_SESSION = array();

// 如果使用cookie保存会话ID，删除cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// 销毁会话
if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}

// 跳转到登录页面
header('Location: 登录页.php?logged_out=1');
exit;