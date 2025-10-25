<?php
require_once __DIR__ . '/config.php';

$raw = file_get_contents('php://input');
$data = json_decode($raw, true);
if (!is_array($data) || empty($data['query'])) {
    http_response_code(400);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['error' => '缺少参数 query']);
    exit;
}

$query = trim($data['query']);
if (mb_strlen($query, 'UTF-8') > 200) {
    http_response_code(400);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['error' => '查询内容太长']);
    exit;
}

$safe = urlencode($query);
$third_party_base = 'https://ovoav.com/api/sky/sgwz/sgv1?key=' . urlencode($API_KEY) . '&id=';
$third_party_url = $third_party_base . $safe;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $third_party_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$response = curl_exec($ch);
$err = curl_error($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($response === false) {
    http_response_code(502);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['error' => '无法请求第三方接口', 'detail' => $err]);
    exit;
}

header('Content-Type: application/json; charset=utf-8');
http_response_code($http_code);
echo $response;
?>
