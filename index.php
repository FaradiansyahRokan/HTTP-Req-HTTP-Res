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
}else {
    $response->setContent('<h1 style="font-size:80px; color:red; display:flex; justify-content:center;">404<h1><br><h1 style="display:flex; justify-content:center;">Page Not Found<h1>');
    $response->setStatusCode(Response::HTTP_NOT_FOUND);
    }
    

$response->send();