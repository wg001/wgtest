<?php
class Aes
{
    /**
     * 算法,另外还有192和256两种长度
     */
    const CIPHER = MCRYPT_RIJNDAEL_128;
    /**
     * 模式
     */
    const MODE = MCRYPT_MODE_ECB;
    const MODE_CFB = MCRYPT_MODE_CFB;
    const MODE_CBC = MCRYPT_MODE_CBC;

    /**
     * 加密
     * @param string $key 密钥
     * @param string $str 需加密的字符串
     * @return type
     */
    public static function encode( $key, $str ){
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(self::CIPHER,self::MODE),MCRYPT_RAND);
        return mcrypt_encrypt(self::CIPHER, $key, $str, self::MODE, $iv);
    }

    /**
     * 解密
     * @param type $key
     * @param type $str
     * @return type
     */
    public static function decode( $key, $str ,$mode=self::MODE){
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(self::CIPHER,$mode),MCRYPT_DECRYPT);
        return mcrypt_decrypt(self::CIPHER, $key, $str, $mode, $iv);
    }
}