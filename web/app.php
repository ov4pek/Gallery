<?php

use Danil\Application;

require_once __DIR__.'/../vendor/autoload.php';

define('PHOTOS_PER_PAGE', 5);

$app = new Application();

$app->run();
