<?php

namespace Danil\Service;

use Danil;
use Danil\Application;
use Danil\Model\Post;
use Danil\Repository\SitePostRepository;

class SitePostService implements PostService
{

    public static function getAll(Application $app)
    {
        return SitePostRepository::getAll($app);
    }

//    public static function getById(Application $app, $id)
//    {
//        // TODO: Implement getById() method.
//    }


    public static function add(Application $app, Post $post)
    {
        return SitePostRepository::add($app, $post);
    }

    public static function getPostsOnPage(Application $app, $pageNumber)
    {
        return SitePostRepository::getPostsOnPage($app, $pageNumber);
    }
}