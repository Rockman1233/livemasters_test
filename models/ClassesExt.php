<?php


include './config/DBConnect.php';


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
    
    /**
     * Заполнить объект свойствами
     */
    public function addData($className) {
        foreach ($_POST as $param_name => $param_value){
                if (property_exists($className, $param_name )&&(isset($param_name)))
                    $ChangingListModel->$param_name = strip_tags($param_value);
            }
    }
    
    /**
     * Редирект JS на заданный URL
     */
     
    static function redirect($URL){
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }

  

}



