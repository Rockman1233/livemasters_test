<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 13:51
 */

include_once('Controller.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/models/Project.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/models/MainList.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/models/CompanyWorker.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/models/Role.php');




class EditController extends Controller {


    public function actionIndex()
    {

        $title = 'Управление моделями';
        $workers = CompanyWorker::showAll();
        $roles = Role::showAll();
        $namesOfProjects = Project::showAll();
        echo self::$template->render(array(
            'title' => $title,
            'workers' => $workers,
            'roles' => $roles,
            'namesOfProjects' => $namesOfProjects
        ));

    }
    
}
