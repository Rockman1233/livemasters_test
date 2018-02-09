<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 13:51
 */

require_once('Controller.php');
require_once('./models/Project.php');
require_once('./models/MainList.php');
require_once('./models/CompanyWorker.php');
require_once('./models/Role.php');

/**
 * Контроллер редактирования моделей
 */
class EditController extends Controller {
	
	/**
	 * @var str Тайтл
	 */
	const title = 'Управление моделями';
    
    /**
     * Инициализация
     */    
    public function actionIndex() {
        $workers = CompanyWorker::showAll();
        $roles = Role::showAll();
        $namesOfProjects = Project::showAll();
        echo self::$template->render([
            'title' => self::title,
            'workers' => $workers,
            'roles' => $roles,
            'namesOfProjects' => $namesOfProjects
        ]);
    }
    
    /**
     * Сменить имя проекта
     * @return boolean
     */
    public function actionEditProjectName() {
        if (empty($_POST['projectName']) && empty($_POST['delete'])) {
			return false;
		}
		
		$ChangingModel = new Project();
		if(($_POST['projectId'] == 0)&&($_POST['projectName'])) {
			$ChangingModel->projectName = strip_tags($_POST['projectName']);
			return $ChangingModel->saveProject();
		}
		//удаление?
		if ($_POST['delete']) {
			return Project::delete(strip_tags($_POST['projectId']));
		}
		//установить POsT параметры в модель
		foreach ($_POST as $paramName => $paramValue) {
			if (property_exists('Project', $paramName) && (isset($paramName)) && ($paramValue)) {
				$ChangingModel->$paramName = strip_tags($paramValue);
			}
		}
		$ChangingModel->changeName();
        
    }
    
    /**
     * Сменить имя работника
     * @return boolean
     */
    public function actionEditProjectWorker() {
        if (!empty($_POST['workerLastname']) or !empty($_POST['delete2'])) {
            $ChangingModel = new CompanyWorker();
            if(($_POST['workerId'] == 0) && ($_POST['workerLastname'])){
                $ChangingModel->workerLastname = strip_tags($_POST['workerLastname']);
                return $ChangingModel->saveWorker();
            }
            //удаление?
            if ($_POST['delete2']) {
                return CompanyWorker::delete(strip_tags($_POST['workerId']));
            }
            //установить POsT параметры в модель
            foreach ($_POST as $paramName => $paramValue) {
                if (property_exists('CompanyWorker', $paramName) && isset($paramName) && $paramValue) {
                    $ChangingModel->$paramName = strip_tags($paramValue);
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
            if(($_POST['roleId'] == 0) && ($_POST['roleName'])){
                $ChangingModel->roleName = strip_tags($_POST['roleName']);
                return $ChangingModel->saveRole();
            }
            //удаление?
            if ($_POST['delete3']) {
                return Role::delete($_POST['roleId']);
            }
            //установить POsT параметры в модель
            foreach ($_POST as $paramName => $paramValue) {
                if (property_exists('Role', $paramName) && (isset($paramName)) && ($paramValue)) {
                    $ChangingModel->$paramName = strip_tags($paramValue);
                }
            }
            $ChangingModel->changeName();
        }
        return false;
    }
};
