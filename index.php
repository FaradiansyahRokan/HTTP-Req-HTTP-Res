<?php
require __DIR__.'/vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
$request = Request::createFromGlobals();
$path = $request->getPathInfo();
$response = new Response();
$route = ['/hello' => 'hello.php', '/greeting' => 'greeting.php'];
if (isset($route[$path])) {
include $route[$path];
}

$response->send();