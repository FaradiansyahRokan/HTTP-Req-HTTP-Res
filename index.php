<?php
require __DIR__.'/vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;
$request = Request::createFromGlobals();
$path = $request->getPathInfo();
$route = ['/hello' => 'hello.php', '/greeting' => 'greeting.php'];
if (isset($route[$path])) {
include $route[$path];
}

$response->send();