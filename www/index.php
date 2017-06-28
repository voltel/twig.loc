<?php
require_once __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../app/config/app_config.php';

require __DIR__ . '/../app/config/prod.php';

require __DIR__ . '/../app/routs/routing.php';

$app->run();
