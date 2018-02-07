<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 11:57
 */


include_once 'ClassesExt.php';

class CompanyWorker extends Object {

    public $worker_id;
    public $worker_lastname;

    /**
     * Сохранить работника
     */
    
    public function saveworker() {
        $prepare = self::$db->prepare(
            'INSERT INTO exam_workers 
                        (worker_lastname) 
                        VALUES 
                        (:name)');

        $prepare->execute(
            array('name' => $this->worker_lastname
            ));
    }

    /**
     * Показать всех сотружников
     */
    
    static function showAll() {
            $oQuery = Object::$db->query('SELECT exam_workers.worker_id, exam_workers.worker_lastname FROM `exam_workers`');
            return $oQuery->fetchAll(PDO::FETCH_ASSOC);
        }
        
    /**
     * Поменять имя текущего сотрудника
     */
        
    public function changeName() {

        $prepare = self::$db->prepare(
            'UPDATE exam_workers SET
                        worker_lastname =:name
                        WHERE
                        worker_id =:id');

        $prepare->execute(array('name' => $this->worker_lastname, 'id' => $this->worker_id));

    }
    
    /**
     * Найти сотрудника по ID
     */

    public static function findById($id) {

        /** @var Object $class */
        $class = get_called_class();

        $oQuery = Object::$db->prepare("SELECT exam_workers.worker_id, exam_workers.worker_lastname FROM exam_workers WHERE worker_id=:need_id");
        $oQuery->execute(['need_id' => $id]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);
        return $aRes? new $class($aRes):null;
    }
    
    /**
     * Удалить сотрудника по ID
     */

    static function delete($id)
    {
        $prepare = self::$db->prepare(
            'DELETE FROM exam_workers WHERE worker_id  = :id');
        return $prepare->execute(array('id' => $id));
    }

}
