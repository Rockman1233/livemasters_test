<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 11:57
 */
include_once 'ClassesExt.php';

class Project extends Object {

    public $project_id;
    public $project_name;


    static function TableName()
    {
        return 'exam_projects';
    }


    public function saveProject()
    {
        $prepare = self::$db->prepare(
            'INSERT INTO exam_projects 
                        (project_name 
                        ) 
                        VALUES 
                        (:name)');

        $prepare->execute(
            array('name' => $this->project_name
            ));
    }


    static function showAll()
        {
            //pagination (turn-off)
            /*
            $page = intval($page);
            $count = Project::SHOW_DEFAULT;
            $offset = $count * ($page - 1);
            */
            $oQuery = Object::$db->query('SELECT * FROM `exam_projects`');
            return $oQuery->fetchAll(PDO::FETCH_ASSOC);
        }

    public function changeName() {

        $prepare = self::$db->prepare(
            'UPDATE exam_projects SET
                        project_name =:name
                        WHERE
                        project_id =:id');

        $prepare->execute(array('name' => $this->project_name, 'id' => $this->project_id));

    }

    public static function findById($id){

        /** @var Object $class */
        $class = get_called_class();

        $oQuery = Object::$db->prepare("SELECT * FROM exam_projects WHERE project_id=:need_id");
        $oQuery->execute(['need_id' => $id]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);
        return $aRes? new $class($aRes):null;
    }

    static function delete($id) {

        $prepare = self::$db->prepare(
            'DELETE FROM exam_projects WHERE project_id  = :id');
        return $prepare->execute(array('id' => $id));

    }

}
