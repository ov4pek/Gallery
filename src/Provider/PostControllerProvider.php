<?php

namespace Danil\Provider;

use Danil\Controllers\PostController;
use Silex\Api\ControllerProviderInterface;
use Silex\Application;
use Silex\ControllerCollection;

class PostControllerProvider implements ControllerProviderInterface
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

        $controllers->get('/create', function () use ($app) {
            return PostController::createPostGet($app);
        });

        $controllers->post('/save', function () use ($app) {
            return PostController::createPostPost($app);
        });

        return $controllers;
    }
}