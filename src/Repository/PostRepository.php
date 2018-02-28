<?php

namespace Danil\Repository;

use Danil;
use Danil\Application;
use Danil\Model\Post;
use PDOStatement;
use PDO;


interface PostRepository
{
    public static function getAll(Application $app);

    public static function add(Application $app, Post $post);

//    public static function getPostsOnPage(Application $app, $pageNumber);

}