<?php
session_start();

// 设置标志，表示此用户通过验证
$_SESSION['verified'] = true;

echo 'ok';
?>