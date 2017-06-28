<?php
// см. директиву FallbackResource /index_dev.php в .htaccess

require_once __DIR__ . '/../vendor/autoload.php';

// $app
require __DIR__ . '/../app/config/app_config.php';


// здесь происходит несколько вызовов $app->register с ...ServiceProvider
// необходимыми для отладки
require __DIR__ . '/../app/config/dev.php';


// Вот самый важный файл:
require __DIR__ . '/../app/routs/routing.php';


$app->run();
