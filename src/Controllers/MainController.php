<?php

namespace Danil\Controllers;

use Danil;
use Danil\Application;
use Danil\Repository\SitePostRepository;
use Danil\Service\SitePostService;



class MainController
{
    public static function doGet(Application $app) {
        $posts = SitePostRepository::getAll($app);


        return $app['twig']->render('main.twig.html', array(
            'posts' => $posts,
            'numberOfPosts' => count($posts),
            ));

    }

}
