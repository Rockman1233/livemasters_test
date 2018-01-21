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
    public $worker_name;


    static function TableName()
    {
        return 'exam_workers';
    }


    public function saveworker()
    {
        echo '<pre>';
        echo $this->project_id;
        echo '</pre>';
        $prepare = self::$db->prepare(
            'INSERT INTO exam_workers 
                        (worker_name 
                        ) 
                        VALUES 
                        (:name)');


        $prepare->execute(
            array('name' => $this->worker_name
            ));
    }


    static function showAll()
        {
            $oQuery = Object::$db->query('SELECT * FROM `exam_workers`');
            return $oQuery->fetchAll(PDO::FETCH_ASSOC);
        }

    public function changeName() {

        $prepare = self::$db->prepare(
            'UPDATE exam_workers SET
                        status  ='.$this->status.'
                        WHERE
                        contract_id='.$this->worker_id);

        $prepare->execute();

    }

    public static function findById($id){

        /** @var Object $class */
        $class = get_called_class();

        $oQuery = Object::$db->prepare("SELECT * FROM exam_workers WHERE worker_id=:need_id");
        $oQuery->execute(['need_id' => $id]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);
        return $aRes? new $class($aRes):null;
    }

    public function delete($id) {

        $prepare = self::$db->prepare(
            'DELETE FROM exam_workers WHERE worker_id  ='.$id);
        $prepare->execute();

    }

}
