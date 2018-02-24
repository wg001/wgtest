<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/6 0006
 * Time: 14:31
 */
$json_str='{
	"notify_content": "gmt_create=20180119160732&notify_time=20180119160739&batch_no=15163492520977016628734a9412&_input_charset=UTF-8&batch_status=FINISHED&sign=OSL%2B3jNTwe1adxt5kUF92W8eXhvJr%2FeAaWEg%2FW%2BxQzpNkz0zVkA1Himxg5oYfwG%2BR7k8ilLz%2FX%2Flc56NVRDGU5h3fADNRLNsDFzxdBcXTQ3uHhRkluX5hPQXu%2F8Eliq5PCcHyf6BlU3K%2BwGWkAW%2BNFr8K0%2BrVGWhEhz3ouMF3PG%2BuAaTx6%2FVaOGX%2Fk9ma4OBl5H5G8JC4civogGn02zRcQUfhK7RNKWgR%2FrpNaX5sUiMoaqLlbIccsapIAvKkrdpPwv4BEPTPpgLZ17Sa4G2WI36%2F7LC1HTd1iu1DdUDUp%2Fpc40tyu%2FMulSlHaNalgdODqiSedxYncOlpnFAmbaLIg%3D%3D&version=1.0&notify_id=201801190000108491&batch_quantity=1&notify_type=b2c_batch_pay2bank_status_sync&trade_list=54807%7E121516349252264460369%7E2000.30%7E0.50%7ESUCCESS%7E20180119160732%7E20180119160733%7E%E6%8F%90%E7%8E%B0%7E%7E&batch_amount=2000.30&inner_batch_no=121516349252269460476&gmt_finished=20180119160733&sign_type=RSA",
	"pay_channel": "kubao",
	"need_user_id": false
}';
echo $json_str;
exit;
$data = json_decode($json_str,JSON_UNESCAPED_UNICODE);
echo rawurldecode($data['notify_content']);
exit;
$get_content = file_get_contents('php://input');
file_put_contents("e:/test.log",$get_content);
if(!empty($get_content)){
    $content = $get_content;
}
header("Content-Type:application/json;charset=utf-8");
$data = [
    'status'=>10000,
    'message'=>'success',
    'data'=>[
        'name'=>'wg',
        'sex'=>'man',
        'address'=>'浙江杭州'
    ],
    'get_content'=>json_decode($get_content,true)
];
echo json_encode($data);
exit;
$a = "jsklafd";
$b = "ksdjf";
$redis = new Redis();
$redis->connect("127.0.0.1",6379);
$redis->set('test', 'Hello Redis');
echo $redis->get('test');