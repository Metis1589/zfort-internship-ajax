<?php
// Access-Control headers are received during OPTIONS requests
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

$postData = [];
parse_str(file_get_contents('php://input'), $postData);

if(isset($postData['url'])) {
    $url = urldecode($postData['url']);
    $response = [
        'success' => 1,
        'data' => [
            'url' => urlencode($url)
        ]
    ];
}
else {
    $response = [
        'success' => 0,
        'data' => [
            'url' => 'Image is missing'
        ]
    ];
}

echo json_encode($response);
exit();
?>