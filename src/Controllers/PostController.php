<?php

namespace Danil\Controllers;

use Danil;
use Danil\Application;
use Danil\Model\Post;
use Danil\Service\SitePostService;
use Danil\SimpleImage;


class PostController{

    public static function createPostGet(Application $app) {
        return $app['twig']->render('postcreate.twig.html');
    }

    public static function createPostPost(Application $app) {

        $types = array('image/gif', 'image/png', 'image/jpeg');


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!in_array($_FILES['picture']['type'], $types)) {
                echo '<script type="text/javascript">alert("Incorrect type of file"); location="/post/create"</script>';
            } else {
                $string = file_get_contents(ROOT.'/../sizes.json');
                $objSizes=json_decode($string, true);

                $sizeType = $_POST['sizeType'];


                if ($sizeType === '2') {
                    $widthJson = $objSizes['width'][0];
                    $heightJson = $objSizes['height'][0];
                } elseif ($sizeType === '3') {
                    $widthJson = $objSizes['width'][1];
                    $heightJson = $objSizes['height'][1];
                }


                $filename = $_FILES['picture']['tmp_name'];

                $image = new SimpleImage();
                $image->load($filename);


                if ($widthJson !== null && $heightJson !== null) {

                    if ($image->getWidth() > $image->getHeight()){
                        $image->resizeToWidth($widthJson);
                    } else {
                        $image->resizeToHeight($heightJson);
                    }

                }


                if (exif_imagetype($filename) === IMAGETYPE_JPEG) {
                    $imageName = uniqid("",false).'.jpeg';

                } elseif (exif_imagetype($filename) === IMAGETYPE_GIF) {
                    $imageName = uniqid("",false).'.gif';

                } elseif (exif_imagetype($filename) === IMAGETYPE_PNG) {
                    $imageName = uniqid("",false).'.png';

                }

                $image->save(ROOT.UPLOAD_PATH.$imageName);


                $post = new Post();
                $post->setPhoto(UPLOAD_PATH.$imageName);
                $post->setDescription($_REQUEST['description']);

                SitePostService::add($app, $post);

                return $app->redirect('/');

            }

        }

    }

}

