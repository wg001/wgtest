<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/3 0003
 * Time: 14:09
 */

class Logger
{

    public static function debuger($content)
    {
        if (empty($content)) {
            return;
        }
        require_once dirname(__DIR__)."/config/config.php";
        $path_pre = $config['log']['log_path'] . '/test/';
        $content = "[" . date('Y-m-d H:i:s') . "]--" . $content . "\r\n";
        if (!file_exists($path_pre)) {
            @mkdir($path_pre, 0777, true);
        }
        return file_put_contents($path_pre.date('Y-m-d') . '.log', $content, FILE_APPEND);
    }
}