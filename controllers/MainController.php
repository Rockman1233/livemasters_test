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




class MainController extends Controller {
    
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
        $title = 'CRUD интерфейс управления проектами';
        $projects = MainList::showAll($sort);
        $workers = CompanyWorker::showAll();
        $roles = Role::showAll();
        $namesOfProjects = Project::showAll();
        $base_url = $_SERVER['REQUEST_URI'];
        echo self::$template->render(array(
            'url' => $base_url,
            'sort' => $sort,
            'error' => self::$error,
            'title' => $title,
            'projects' => $projects,
            'workers' => $workers,
            'roles' => $roles,
            'namesOfProjects' => $namesOfProjects
        ));
    }
    
    /**
     * Подтверждение изменений записи задания
     */
    public function actionSubmit() {
        $ChangingListModel = MainList::findById($_POST['epId']);
        //установить POsT параметры в модель
        foreach ($_POST as $param_name => $param_value) {
            if (property_exists('MainList', $param_name )&&(isset($param_name)))
                $ChangingListModel->$param_name = strip_tags($param_value);
        }
        $this->_toJson(['isError' => $ChangingListModel->saveChanges()]);
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
        foreach ($_POST as $param_name => $param_value) {
            if (property_exists($className, $param_name ))
                if ($param_value == null) {
                    return self::$error == 'Введите все поля';
                }
                else {
                    $NewListModel->$param_name = $param_value;
                }
        }
        return $NewListModel->saveMainList();
    }
}
