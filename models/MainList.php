<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 11:57
 */
include_once 'ClassesExt.php';

class MainList extends Object {

    public $ep_id;
    public $project_id;
    public $worker_id;
    public $role_id;
    public $dt_begin;
    public $dt_end;


    static function TableName()
    {
        return 'exam_projects_workers';
    }


    public function saveMainList()
    {
        /*
        echo '<pre>';
        echo $this->projecct_id;
        echo '</pre>';
        */
        $prepare = self::$db->prepare(
            'INSERT INTO exam_projects_workers 
                       (project_id, worker_id, role_id, dt_begin, dt_end) 
                       VALUES 
                       (:proj_id,:worker_id,:role_id,:dt_begin,:dt_end)');


        $prepare->execute(
            array('proj_id' => $this->project_id,
                  'worker_id' => $this->worker_id,
                  'role_id' => $this->role_id,
                  'dt_begin' => $this->dt_begin,
                  'dt_end' => $this->dt_end
            ));
    }


    static function showAll()
        {
            //pagination (turn-off)
            /*
            $page = intval($page);
            $count = MainList::SHOW_DEFAULT;
            $offset = $count * ($page - 1);
            */
            $oQuery = Object::$db->query('SELECT exam_workers.worker_lastname, exam_workers.worker_id, 
                                                           exam_projects.project_name, exam_projects.project_id, 
                                                           exam_roles.role_name, exam_roles.role_id, 
                                                           exam_projects_workers.dt_begin, exam_projects_workers.dt_end, 
                                                           exam_projects_workers.ep_id
                                                    FROM `exam_projects_workers` 
                                                    JOIN exam_workers ON exam_projects_workers.worker_id = exam_workers.worker_id 
                                                    JOIN exam_projects ON exam_projects.project_id = exam_projects_workers.project_id 
                                                    JOIN exam_roles ON exam_roles.role_id = exam_projects_workers.role_id');
            return $oQuery->fetchAll(PDO::FETCH_ASSOC);
        }


    public function saveChanges()
    {
        $prepare = self::$db->prepare(
            'UPDATE exam_projects_workers 
                       SET project_id = :proj_id, worker_id = :worker_id, role_id = :role_id, dt_begin = :dt_begin, dt_end = :dt_end
                       WHERE ep_id = :ep_id');

        $prepare->execute(
            array('ep_id' => $this->ep_id,
                'proj_id' => $this->project_id,
                'worker_id' => $this->worker_id,
                'role_id' => $this->role_id,
                'dt_begin' => $this->dt_begin,
                'dt_end' => $this->dt_end
            ));
    }

    static function delete($id) {
        $prepare = self::$db->prepare(
            'DELETE FROM exam_projects_workers 
                       WHERE ep_id  = :ep_id');
        $prepare->execute(array('ep_id' => $id));

    }

    public static function findById($id){

        $class = get_called_class();
        /** @var Object $class */
        $oQuery = Object::$db->prepare("SELECT * FROM exam_projects_workers WHERE ep_id=:need_id");
        $oQuery->execute(['need_id' => $id]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);

        return $aRes? new $class($aRes):null;
    }

}
