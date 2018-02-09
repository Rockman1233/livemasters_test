<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 11:57
 */
require_once 'ClassesExt.php';

/**
 * Модель проекта
 */
class Project extends Object {
	
	/** $projectId - ID проекта*/
    public $projectId;
	/** $projectName - Имя проекта*/
    public $projectName;

    /**
     * Создать проект
     * @return boolean
     */
    public function saveProject() {
        $prepare = self::$db->prepare('INSERT INTO exam_projects (project_name) VALUES (:name)');

        return $prepare->execute(['name' => $this->projectName]);
    }
    
    /**
     * Показать все проекты
     * @return array все проекты
     */
    static function showAll() {
        $oQuery = Object::$db->query('SELECT exam_projects.project_id, exam_projects.project_name FROM `exam_projects`');
        return $oQuery->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Сменить имя проекта
     * @return bolean
     */
    public function changeName() {
        $prepare = self::$db->prepare(
            'UPDATE exam_projects 
             SET project_name =:name
             WHERE project_id =:id');
        return $prepare->execute(['name' => $this->projectName, 'id' => $this->projectId]);

    }
    
    /**
     * Найти проект по ID
     * @param int $id ID проекта
     * @return obj проект
     */
    public static function findById($id) {
        /** @var Object $class */
        $class = get_called_class();
        $oQuery = Object::$db->prepare('SELECT exam_projects.project_id, exam_projects.project_name FROM exam_projects WHERE project_id=:need_id');
        $oQuery->execute(['need_id' => $id]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);
        return $aRes? new $class($aRes):null;
    }
    
    /**
     * Удалить проект по ID
     * @param int $id ID проекта
     * @return boolean
     */
    static function delete($id) {
        $prepare = self::$db->prepare('DELETE FROM exam_projects WHERE project_id = :id');
        return $prepare->execute(['id' => $id]);

    }

}
