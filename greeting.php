<?php
use Symfony\Component\HttpFoundation\Response;
$response = new Response();
$response->setContent(sprintf('Selamat Datang, %s', $request>get('nama')));

