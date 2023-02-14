<?php
require __DIR__.'/vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
$request = Request::createFromGlobals();
$routes = new RouteCollection();
$routes->add('hello', new Route('/hello'));
$routes->add('greeting', new Route('/greeting/{nama}', ['nama' => 'Surya']));
$routes->add('landing', new Route('/', ['nama'=>'rokan']));
$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);
try {
$response = new Response();
extract($matcher->match($request->getPathInfo()));
include sprintf('%s.php', $_route);
} catch (ResourceNotFoundException $e) {
$response = new Response('Halaman tidak ditemukan', Response::HTTP_NOT_FOUND);
}
$response->send();
