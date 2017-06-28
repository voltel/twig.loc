<?php
// the created here $app variable must be returned to index_dev.php

use Silex\Application;

use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;




$app = new Application();

$app->register(new ServiceControllerServiceProvider());

// $app['twig']
$app->register(new TwigServiceProvider());

//return $app;
