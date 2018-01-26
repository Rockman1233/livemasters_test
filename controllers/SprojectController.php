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
        $title = 'Сводка проектов';
        $projects = MainList::showAll($sort=1);
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
            'projects' => $projects
        ));

    }


};
