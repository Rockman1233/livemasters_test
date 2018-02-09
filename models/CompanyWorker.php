<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 11:57
 */
require_once 'ClassesExt.php';

/**
 * Модель сотрудника
 */
class CompanyWorker extends Object {
	
	/** $workerId - ID работника*/
    public $workerId;
	/** $workerLastname - имя работника*/
    public $workerLastname;

    /**
     * Сохранить работника
     * @return boolean
     */
    public function saveworker() {
        $prepare = self::$db->prepare('INSERT INTO exam_workers (worker_lastname) VALUES (:name)');
        return $prepare->execute(
            array('name' => $this->workerLastname
            ));
    }

    /**
     * Показать всех сотрудников
     * @return array Все сотрудники
     */
    static function showAll() {
            $oQuery = Object::$db->query('SELECT exam_workers.worker_id, exam_workers.worker_lastname FROM `exam_workers`');
            return $oQuery->fetchAll(PDO::FETCH_ASSOC);
    }
        
    /**
     * Поменять имя текущего сотрудника
     * @return boolean
     */
    public function changeName() {
        $prepare = self::$db->prepare('UPDATE exam_workers SET worker_lastname =:name WHERE worker_id =:id');
        return $prepare->execute(['name' => $this->workerLastname, 'id' => $this->workerId]);
    }
    
    /**
     * Найти сотрудника по ID
     * @param integer $id ID сотрудника
     */
    public static function findById($id) {

        /** @var Object $class */
        $class = get_called_class();
        $oQuery = Object::$db->prepare('SELECT exam_workers.worker_id, exam_workers.worker_lastname FROM exam_workers WHERE worker_id=:need_id');
        $oQuery->execute(['need_id' => $id]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);
        return $aRes? new $class($aRes):null;
    }
    
    /**
     * Удалить сотрудника по ID
     * @param integer $id ID сотрудника
     */
    static function delete($id) {
        $prepare = self::$db->prepare('DELETE FROM exam_workers WHERE worker_id  = :id');
        return $prepare->execute(['id' => $id]);
    }

}
