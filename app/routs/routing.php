<?php

use Symfony\Component\HttpFoundation\Session\Session;

// voltel - это кусок я вставил сам с сайта Symfony
// http://symfony.com/doc/current/components/http_foundation/sessions.html
$symfony_session = new Session();
$symfony_session->start();
$app['session'] = $symfony_session;


require 'services.php';


// Routing schemas
$app->get('/', 'homepage.controller:showIndexPageAction')->bind('home');

$app->get('/example/{example_id}', 'homepage.twig_examples:showTwigExample')
  ->convert('example_id', function($id) {return intval($id);})
  ->value('example_id', 1)
  ->bind('examples');
