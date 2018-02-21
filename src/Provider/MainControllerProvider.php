<?php

namespace Danil\Provider;


use Danil\Controllers\MainController;
use Silex\Api\ControllerProviderInterface;
use Silex\Application;
use Silex\ControllerCollection;

class MainControllerProvider implements ControllerProviderInterface
{

    /**
     * Returns routes to connect to the given application.
     *
     * @param Application $app An Application instance
     *
     * @return ControllerCollection A ControllerCollection instance
     */
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/', function() use ($app) {
            return MainController::doGet($app);
        });

//        $controllers->get('/page/{pageNumber}', function ($pageNumber) use ($app) {
//            return MainController::getPage($app, $pageNumber);
//        });

        return $controllers;
    }
}