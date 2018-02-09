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
 * Контроллер главной страницы с записями
 */
class MainController extends Controller {
	
	/**
	 * @var str Тайтл
	 */
	const title = 'CRUD интерфейс управления проектами';
    
    /**
     * сообщение об ошибке
     * @var string 
     */
    static public $error;
    
    /**
     * Инициализация
     * @param integer $sort индекс сортировки
     */
    public function actionIndex($sort) {
        $projects = MainList::showAll($sort);
        $workers = CompanyWorker::showAll();
        $roles = Role::showAll();
        $namesOfProjects = Project::showAll();
        $base_url = $_SERVER['REQUEST_URI'];
        echo self::$template->render([
            'url' => $base_url,
            'sort' => $sort,
            'error' => self::$error,
            'title' => self::title,
            'projects' => $projects,
            'workers' => $workers,
            'roles' => $roles,
            'namesOfProjects' => $namesOfProjects
        ]);
    }
    
    /**
     * Подтверждение изменений записи задания
	 * @return str JSON
     */
    public function actionSubmit() {
        $ChangingListModel = MainList::findById($_POST['epId']);
        //установить POsT параметры в модель
        foreach ($_POST as $paramName => $paramValue) {
            if (property_exists('MainList', $paramName )&&(isset($paramName)))
                $ChangingListModel->$paramName = strip_tags($paramValue);
        }
        return $this->_toJson(['isError' => $ChangingListModel->saveChanges()]);
    }
    
    /**
     * Конвертация в JSON
     * @param array $value параметр для конвертации
     */
    private function _toJson($value) {
        echo json_encode($value);
        exit;
    }
    
    /**
     * Удаление записи
     * @return boolean
     */
    public function actionDeleteLine() {
        return MainList::delete($_POST['delete_line_with_id']);
    }
    
    /**
     * Добавить запись
     * @return boolean
     */
    public function actionAddNew() {
        $NewListModel = new MainList();
        $className = 'MainList';
        //установить POsT параметры в модель
        foreach ($_POST as $paramName => $paramValue) {
            if (property_exists($className, $paramName ))
                if ($paramValue == null) {
                    return self::$error == 'Введите все поля';
                } else {
                    $NewListModel->$paramName = $paramValue;
                }
        }
        return $NewListModel->saveMainList();
    }
}
