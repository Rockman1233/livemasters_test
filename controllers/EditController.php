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
     * @return boolean Description
     */
    public function actionEditProjectName() {
        if (!empty($_POST['projectName']) or !empty($_POST['delete'])) {
            $ChangingModel = new Project();
            $className = 'Project';
            if(($_POST['projectId'] == 0)&&($_POST['projectName'])) {
                $ChangingModel->projectName = strip_tags($_POST['projectName']);
                return $ChangingModel->saveProject();
            }
            //удаление?
            if ($_POST['delete']) {
                return Project::delete(strip_tags($_POST['projectId']));
            }
            //установить POsT параметры в модель
            foreach ($_POST as $param_name => $param_value) {
                if (property_exists($className, $param_name) && (isset($param_name)) && ($param_value)) {
                    $ChangingModel->$param_name = strip_tags($param_value);
                }
            }
            $ChangingModel->changeName();
        }
        return false;
    }
    
    /**
     * Сменить имя работника
     * @return boolean
     */
    public function actionEditProjectWorker() {
        if (!empty($_POST['workerLastname']) or !empty($_POST['delete2'])) {
            $ChangingModel = new CompanyWorker();
            $className = 'CompanyWorker';
            if(($_POST['workerId'] == 0)&&($_POST['workerLastname'])){
                $ChangingModel->workerLastname = strip_tags($_POST['workerLastname']);
                return $ChangingModel->saveWorker();
            }
            //удаление?
            if ($_POST['delete2']) {
                return CompanyWorker::delete(strip_tags($_POST['workerId']));
            }
            //установить POsT параметры в модель
            foreach ($_POST as $param_name => $param_value) {
                if (property_exists($className, $param_name) && (isset($param_name)) && ($param_value)) {
                    $ChangingModel->$param_name = strip_tags($param_value);
                }
            }
            $ChangingModel->changeName();
        }
        return false;
    }
    
    /**
     * Сменить название должности
     * @return boolean 
     */
    public function actionEditProjectRole() {
        if (!empty($_POST['delete3']) or !empty($_POST['roleName'])) {
            $ChangingModel = new Role();
            if(($_POST['roleId'] == 0)&&($_POST['roleName'])){
                $ChangingModel->roleName = strip_tags($_POST['roleName']);
                return $ChangingModel->saveRole();
            }
            //удаление?
            if ($_POST['delete3']) {
                return Role::delete($_POST['roleId']);
            }
            //установить POsT параметры в модель
            foreach ($_POST as $param_name => $param_value) {
                if (property_exists('Role', $param_name) && (isset($param_name)) && ($param_value)) {
                    $ChangingModel->$param_name = strip_tags($param_value);
                }
            }
            $ChangingModel->changeName();
        }
        return false;
    }
};
