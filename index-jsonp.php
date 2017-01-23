<?php
$callback = $_GET['callback'];
if(isset($_GET['url'])){
    $url = urldecode($_GET['url']);
    header("Content-Type: application/json");
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

echo $_GET['callback'] . '( ' . json_encode($response) . ' )';
exit();
?>