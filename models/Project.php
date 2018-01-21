<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 11:57
 */
include_once 'ClassesExt.php';

class Project extends Object {

    public $projecct_id;
    public $project_name;


    static function TableName()
    {
        return 'exam_projects';
    }


    public function saveProject()
    {
        echo '<pre>';
        echo $this->projecct_id;
        echo '</pre>';
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
                        name  ='.$this->project_name.'
                        WHERE
                        project_id='.$this->project_id);

        $prepare->execute();

    }

    public static function findById($id){

        /** @var Object $class */
        $class = get_called_class();

        $oQuery = Object::$db->prepare("SELECT * FROM exam_projects WHERE project_id=:need_id");
        $oQuery->execute(['need_id' => $id]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);
        return $aRes? new $class($aRes):null;
    }

    public function delete($id) {

        $prepare = self::$db->prepare(
            'DELETE FROM exam_projects WHERE project_id  ='.$id);
        return $prepare->execute();

    }

}
