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
    
    /**
     * Создать новую должноссть (ролЬ)
     */

    public function saveRole() {
        $prepare = self::$db->prepare(
            'INSERT INTO exam_roles (role_name) VALUES (:name)');
        $prepare->execute(
            array('name' => $this->role_name
            ));
    }
    
    /**
     * Показать все должности
     */

    static function showAll() {
            $oQuery = Object::$db->query('SELECT exam_roles.role_id, exam_roles.role_name FROM exam_roles');
            return $oQuery->fetchAll(PDO::FETCH_ASSOC);
        }
        
    /**
     * Сменить название должности
     */    

    public function changeName() {
        $prepare = self::$db->prepare(
            'UPDATE exam_roles 
             SET role_name =:name
             WHERE role_id =:id');
        return $prepare->execute(array('name' => $this->role_name, 'id' => $this->role_id));
    }
    
    /**
     * Найти должность по ID
     */
    
    public static function findById($id) {
        /** @var Object $class */
        $class = get_called_class();
        $oQuery = Object::$db->prepare("SELECT exam_roles.role_id, exam_roles.role_name FROM exam_roles WHERE role_id=:need_id");
        $oQuery->execute(['need_id' => $id]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);
        return $aRes? new $class($aRes):null;
    }
    
    /**
     * Удалить должность по ID
     */

    static function delete($id) {
        $prepare = self::$db->prepare(
            'DELETE FROM exam_roles WHERE role_id  = :id');
        return $prepare->execute(array('id' => $id));
    }
}
