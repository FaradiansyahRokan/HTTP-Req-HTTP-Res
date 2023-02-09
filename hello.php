<?php
use Symfony\Component\HttpFoundation\Response;
$response = new Response();
$response->setContent('Hello World');
$response->send();
