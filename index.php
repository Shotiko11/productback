<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Content-Type");


function autoloader($className)
{
    $className = str_replace('\\', '/', $className);
    $file = __DIR__ . "/" . $className . ".php";

    if (file_exists($file)) {
        require_once $file;
    }
}

spl_autoload_register('autoloader');


use api\core\Request;
use api\core\Api;

$request = Request::get_request_info();

$src = new Api($request);
$response = $src->hendle();

$src->send($response);
