<?php


include $_SERVER['DOCUMENT_ROOT'].'/config/DBConnect.php';


abstract class Object{

    /** @var  PDO */
    static $db;

    public function __construct($params = [])
    {
        $className = get_called_class();
        foreach ($params as $param_name => $param_value){
            if (property_exists($className, $param_name ))
                $this->$param_name = $param_value;
        }
    }

    public function __get($name)
    {
        if (property_exists($this,$name))
            return $this->name;

        return 'Not exist';
    }

    public function __set($name, $value)
    {
        if (property_exists($this,$name))
            $this->$name = $value;
        return 'Not exist';
    }

    abstract static function TableName();

    /**
     * @param integer $id
     * @return
     */

}



