<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 13:51
 */

include_once('Controller.php');
include_once('./models/Project.php');
include_once('./models/MainList.php');
include_once('./models/CompanyWorker.php');
include_once('./models/Role.php');




class EditController extends Controller
{


    public function actionIndex()
    {

        $title = 'Управление моделями';
        $workers = CompanyWorker::showAll();
        $roles = Role::showAll();
        $namesOfProjects = Project::showAll();
        $base_url = $GLOBALS['base_dir'];
        echo self::$template->render(array(
            'url' => $base_url,
            'title' => $title,
            'workers' => $workers,
            'roles' => $roles,
            'namesOfProjects' => $namesOfProjects
        ));

    }

    public function actionEditprojectname()
    {
        if ($_POST) {
            $ChangingModel = Project::findById(strip_tags($_POST['project_id']));
            $className = 'Project';
            if(($_POST['project_id'] == 0)&&($_POST['project_name'])){
                $NewModel = new Project();
                $NewModel->project_name = strip_tags($_POST['project_name']);
                return $NewModel->saveProject();
            }
            //for deleting?
            if ($_POST['delete']) {
                return Project::delete($ChangingModel->project_id);
            }
            //set POsT parameters to model
            foreach ($_POST as $param_name => $param_value) {
                if (property_exists($className, $param_name) && (isset($param_name)) && ($param_value)) {
                    $ChangingModel->$param_name = strip_tags($param_value);
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
            if(($_POST['worker_id'] == 0)&&($_POST['worker_lastname'])){
                $NewModel = new CompanyWorker();
                $NewModel->worker_lastname = strip_tags($_POST['worker_lastname']);
                return $NewModel->saveWorker();
            }
            //for deleting?
            if ($_POST['delete']) {
                return CompanyWorker::delete(strip_tags($ChangingModel->worker_id));
            }
            //set POsT parameters to model
            foreach ($_POST as $param_name => $param_value) {
                if (property_exists($className, $param_name) && (isset($param_name)) && ($param_value)) {
                    $ChangingModel->$param_name = strip_tags($param_value);
                }
            }
            $ChangingModel->changeName();
        }
    }

    public function actionEditprojectrole()
    {
        if ($_POST) {
            $ChangingModel = Role::findById(strip_tags($_POST['role_id']));
            $className = 'Role';
            if(($_POST['role_id'] == 0)&&($_POST['role_name'])){
                $NewModel = new Role();
                $NewModel->role_name = strip_tags($_POST['role_name']);
                return $NewModel->saveRole();
            }
            //for deleting?
            if ($_POST['delete3']) {
                return Role::delete(strip_tags($ChangingModel->role_id));
            }
            //set POsT parameters to model
            foreach ($_POST as $param_name => $param_value) {
                if (property_exists($className, $param_name) && (isset($param_name)) && ($param_value)) {
                    $ChangingModel->$param_name = strip_tags($param_value);
                }
            }
            $ChangingModel->changeName();
        }
    }
};
