<?php
/**
 * @Author: zhong
 * @Date: 2023-06-19 18-29-41
 * @LastEditors: zhong
 */

error_reporting(0);
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Origin: *');
header("Content-type:application/json; charset=utf-8");
date_default_timezone_set("Asia/Shanghai");
session_set_cookie_params(0, '/', '.antx.cc');
session_start();

require_once '../../src/Translation.php';

use Translation\Translation;

$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
if ($REQUEST_METHOD === "GET" || $REQUEST_METHOD === "POST") {
    $params = ($REQUEST_METHOD === "GET") ? $_GET : $_POST;
    $q = $params['q'] ?? '';
    $from = $params['from'] ?? '';
    $to = $params['to'] ?? '';
    if ($q == '')die(json_encode(['success' => false, 'message' => 'Translation text cannot be empty']));
    if ($from == '')die(json_encode(['success' => false, 'message' => 'Origin language cannot be empty']));
    if ($to == '')die(json_encode(['success' => false, 'message' => 'Target language cannot be empty']));
    echo json_encode(Translation::translate($q, $from, $to), JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(array('success' => false, "message" => 'No POST or GET method'), true);
}
