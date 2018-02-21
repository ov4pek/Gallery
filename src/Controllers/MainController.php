<?php

namespace Danil\Controllers;

use Danil;
use Danil\Application;
use Danil\Common\Common;
use Danil\Repository\SitePostRepository;
use Danil\Service\SitePostService;


class MainController
{
    public static function doGet(Application $app) {
        $posts = SitePostRepository::getAll($app);
        $pagesNumber = Common::getPageNumber($app);

//        return $app['twig']->render('main.twig.html');

        if ($pagesNumber == 1) {
            return $app['twig']->render('main.twig.html', array(
                'posts' => $posts,
                'numberOfPosts' => count($posts),
                'pagesNumber' => $pagesNumber,
                'pageNumber' => 1,
            ));

        } else {
            return $app->redirect('/page/1');
        }

    }

    public static function getPage(Application $app, $pageNumber) {

        $posts = SitePostService::getAll($app);
        $pagesNumber = Common::getPageNumber($app);

        if ($pageNumber > $pagesNumber || $pageNumber < 1) {
            return $app['twig']->render('notfound.twig.html');
        }

        $postsOnPage = SitePostService::getPostsOnPage($app, $pageNumber);

        return $app['twig']->render('main.twig.html', array(
            'posts' => $postsOnPage,
            'numberOfPosts' => count($posts),
            'pagesNumber' => $pagesNumber,
            'pageNumber' => $pageNumber,
        ));

    }

}
