<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 11:57
 */
include_once 'ClassesExt.php';

class Role extends Object {

    public $role_id;
    public $role_name;


    static function TableName()
    {
        return 'exam_roles';
    }


    public function saverole()
    {
        echo '<pre>';
        echo $this->projecct_id;
        echo '</pre>';
        $prepare = self::$db->prepare(
            'INSERT INTO exam_roles 
                        (role_name 
                        ) 
                        VALUES 
                        (:name)');


        $prepare->execute(
            array('name' => $this->role_name
            ));
    }


    static function showAll()
        {
            //pagination (turn-off)
            /*
            $page = intval($page);
            $count = role::SHOW_DEFAULT;
            $offset = $count * ($page - 1);
            */
            $oQuery = Object::$db->query('SELECT * FROM `exam_roles`');
            return $oQuery->fetchAll(PDO::FETCH_ASSOC);
        }

    public function changeName() {

        $prepare = self::$db->prepare(
            'UPDATE exam_roles SET
                        name  ='.$this->role_name.'
                        WHERE
                        contract_id='.$this->role_id);

        $prepare->execute();

    }

    public static function findById($id){

        /** @var Object $class */
        $class = get_called_class();

        $oQuery = Object::$db->prepare("SELECT * FROM exam_roles WHERE role_id=:need_id");
        $oQuery->execute(['need_id' => $id]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);
        return $aRes? new $class($aRes):null;
    }

    public function delete($id) {

        $prepare = self::$db->prepare(
            'DELETE FROM exam_roles WHERE role_id  ='.$id);
        return $prepare->execute();

    }

}
