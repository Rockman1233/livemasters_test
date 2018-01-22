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


    public function saveRole()
    {
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
            $oQuery = Object::$db->query('SELECT * FROM `exam_roles`');
            return $oQuery->fetchAll(PDO::FETCH_ASSOC);
        }

    public function changeName() {

        $prepare = self::$db->prepare(
            'UPDATE exam_roles SET
                        role_name =:name
                        WHERE
                        role_id =:id');

        $prepare->execute(array('name' => $this->role_name, 'id' => $this->role_id));

    }

    public static function findById($id){

        /** @var Object $class */
        $class = get_called_class();
        $oQuery = Object::$db->prepare("SELECT * FROM exam_roles WHERE role_id=:need_id");
        $oQuery->execute(['need_id' => $id]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);
        return $aRes? new $class($aRes):null;
    }

    static function delete($id) {
        $prepare = self::$db->prepare(
            'DELETE FROM exam_roles WHERE role_id  = :id');
        return $prepare->execute(array('id' => $id));

    }


}
