<?php
// development environment configuration

use Silex\Provider\WebProfilerServiceProvider;

use Symfony\Component\Debug\Debug;

require __DIR__ . '/common.php';

// When developing a website, you might want to turn on the debug mode to ease debugging:
$app['debug'] = true;
Debug::enable();

?>
