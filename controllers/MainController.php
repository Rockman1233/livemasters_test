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




class MainController extends Controller {


    public function actionIndex()
    {

        $title = 'CRUD интерфейс управления проектами';
        $projects = MainList::showAll();
        $workers = CompanyWorker::showAll();
        $roles = Role::showAll();
        $namesOfProjects = Project::showAll();
        $marker = 0;
        echo self::$template->render(array(
            'title' => $title,
            'projects' => $projects,
            'workers' => $workers,
            'roles' => $roles,
            'marker' => $marker,
            'namesOfProjects' => $namesOfProjects
        ));
        if($_POST){
            $mainListModel = MainList::findById($_POST['id']);
            $this->niceLook($_POST);
        }

    }

    public function actionEdit()
    {
        $title = 'Управление моделями';
        $workers = CompanyWorker::showAll();
        $roles = Role::showAll();
        $namesOfProjects = Project::showAll();
        $marker = 1;
        echo self::$template->render(array(
            'title' => $title,
            'workers' => $workers,
            'roles' => $roles,
            'marker' => $marker,
            'namesOfProjects' => $namesOfProjects
        ));
    }


}
