<?php
use App\Controller; // Интересно, что это папка, а не класс



// ====== Configuring Controllers

// ====== Homepage
$app['homepage.controller'] = function() use ($app) {
  return new Controller\Homepage(
    $app['twig'],
    $app['monolog']
  );
};


$app['homepage.twig_examples'] = function() use($app) {
  return new Controller\Homepage(
    $app['twig'],
    $app['monolog']
  );
};

?>
