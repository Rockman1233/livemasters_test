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
        echo self::$template->render(array(
            'title' => $title,
            'projects' => $projects,
            'workers' => $workers,
            'roles' => $roles,
            'namesOfProjects' => $namesOfProjects
        ));
        if($_POST){
            $ChangingListModel = MainList::findById($_POST['ep_id']);
            $className = 'MainList';
            //set POsT parametrs to model
            foreach ($_POST as $param_name => $param_value){
                if (property_exists($className, $param_name )&&(isset($param_name)))
                    $ChangingListModel->$param_name = $param_value;
            }
            $ChangingListModel->saveChanges();
            Object::redirect('./projects');
        }

    }



    public function actionEdit()
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

    public function actionDeleteline(){
        MainList::delete($_POST['delete_line_with_id']);
    }


}
