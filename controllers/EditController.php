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




class EditController extends Controller {
    
    /**
     * Инициализация
     */    

    public function actionIndex() {

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
    
    /**
     * Сменить имя проекта
     */

    public function actionEditprojectname() {
        if ($_POST['project_id']) {
            $ChangingModel = Project::findById(strip_tags($_POST['project_id']));
            $className = 'Project';
            if(($_POST['project_id'] == 0)&&($_POST['project_name'])) {
                $NewModel = new Project();
                $NewModel->project_name = strip_tags($_POST['project_name']);
                return $NewModel->saveProject();
            }
            //удаление?
            if ($_POST['delete']) {
                return Project::delete($ChangingModel->project_id);
            }
            //установить POsT параметры в модель
            foreach ($_POST as $param_name => $param_value) {
                if (property_exists($className, $param_name) && (isset($param_name)) && ($param_value)) {
                    $ChangingModel->$param_name = strip_tags($param_value);
                }
            }
            $ChangingModel->changeName();
        }
    }
    
    /**
     * Сменить имя работника
     */

    public function actionEditprojectworker() {
        if ($_POST['worker_id']) {
            $ChangingModel = CompanyWorker::findById($_POST['worker_id']);
            $className = 'CompanyWorker';
            if(($_POST['worker_id'] == 0)&&($_POST['worker_lastname'])){
                $NewModel = new CompanyWorker();
                $NewModel->worker_lastname = strip_tags($_POST['worker_lastname']);
                return $NewModel->saveWorker();
            }
            //удаление?
            if ($_POST['delete']) {
                return CompanyWorker::delete(strip_tags($ChangingModel->worker_id));
            }
            //установить POsT параметры в модель
            foreach ($_POST as $param_name => $param_value) {
                if (property_exists($className, $param_name) && (isset($param_name)) && ($param_value)) {
                    $ChangingModel->$param_name = strip_tags($param_value);
                }
            }
            $ChangingModel->changeName();
        }
    }
    
    /**
     * Сменить название должности
     */

    public function actionEditprojectrole() {
        if ($_POST['role_id']&&$_POST['role_name']) {
            $ChangingModel = Role::findById(strip_tags($_POST['role_id']));
            $className = 'Role';
            if(($_POST['role_id'] == 0)&&($_POST['role_name'])){
                $NewModel = new Role();
                $NewModel->role_name = strip_tags($_POST['role_name']);
                return $NewModel->saveRole();
            }
            //удаление?
            if ($_POST['delete3']) {
                return Role::delete(strip_tags($ChangingModel->role_id));
            }
            //установить POsT параметры в модель
            foreach ($_POST as $param_name => $param_value) {
                if (property_exists($className, $param_name) && (isset($param_name)) && ($param_value)) {
                    $ChangingModel->$param_name = strip_tags($param_value);
                }
            }
            $ChangingModel->changeName();
        }
    }
};
