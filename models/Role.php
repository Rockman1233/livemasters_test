<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 11:57
 */
include_once 'ClassesExt.php';

class Role extends Object {
    public $roleId;
    public $roleName;
    
    /**
     * Создать новую должноссть (роль)
     * @return boolean 
     */
    public function saveRole() {
        $prepare = self::$db->prepare(
            'INSERT INTO exam_roles (role_name) VALUES (:name)');
        return $prepare->execute(
            array('name' => $this->roleName
            ));
    }
    
    /**
     * Показать все должности
     * @return array все должности
     */
    static function showAll() {
            $oQuery = Object::$db->query('SELECT exam_roles.role_id, exam_roles.role_name FROM exam_roles');
            return $oQuery->fetchAll(PDO::FETCH_ASSOC);
        }
        
    /**
     * Сменить название должности
     * @return boolean
     */
    public function changeName() {
        $prepare = self::$db->prepare(
            'UPDATE exam_roles 
             SET role_name =:name
             WHERE role_id =:id');
        return $prepare->execute(array('name' => $this->roleName, 'id' => $this->roleId));
    }
    
    /**
     * Найти должность по ID
     * @param int $id ID роли
     * @return obj роль
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
     * @param int $id ID роли   
     * @return boolean  
     */
    static function delete($id) {
        $prepare = self::$db->prepare(
            'DELETE FROM exam_roles WHERE role_id  = :id');
        return $prepare->execute(array('id' => $id));
    }
}
