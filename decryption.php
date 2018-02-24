<?php
require_once "utils/Aes.php";
//公钥验签
$pubkey = "-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAv8dXxi8wNAOqBNOh8Dv5
rh0BTb5KNgk62jDaS536Z1cDqq2JmpBYkBnzJXHAXEgBwPXgX8bGruMMjZKW8P4u
v3Rvj8Am9ewWwUK2U7m2ZB3Oo9MWtyYoiLGX1IA4FFenXzpPgm0WyzaeLX4yJ8j+
hVrRbgwbZzb9Aq0MyepnK5PVoSPLAPXxvWrIBTok1+liughxwD/7R+ldaQQCtWC7
nHBwOOChLkX6jenCOqi6LrTxJ4ycGTWTctngFMJO4YtMmq/2zrw+ovNqmxHJQAZw
uRFnKlZuFoEKPWyMGYtbvK9AWIfC8ubn30O5F9kfLMIHwAHCh0UipPSbKDwQ2BnW
swIDAQAB
-----END PUBLIC KEY-----";
$privateKey="-----BEGIN RSA PRIVATE KEY-----
MIIEowIBAAKCAQEAv8dXxi8wNAOqBNOh8Dv5rh0BTb5KNgk62jDaS536Z1cDqq2J
mpBYkBnzJXHAXEgBwPXgX8bGruMMjZKW8P4uv3Rvj8Am9ewWwUK2U7m2ZB3Oo9MW
tyYoiLGX1IA4FFenXzpPgm0WyzaeLX4yJ8j+hVrRbgwbZzb9Aq0MyepnK5PVoSPL
APXxvWrIBTok1+liughxwD/7R+ldaQQCtWC7nHBwOOChLkX6jenCOqi6LrTxJ4yc
GTWTctngFMJO4YtMmq/2zrw+ovNqmxHJQAZwuRFnKlZuFoEKPWyMGYtbvK9AWIfC
8ubn30O5F9kfLMIHwAHCh0UipPSbKDwQ2BnWswIDAQABAoIBAH7QyfkSsTRkC+Sf
MaGTd1qscXVAVQCAf/tSfLeuIqx9PL57fNfJhdbcYg2rt8EOGKLJtHKBFlcFawKf
IdMAslcGHtOXA+xxDucDP2AEGVkA4OkyJ/46bGlfzn/Fvc+t2s6812Du1DjSyCxb
G711SuFSGdVEikZpdUt0tVU7/LcyKAEZd45Ct+F9MvrPECbSsfODvTOVDHO2k42f
iwSzLPVmM4wVUc2xA15O87jtDhRiAK/RveQ7J2TWcarkyCR8J+bf5GGA79LdE3vR
Kr/HAk7INVX4T6U9QuDF30mqNRsloQbNGdvqO65nafNHvuVzUiqPdSX7XQwg/cOO
mhSsUbkCgYEA8BQXaHn3psHUZx8zEwQFVyd6rzxb+7jmVlUT+jG1pSiZ4WAWxxqx
YVXhn2dbfatDxWoGOMsrDM/Qp8g81nMG01jtmJr2RKFhAbQl93ipGvvaCNoJ8Lx7
HpFSq7dETcCCAE7tYMk0LlcVwxeaIUWakDyBHgEy4Zp6lLwdwsh115UCgYEAzH8/
E5dTOcYdcxk7HLupEC9MCb+FshZT5UIN9I7zLNljQX2O/8m2THb+oZUoy30RVot+
kYjh5H8M5CYiP0Kkm0Ovq5KC0loyt5SfzWbgwHEldQUVp8woE0YdaJzGB/UnmI9m
dJBON1t3qbMWjlguXOD8bfriDRuefaZd9oVSQycCgYBcz+ecxEoxdY2fsDgWid9m
qiSLylHlJr4lcg6fEsieaOvUbUlg/7jDYGgxL8v28Vbp4us02ZZzBYQs2QRsA1wI
KMDx1jaOobTW68YhvcviWqsX8PMW1kbislu7dsY5KMsZQ2oRmLdLku8e1OkJI9d1
G27vIpeBEC+DgJYgz05/YQKBgQCStWNiQbkihKBSF7LR3Uvf4Z6yi6V16xDLM8Vh
Q0DwVxEfRd3WYjcXynLJJ4J54kMTDMaD0GkHDaMI9taw/bWr8jZQZ67VDILAM68l
o/3v8fyGZFxx4kSJ905X48kqolWC3LYLQA/tJQDHTUUMX/T7CynuGQQdlUfyKu3U
Uzd+FwKBgHW9Nur4eTxK1nIOZyGgCqL1duYsJQcPWyIcRMTSjOoQZ5ZUhQZTw1Hd
2CW0Iu2fXExESTIjwXJ0ZJXnCgFU8acQX5vtItC1BlMaucw9XTx1RBCVQdTZ7DSX
vTlWbWwZHVDP85dioLE9mfo5+Hh3SmHDi3TaVXjxeJsUgHkRgOX7
-----END RSA PRIVATE KEY-----";
$originData="王刚是个大笨蛋123";
$sign = "KPElDs6U9PolH8Rd0Xu7tNss5bc6AE72Oo9YQV5Q/xQRA5VYLt934qaXXoxkkm08HL/18sfirtL+cVy9E+EWIDjICb/PGGpXvOV5x749jNZmVexIRI0Ex7P8sd44oAqohhq1FowGwj+ElOjgsC8hxnJWkamzWhfdikCSJNYi3CYebAAPixUem5ma1NxwQWprIqXLiHRgMz8jiQ5Wcdwm0gXOiezDNDx1ZQtT/NTp+0wOaZzgAtTyHJ/5n/6PEY9Y4dKtUoQtSoy/0UhS22VP0sYZGoZO7kBlhRKh/nzurAf85untpbLV7pi/1aN+Xl+vBHdnrnRJJPqRRoW9ZCCSqQ==";
$encData="GxlDiCQ6Ytm3qczhHFiwm8nP3EGRZwVtxYHApWQvDzvHckxeA7vVEnLgd9kSitkKA3BnrROAvNJbDlT0iGX4qrJh7YPUvaqhuvSYGM4Aimdu+0XCN9jgj7drfAOhO2+2yeIrXB0nYRYH/8Rc0qMP77OrF75DoQZtM/90snby4EtZr+h4u1F9ROv1gc2jQr9pnzEbe9krwtTq7L19AloUdFHG2esC98eIUF2HqOln6mnTZV3YYHTQw5TwAX9uBvdpCXQ0SGreik49bWO6pWHc8Znw+y81OxxyyVtPwIVYFeEFx90K5pjFbJUC0sOkS0thC0jpJZLl1i34jzb0ow97Wg==";
var_dump(base64_encode(rsa_encrypt($originData,$pubkey)));
$data = rsa_decrypt($privateKey,base64_decode($encData));
var_dump($data);
$data1=privateDecrypt(base64_encode($encData),$privateKey);
var_dump($data1);
$checkRes = verifySign($originData,$sign,$pubkey);
var_dump($checkRes);
echo "<br/>aes test:<br/>";
$aesEncryStr="cwJ2qOl+2k1itDTXhqvd753iDcdXTUx9FQ0Ji6vLnn4=";
$aesKey="ajkdfj23412k1*&1324jdfaksdfjkas2";
var_dump(decrypt($aesEncryStr,$aesKey));
echo "<br/>lllllllllllllllllllllllllllllllllllllllllllllllllllll";
var_dump(Aes::decode($aesKey,$aesEncryStr,Aes::MODE_CBC));
exit("ooooooooooooooo");

function decrypt($sStr, $sKey)
{
    $v = substr($sKey,0,16);
    $decrypted = openssl_decrypt(base64_decode($sStr), 'AES-128-CBC', $sKey, OPENSSL_RAW_DATA);
    return $decrypted;
}

function verifySign($encryStr,$sign,$cert){
//    $cert = file_get_contents($pubKey);
    $pubkeyid = openssl_pkey_get_public($cert);
    $ok = openssl_verify($encryStr, base64_decode($sign), $cert, OPENSSL_ALGO_SHA256);
    openssl_free_key($pubkeyid);
    return $ok == 1 ? true : false;
}

function rsa_encrypt($rawData, $pubkey) {
    $res = openssl_get_publickey($pubkey);
    $keyInfo = openssl_pkey_get_details($res);
    $step = $keyInfo['bits'] / 8 - 11;

    $encryptedList = array();
    for ($i = 0, $len = strlen($rawData); $i < $len; $i += $step) {
        $data = substr($rawData, $i, $step);
        $encrypted = '';
        openssl_public_encrypt($data, $encrypted, $res);
        $encryptedList[] = ($encrypted);
    }
    openssl_free_key($res);
    $data = join('', $encryptedList);
    return $data;
}

function rsa_decrypt($privatekey, $encrypted_data) {
    $res = openssl_get_privatekey($privatekey);
    $keyInfo = openssl_pkey_get_details($res);
    $step = $keyInfo['bits'] / 8;

    $decryptedList = array();
    for ($i = 0, $len = strlen($encrypted_data); $i < $len; $i += $step) {
        $data = substr($encrypted_data, $i, $step);
        $decrypted = '';
        openssl_private_decrypt($data, $decrypted, $res);
        $decryptedList[] = $decrypted;
    }
    openssl_free_key($res);
    return join('', $decryptedList);
}

function privateDecrypt($data, $privateKey)
{
    openssl_private_decrypt($data, $decrypted, $privateKey);
    return $decrypted;
}