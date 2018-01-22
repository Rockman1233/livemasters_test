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

    static public $error;

    public function actionIndex()
    {
        $title = 'CRUD интерфейс управления проектами';
        $projects = MainList::showAll();
        $workers = CompanyWorker::showAll();
        $roles = Role::showAll();
        $namesOfProjects = Project::showAll();
        echo self::$template->render(array(
            'error' => self::$error,
            'title' => $title,
            'projects' => $projects,
            'workers' => $workers,
            'roles' => $roles,
            'namesOfProjects' => $namesOfProjects
        ));
        //может быть критичный момент с ПОСТОМ из других контроллеров
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

    public function actionDeleteline(){
        MainList::delete($_POST['delete_line_with_id']);
    }

    public function actionAddnew(){
        $NewListModel = new MainList();
        $className = 'MainList';
        //set POsT parametrs to model
        foreach ($_POST as $param_name => $param_value)
        {
            if (property_exists($className, $param_name ))
                if ($param_value == null)
                {
                    return self::$error == 'Введите все поля';
                }
                else {
                    $NewListModel->$param_name = $param_value;
                }

        }
        return $NewListModel->saveMainList();
    }


}
