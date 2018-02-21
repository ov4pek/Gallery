<?php

namespace Danil;

use Danil\Provider\PostControllerProvider;
use Silex\Application as BaseApplication;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Danil;
use Danil\Provider\MainControllerProvider;


class Application extends BaseApplication
{
    public function __construct(){
        parent::__construct();
        $this['debug'] = true;
        $this->registerProviders();
        $this->mountControllers();
    }

    public function registerProviders() {
        $this->register(new TwigServiceProvider(), [
            "twig.path" => __DIR__ . '/View',
        ]);

        $this->register(new DoctrineServiceProvider(), array(
            'db.options' => array(
                'driver' => 'pdo_pgsql',
                'dbname' => 'gallery',
                'user' => 'postgres',
                'password' => '12345678',
                'charset' => 'utf8',
            )
        ));

    }

    function mountControllers(){
        $this->mount('/', new MainControllerProvider());
        $this->mount('/post', new PostControllerProvider());
    }
}