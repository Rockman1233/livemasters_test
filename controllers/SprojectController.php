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




class SprojectController extends Controller {
    
    /**
     * Инициализация
     */
    public function actionIndex() {
        if($_POST['projectId']){
            $arrayOfProjects = MainList::findByDates(trim($_POST['projectId']),trim($_POST['dtBegin']),trim($_POST['dtEnd']) );
            $chosenProject = $arrayOfProjects[0]['projectName'];
        }
        $title = 'Сводка проектов';
        $projects = MainList::showAll($sort=1);
        $workers = CompanyWorker::showAll();
        $roles = Role::showAll();
        $namesOfProjects = Project::showAll();
        echo self::$template->render(array(
            'title' => $title,
            'workers' => $workers,
            'roles' => $roles,
            'namesOfProjects' => $namesOfProjects,
            'projects' => $projects,
            'deals' => $arrayOfProjects,
            'TheProject' => $chosenProject
        ));

    }


};
