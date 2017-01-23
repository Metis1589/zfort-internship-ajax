<?php
$callback = $_GET['callback'];
$url = urldecode($_GET['url']);
header("Content-Type: application/json");
$response = [
    'success' => 1,
    'data' => [
        'url' => urlencode($url)
    ]
];
echo $_GET['callback'] . '( ' . json_encode($response) . ' )';
exit();
?>