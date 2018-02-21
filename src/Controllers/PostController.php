<?php

namespace Danil\Controllers;

use Danil;
use Danil\Application;
use Symfony\Component\HttpFoundation\Request;
use Danil\Model\Post;
use Danil\Common\Common;
use Danil\Service\SitePostService;


class PostController{

    public static function createPostGet(Application $app) {
        return $app['twig']->render('postcreate.twig.html');
    }

    public static function createPostPost(Application $app) {

        $path = "/home/danil/PhpstormProjects/Gallery/web/resources/uploads/";
        $types = array('image/gif', 'image/png', 'image/jpeg');


        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if (!in_array($_FILES['picture']['type'],$types)) {
                echo 'Запрещённый тип файла';
                var_dump($_FILES['picture']['type']);
            } else {
                echo 'Krasivo';
            }

            $filename = $_FILES['picture']['tmp_name'];
            $destination = $path . $_FILES['picture']['name'];

            echo $filename . "\n";
            echo $destination;

            if (move_uploaded_file($filename, $destination))
                echo 'Norm';
            else
                echo 'Ne Norm';

            $post = new Post();
            $post->setPhoto($destination);
            $post->setDescription($_REQUEST['description']);

            SitePostService::add($app, $post);
        }


        return $app->redirect('/');

    }


}

