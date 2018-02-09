<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 11:57
 */
require_once 'ClassesExt.php';

/**
 * Модель записи задания
 */
class MainList extends Object {

	/** $epId int - ID записи */
    public $epId;
	/** $projectId - ID проекта*/
    public $projectId;
	/** $workerId - ID работника*/
    public $workerId;
	/** $roleId - ID должности*/
    public $roleId;
	/** $dtBegin - Дата начала работы*/
    public $dtBegin;
	/** $dtEnd - Дата окончания работы*/
    public $dtEnd;


   /**
    * Сохранить в БД 
    */
    public function saveMainList() {
        $prepare = self::$db->prepare(
            'INSERT INTO exam_projects_workers 
             (project_id, worker_id, role_id, dt_begin, dt_end) 
             VALUES 
             (:proj_id,:worker_id,:role_id,:dt_begin,:dt_end)');


        $prepare->execute(
            ['proj_id' => $this->projectId,
             'worker_id' => $this->workerId,
             'role_id' => $this->roleId,
             'dt_begin' => $this->dtBegin,
             'dt_end' => $this->dtEnd
            ]);
    }
    
    /**
     * Выгрузить список всех записей из БД 
     * @param int $sortType индекс сортировки
     */
    static function showAll($sortType) {
            //тип сортировки
            $model = 'ep_id';
            if($sortType == 1){ $model = 'ep_id';}
            if($sortType == 2){ $model = 'project_name';}
            if($sortType == 3){ $model = 'worker_lastname';}
            if($sortType == 4){ $model = 'role_name';}

            $oQuery = Object::$db->query('SELECT exam_workers.worker_lastname, exam_workers.worker_id, 
                                                 exam_projects.project_name, exam_projects.project_id, 
                                                 exam_roles.role_name, exam_roles.role_id, 
                                                 exam_projects_workers.dt_begin, exam_projects_workers.dt_end, 
                                                 exam_projects_workers.ep_id
                                          FROM `exam_projects_workers` 
                                          JOIN exam_workers ON exam_projects_workers.worker_id = exam_workers.worker_id 
                                          JOIN exam_projects ON exam_projects.project_id = exam_projects_workers.project_id 
                                          JOIN exam_roles ON exam_roles.role_id = exam_projects_workers.role_id
                                          ORDER BY '.$model);
            return $oQuery->fetchAll(PDO::FETCH_ASSOC);
    }
        
    /**
     * Сохранить изменения в текущей записи 
     */
    public function saveChanges() {
        $prepare = self::$db->prepare(
            'UPDATE exam_projects_workers 
             SET project_id = :proj_id, worker_id = :worker_id, role_id = :role_id, dt_begin = :dt_begin, dt_end = :dt_end
             WHERE ep_id = :ep_id');

        return !$prepare->execute(
            ['ep_id' => $this->epId,
             'proj_id' => $this->projectId,
             'worker_id' => $this->workerId,
             'role_id' => $this->roleId,
             'dt_begin' => $this->dtBegin,
             'dt_end' => $this->dtEnd
            ]);
    }
    
    /**
     * Удалить запись по ID
     * 
     * @param int $id - id записи
     */
    static function delete($id) {
        $prepare = self::$db->prepare(
            'DELETE FROM exam_projects_workers WHERE ep_id  = :ep_id');
        $prepare->execute(array('ep_id' => $id));

    }
    
    /**
     * Найти запись по ID
     * @param int $id - id записи
     */
    public static function findById($id) {
        $class = get_called_class();
        /** @var Object $class */
        $oQuery = Object::$db->prepare("SELECT * FROM exam_projects_workers WHERE ep_id=:need_id");
        $oQuery->execute(['need_id' => $id]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);

        return $aRes? new $class($aRes):null;
    }
    
    
    /**
     * Найти записи проекта в заданном промежутке дат
     * @param int $project - ID проекта
     * @param int $start - Дата начала проекта
     * @param int $end - Дата окончания проекта
     */
    public static function findByDates($project, $start, $end) {
        $oQuery = Object::$db->prepare("SELECT exam_workers.worker_lastname, 
                                               exam_workers.worker_id, 
                                               exam_projects.project_name, exam_projects.project_id, 
                                               exam_roles.role_name, exam_roles.role_id, 
                                               exam_projects_workers.dt_begin, exam_projects_workers.dt_end, 
                                               exam_projects_workers.ep_id
                                       FROM `exam_projects_workers` 
                                       JOIN exam_workers ON exam_projects_workers.worker_id = exam_workers.worker_id 
                                       JOIN exam_projects ON exam_projects.project_id = exam_projects_workers.project_id 
                                       JOIN exam_roles ON exam_roles.role_id = exam_projects_workers.role_id 
                                       WHERE exam_projects_workers.project_id=:need_project 
                                       AND exam_projects_workers.dt_begin >=:date_begin 
                                       AND exam_projects_workers.dt_end <=:date_end
                                       ORDER BY exam_projects_workers.dt_begin");
        $oQuery->execute(['need_project' => $project,
                          'date_begin' => $start,
                          'date_end' => $end
        ]);
        
        return $oQuery->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Найти сотрудников которые работали вместе с текущим пользователем в заданный промежуток времени
     * @param int $currentUser - ID сотдруника
     * @param int $projects - ID-ки проектов
     * @param int $start - Дата начала проекта
     * @param int $end - Дата окончания проекта
     */
    public static function findByDatesInCollaboration($currentUser, $projects, $start, $end) {
        $projects = implode(', ', array_map('intval', $projects));
        
        $oQuery = Object::$db->prepare("SELECT exam_workers.worker_lastname, 
                                               exam_projects.project_name,
                                               exam_roles.role_name,  
                                               exam_projects_workers.dt_begin, exam_projects_workers.dt_end, exam_projects_workers.worker_id 
                                        FROM `exam_projects_workers` 
                                        JOIN exam_workers ON exam_projects_workers.worker_id = exam_workers.worker_id 
                                        JOIN exam_projects ON exam_projects.project_id = exam_projects_workers.project_id 
                                        JOIN exam_roles ON exam_roles.role_id = exam_projects_workers.role_id 
                                        WHERE exam_projects_workers.project_id IN ($projects)
                                        AND exam_projects_workers.worker_id!=:current_user
                                        AND exam_projects_workers.dt_begin >=:date_begin 
                                        AND exam_projects_workers.dt_end <=:date_end
                                        ORDER BY exam_projects_workers.dt_begin");
        
        $oQuery->execute([
            //'need_project' => $projects,
            'date_begin' => $start,
            'date_end' => $end,
            'current_user' => $currentUser
        ]);
        return $oQuery->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Найти проекты сотрудника в заданном промежутке дат
     * @param int $user - ID сотдруника
     * @param int $start - Дата начала проекта
     * @param int $end - Дата окончания проекта
     */
    public static function findByDatesForWorker($user, $start, $end) {
        $oQuery = Object::$db->prepare('SELECT exam_workers.worker_lastname, exam_workers.worker_id, 
                                               exam_projects.project_name, exam_projects.project_id, 
                                               exam_roles.role_name, exam_roles.role_id, 
                                               exam_projects_workers.dt_begin, exam_projects_workers.dt_end, 
                                               exam_projects_workers.ep_id
                                        FROM `exam_projects_workers` 
                                        JOIN exam_workers ON exam_projects_workers.worker_id = exam_workers.worker_id 
                                        JOIN exam_projects ON exam_projects.project_id = exam_projects_workers.project_id 
                                        JOIN exam_roles ON exam_roles.role_id = exam_projects_workers.role_id 
                                        WHERE exam_projects_workers.worker_id=:need_user 
                                        AND exam_projects_workers.dt_begin >=:date_begin 
                                        AND exam_projects_workers.dt_end <=:date_end
                                        ORDER BY exam_projects_workers.dt_begin');
        $oQuery->execute(['need_user' => $user,
                          'date_begin' => $start,
                          'date_end' => $end
                         ]);

        return $oQuery->fetchAll(PDO::FETCH_ASSOC);
    }

}
