<?php

namespace Danil\Service;

use Danil;
use Danil\Application;
use Danil\Model\Post;

interface PostService{
    public static function getAll(Application $app);

    public static function add(Application $app, Post $post);
}