<?php
header("Content-Type:application/json;charset=utf-8");
require_once "utils/Logger.php";
$get_req_data = file_get_contents("php://input");
Logger::debuger($get_req_data);
$result = [
    'status' => 10000,
    'msg' => 'success',
    'data' => [
        [
            'order_id' => '123',
            'amount' => '1000.23',
            'desc' => 'iPhoneX',
            'time' => '2018-02-03 10:32:31',
            'status' => '1'
        ]
    ]
];
echo json_encode($result, JSON_UNESCAPED_UNICODE);
exit;