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
 * Контрллер страницы вывода проектов конкретного сотрыдника 
 */
class WprojectController extends Controller {
	
	/**
	 * @var str Тайтл
	 */
	const title = 'Сводка сотрудников';

    /**
     * Инициализация
     */
    public function actionIndex() {
        if($_POST['workerId']) {
            $arrayOfProjects = MainList::findByDatesForWorker(trim($_POST['workerId']), trim($_POST['dtBegin']), trim($_POST['dtEnd']));
            $generalProjects = [];
            foreach ($arrayOfProjects as $project) {
				$generalProjects[] = $project['project_id'];
            }
            $usersWithSimilarTasks = MainList::findByDatesInCollaboration(trim($_POST['workerId']), $generalProjects, trim($_POST['dtBegin']), trim($_POST['dtEnd']));
            $chosenWorker = $arrayOfProjects[0]['worker_lastname'];
        }
        $workers = CompanyWorker::showAll();
        $roles = Role::showAll();
        $namesOfProjects = Project::showAll();
        echo self::$template->render(array(
            'title' => self::title,
            'workers' => $workers,
            'roles' => $roles,
            'namesOfProjects' => $namesOfProjects,
            'deals' => $arrayOfProjects,
            'TheWorker' => $chosenWorker,
            'WorkWith' => $usersWithSimilarTasks
        ));

    }

};
