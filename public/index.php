<?php

use App\Kernel;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\HttpFoundation\Request;

require dirname(__DIR__).'/vendor/autoload.php';

$env = $_SERVER['APP_ENV'] ?? 'dev';
$debug = $_SERVER['APP_DEBUG'] ?? ('prod' !== $env);

if ($debug) {
    umask(0000);
    Debug::enable();
}

$request = Request::createFromGlobals();
$kernel = new Kernel($env, $debug);
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
