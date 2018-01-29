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




class SprojectController extends Controller
{


    public function actionIndex()
    {
        if($_POST){
            $arrayOfProjects = MainList::findByDates(trim($_POST['project_id']),trim($_POST['dt_begin']),trim($_POST['dt_end']) );
            $chosenProject = $arrayOfProjects[0]['project_name'];
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
    public function sameNameAndRole($array){

    }


};
