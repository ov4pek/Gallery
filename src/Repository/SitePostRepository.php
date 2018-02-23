<?php
/**
 * Created by PhpStorm.
 * User: danil
 * Date: 16/02/18
 * Time: 08:39
 */

namespace Danil\Repository;

use Danil;
use Danil\Application;
use Danil\Model\Post;
use PDO;
use PDOStatement;

class SitePostRepository implements PostRepository
{

    public static function getAll(Application $app)
    {
        $sql = "SELECT p.id, photo, description FROM posts p;";

        $sth = $app['db']->query($sql);

        $posts = [];

        while ($row = $sth->fetch()) {
            $post = new Post(
                $row['id'],
                stream_get_contents($row['photo']),
                $row['description']
            );
            $posts[] = $post;
        }

        return $posts;
    }

    public static function add(Application $app, Post $post)
    {
        $app['db']->insert('posts', array(
            'photo' => $post->getPhoto(),
            'description' => $post->getDescription(),
        ));

        return true;
    }

    public static function getPostsOnPage(Application $app, $pageNumber)
    {

        $sql = "SELECT p.id, photo, description FROM posts p;";
        $sth = $app['db']->prepare($sql);
        $sth->execute();

        $posts = [];

        while ($row = $sth->fetch()) {
            $post = new Post(
                $row['id'],
                $row['photo'],
                $row['description']
            );
            $posts[] = $post;
        }

        return $posts;
    }
}