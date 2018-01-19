<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 13:51
 */

include_once('Controller.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/models/Project.php');




class MainController extends Controller {


    public function actionIndex()
    {

        $template = self::$twig->loadTemplate('index.php');
        $title = 'CRUD интерфейс';
        $projects = Project::showAll();


        echo $template->render(array(
            'title' => $title,
            'projects' => $projects
        ));
    }


}
