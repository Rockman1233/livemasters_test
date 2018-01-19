<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 13:51
 */

include_once('Controller.php');

class MainController extends Controller {

    public $var = 123;

    public function actionIndex()
    {
        $loader = new Twig_Loader_Filesystem('views');
        //$twig = new Twig_Environment($loader, array('cache' => 'cache'));
        $twig = new Twig_Environment($loader);

        $template = $twig->loadTemplate('index.php');
        $title = 'Это новый тайтл';
        echo $template->render(array(
            'title' => $title
        ));
    }


}
