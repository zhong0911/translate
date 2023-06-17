<?php


function translate($text, $from, $to)
{
    if ($text) {
        $url = 'https://api.fanyi.baidu.com/api/trans/vip/translate';
        $appid = '20230201001546777';
        $key = 'iYHFC1L6lLNrgzdMmigW';
        $salt = rand(10000, 99999);
        $sign = md5($appid . $text . $salt . $key);
        $params = array(
            'q' => $text,
            'from' => $from,
            'to' => $to,
            'appid' => $appid,
            'salt' => $salt,
            'sign' => $sign,
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response, true);
        return $result['trans_result'][0]['dst'] ?? 'Server Error! Translation failed!';
    } else {
        return "";
    }
}


function chineseToEnglish($text)
{
    return translate($text, 'zh', 'en');
}

function englishToChinese($text)
{
    return translate($text, 'en', 'zh');
}

function autoToChinese($text)
{
    return translate($text, 'auto', 'zh');
}