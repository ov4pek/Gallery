<?php

use Danil\Application;

require_once __DIR__.'/../vendor/autoload.php';

define('ROOT',$_SERVER['DOCUMENT_ROOT']);
define('UPLOAD_PATH', '/resources/uploads/');

$app = new Application();

$app->run();
