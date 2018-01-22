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




class EditController extends Controller
{


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

    public function actionEditprojectname()
    {
        if ($_POST) {
            $ChangingModel = Project::findById($_POST['project_id']);
            $className = 'Project';
            if(($_POST['project_id'] == 0)&&($_POST['project_name'])){
                $NewModel = new Project();
                $NewModel->project_name = $_POST['project_name'];
                return $NewModel->saveProject();
            }
            //for deleting?
            if ($_POST['delete']) {
                return Project::delete($ChangingModel->project_id);
            }
            //set POsT parameters to model
            foreach ($_POST as $param_name => $param_value) {
                if (property_exists($className, $param_name) && (isset($param_name)) && ($param_value)) {
                    $ChangingModel->$param_name = $param_value;
                }
            }
            $ChangingModel->changeName();
        }
    }

    public function actionEditprojectworker()
    {
        if ($_POST) {
            $ChangingModel = CompanyWorker::findById($_POST['worker_id']);
            $className = 'CompanyWorker';
            if(($_POST['worker_id'] == 0)&&($_POST['project_lastname'])){
                $NewModel = new CompanyWorker();
                $NewModel->project_name = $_POST['worker_lastname'];
                return $NewModel->saveProject();
            }
            //for deleting?
            if ($_POST['delete']) {
                return CompanyWorker::delete($ChangingModel->worker_id);
            }
            //set POsT parameters to model
            foreach ($_POST as $param_name => $param_value) {
                if (property_exists($className, $param_name) && (isset($param_name)) && ($param_value)) {
                    $ChangingModel->$param_name = $param_value;
                }
            }
            $ChangingModel->changeName();
        }
    }

    public function actionEditprojectrole()
    {
        if ($_POST) {
            $ChangingModel = Role::findById($_POST['role_id']);
            $className = 'Role';
            if(($_POST['role_id'] == 0)&&($_POST['role_name'])){
                $NewModel = new Role();
                $NewModel->role_name = $_POST['role_name'];
                return $NewModel->saveRole();
            }
            //for deleting?
            if ($_POST['delete3']) {
                return Role::delete($ChangingModel->role_id);
            }
            //set POsT parameters to model
            foreach ($_POST as $param_name => $param_value) {
                if (property_exists($className, $param_name) && (isset($param_name)) && ($param_value)) {
                    $ChangingModel->$param_name = $param_value;
                }
            }
            $ChangingModel->changeName();
        }
    }
};
