<?php

namespace Danil\Controllers;

use Danil;
use Danil\Application;
use Symfony\Component\HttpFoundation\Request;
use Danil\Model\Post;
use Danil\Service\SitePostService;
use Danil\Common\Common;
use Danil\SimpleImage;


class PostController{

    public static function createPostGet(Application $app) {
        return $app['twig']->render('postcreate.twig.html');
    }

    public static function createPostPost(Application $app) {

        $types = array('image/gif', 'image/png', 'image/jpeg');


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!in_array($_FILES['picture']['type'], $types)) {
                ?>
                <script>
                    alert("oshbka");
                </script>
                <?php
                echo 'Запрещённый тип файла';
//                var_dump($_FILES['picture']['type']);
            } else {
                echo "Normik        ";
            }

            $string = file_get_contents(ROOT.'/../sizes.json');
            $objSizes=json_decode($string, true);

            $sizeType = $_POST['sizeType'];

//            echo 'solnce'. $Solnce;

            if ($sizeType === '1') {
              //
            } elseif ($sizeType === '2') {
                $widthJson = $objSizes['width'][0];
            } elseif ($sizeType === '3') {
                $widthJson = $objSizes['width'][1];
            } else {
                $widthJson = null;
            }



            $filename = $_FILES['picture']['tmp_name'];
            $file = $_FILES['picture'];
//            $destination = $path . $_FILES['picture']['name'];

            $image = new SimpleImage();
            $image->load($filename);



            if ($widthJson !== null) {

            $image->resizeToWidth($widthJson);

            }

            //$nazvanie = $_FIles pictire name ----> substring .

            echo $filename;
            echo exif_imagetype($filename);

            if (exif_imagetype($filename) === IMAGETYPE_JPEG) {
                $imageName = ROOT.UPLOAD_PATH.uniqid("",false).'.jpeg';

            } elseif (exif_imagetype($filename) === IMAGETYPE_GIF) {
                $imageName = ROOT.UPLOAD_PATH.uniqid("",false).'.gif';

            } elseif (exif_imagetype($filename) === IMAGETYPE_PNG) {
                $imageName = ROOT.UPLOAD_PATH.uniqid("",false).'.png';

            }

            $image->save($imageName);


//          if (move_uploaded_file('$_FILES[picture][type]', ROOT.UPLOAD_PATH.$imageName)) {
//            $post = new Post();
//            $post->setPhoto(UPLOAD_PATH.$imageName);
//            $post->setDescription($_REQUEST['description']);
//
//            SitePostService::add($app, $post);
//
//            return $app->redirect('/');
//          } else {
//            echo "Error";
//            return 'hui';
//          }
            return '';
        }

    }

}

