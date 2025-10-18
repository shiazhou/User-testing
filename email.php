<?php
function sendMail($to, $subject, $content) {
    $config = [
        'ColaKey' => 'ghukJKr1QsjYac1757773166204BInv1T2b7r',
        'tomail' => $to,
        'fromTitle' => '用户注册系统',
        'subject' => $subject,
        'content' => $content,
        'smtpCode' => 'vrxetzkncybachff',
        'smtpEmail' => '3459623548@qq.com',
        'smtpCodeType' => 'qq'
    ];

    $url = 'https://luckycola.com.cn/tools/customMail';
    $ch = curl_init();
    $jsonData = json_encode($config);

    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $jsonData,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ],
        CURLOPT_TIMEOUT => 10
    ]);

    $response = curl_exec($ch);
    if (curl_errno($ch)) return 'CURL错误: ' . curl_error($ch);
    curl_close($ch);

    $data = json_decode($response, true);
    if (isset($data['code']) && $data['code'] === 0) return true;
    return $data['msg'] ?? '未知错误';
}
?>