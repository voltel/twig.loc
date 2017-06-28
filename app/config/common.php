<?php
use Silex\Provider\MonologServiceProvider;

// как я понял, это создает в объекте $app ключ $app['monolog']
$app->register(new MonologServiceProvider(), [
  'monolog.logfile' => __DIR__ . '/../logs/silex_dev.log',
  'monolog.level' => 'debug'
]);



// Не понятно, как работает с несколькими путями
$app['twig.path'] = array(
    __DIR__ . '/../../templates',
);

$app['twig.options'] = array('cache' => __DIR__ . '/../cache/twig');

$app['image_path'] = '/images';
//$app['upload_dir'] = __DIR__ . '/../../web' . $app['image_path'];

?>
