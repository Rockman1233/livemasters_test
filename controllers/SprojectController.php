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
 * Контроллер страницы вывода сотрудников работающих над проектом
 */
class SprojectController extends Controller {
    
	/**
	 * @var str Тайтл
	 */
	const title = 'Сводка проектов';

	/**
     * Инициализация
     */
    public function actionIndex() {
        if($_POST['projectId']){
            $arrayOfProjects = MainList::findByDates(trim($_POST['projectId']), trim($_POST['dtBegin']), trim($_POST['dtEnd']) );
            $chosenProject = $arrayOfProjects[0]['projectName'];
        }
        $projects = MainList::showAll($sort=1);
        $workers = CompanyWorker::showAll();
        $roles = Role::showAll();
        $namesOfProjects = Project::showAll();
        echo self::$template->render(array(
            'title' => self::title,
            'workers' => $workers,
            'roles' => $roles,
            'namesOfProjects' => $namesOfProjects,
            'projects' => $projects,
            'deals' => $arrayOfProjects,
            'TheProject' => $chosenProject
        ));

    }


};
