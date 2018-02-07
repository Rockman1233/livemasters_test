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




class WprojectController extends Controller {

    /**
     * Инициализация
     */
    
    public function actionIndex() {
        if($_POST['worker_id']) {
            $arrayOfProjects = MainList::findByDatesForWorker(trim($_POST['worker_id']),trim($_POST['dt_begin']),trim($_POST['dt_end']) );
            $generalProjects = [];
            foreach ($arrayOfProjects as $project) {
                array_push($generalProjects, $project['project_id']);
            }
            $genaralProjectsString = implode(' OR project_id = ', $generalProjects);
            $usersWithSimilarTasks = MainList::findByDatesInCollaboration(trim($_POST['worker_id']), $genaralProjectsString, trim($_POST['dt_begin']), trim($_POST['dt_end']));
            $chosenWorker = $arrayOfProjects[0]['worker_lastname'];
        }
        $title = 'Сводка сотрудников';
        $workers = CompanyWorker::showAll();
        $roles = Role::showAll();
        $namesOfProjects = Project::showAll();
        $base_url = $GLOBALS['base_dir'];
        echo self::$template->render(array(
            'url' => $base_url,
            'title' => $title,
            'workers' => $workers,
            'roles' => $roles,
            'namesOfProjects' => $namesOfProjects,
            'deals' => $arrayOfProjects,
            'TheWorker' => $chosenWorker,
            'WorkWith' => $usersWithSimilarTasks
        ));

    }

};
