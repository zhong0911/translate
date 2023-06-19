<?php

namespace Translation;

class Translation
{
    /**
     * @param $q
     * @param $from
     * @param $to
     * @return false|string
     */
    public static function translate($q, $from, $to)
    {
        $api_key = getenv('BAIDU_FANYI_API_KEY');
        $appid = getenv('BAIDU_FANYI_APPID');
        $salt = rand(10000, 99999);
        $sign = md5($appid . $q . $salt . $api_key);
        $url = "https://api.fanyi.baidu.com/api/trans/vip/translate?q=" . urlencode($q) . "&from=" . $from . "&to=" . $to . "&appid=" . $appid . "&salt=" . $salt . "&sign=" . $sign;
        $result = file_get_contents($url);
        return json_decode($result);
    }
}


