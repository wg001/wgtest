<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/24 0024
 * Time: 11:32
 */

//$str="gmt_create=20180122190822&notify_time=20180122190822&batch_no=151661930213761e8cdba96b4670&_input_charset=UTF-8&batch_status=FINISHED&sign=mvAUDktVUDVY5A3ybGE%2F7kqjjVMy3zMm3PBXyHYIe%2FJm3l4J31ebq6viNNNaaY6%2FF5vWyWxPRc8kPkFmoLGP6frp6EoBfqoUxb9J4luEjL5KVBz3IYj0LnUMjr8JN7rsunI3RpAjKQkP%2BFuXKM2f1GfhG0XHu%2FmKxgnuqiG0Jrum11OnUCfGFuW5JUBFQ2lUKZ7mX19fpJZVgqfwTR%2Btk7ZtifFJMPzeOWvLGkOMV2WWGN5o7hWww%2BCj835ktQelxh4Bk4GyPBj9WDryZDLrvIsB9cVc%2BPfNecWVy9%2Fb4RKnrfQCrLlCf%2BJLhtsBaRFV87NUKCRL4YOvQg7ytmYLTg%3D%3D&version=1.0&notify_id=201801220229655561&batch_quantity=1&notify_type=b2c_batch_pay2bank_status_sync&trade_list=54808%7E121516619302319836447%7E1000.30%7E0.00%7EFAILED%7E20180122190822%7E%7E%E6%8F%90%E7%8E%B0%7EF0201%7E%E4%BD%99%E9%A2%9D%E4%B8%8D%E8%B6%B3200100100120000844088200001&batch_amount=1000.30&inner_batch_no=121516619302331836521&gmt_finished=20180122190822&sign_type=RSA";
$str="gmt_create=20180106110942&notify_time=20180106110948&batch_no=1515208174858012336914&_input_charset=UTF-8&batch_status=FINISHED&sign=i4WFyX1geFFvDsFKcANxQHbel4PxpBMdWeEiagCAW7%2Fv4mqRHJ17QTtb%2Baq%2BEF1d2uSYFsSZARtdFEVAzC0SBC2uCKj0NyFRX2YFA%2BFJPXVwxtt%2BfH3Pxneiy2SA0qRhxlto3WGBAQHBKDpLxPgkSOMhpwAtgxq8yRoLCDRFHO3SZXv3GnHtCCdzZ3bUt0O%2FA007kMOaMwK5tzKpcIpLI9oiMNUiCQF%2F7XPzcZ2uFiIm0y9LpdAWnuYfdVvbHl869FsIlDQ8tylomOEjZ59pjMRPnrsbdm4RsN6SqtLAaeXTSPkwAcNwGsPkyJJ23UQ197rXyJpAQ%2Bzln%2FEipYhxTg%3D%3D&version=1.0&notify_id=201801060000101301&batch_quantity=1&notify_type=b2c_batch_pay2bank_status_sync&trade_list=2018010334892%7E121515208182684265415%7E0.01%7E0.02%7EFAILED%7E20180106110942%7E%7E%E6%8F%90%E7%8E%B0%7EF0601%7E%E5%8D%A1bin%E6%9C%BA%E6%9E%84%E4%B8%8D%E5%8C%B9%E9%85%8D&batch_amount=0.01&inner_batch_no=121515208182689265576&gmt_finished=20180106110943&sign_type=RSA";
var_dump(rawurldecode($str));
$eArr = explode("&",rawurldecode($str));
ksort($eArr);
var_dump($eArr);
foreach ($eArr as $value) {
    if(strpos($value,'%2')!==false){
        $value = rawurldecode($value);
    }else{
        $value = str_replace(" ",'+',$value);
    }
    $first_pos = strpos($value, '=');
    $res[substr($value,0,$first_pos)] = substr($value,$first_pos+1);
}
ksort($res);
var_dump($res);