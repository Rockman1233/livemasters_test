<?php

require_once './config/DBConnect.php';

/**
 * Задает структуру моделей
 */
abstract class Object {

    /** @var  PDO */
    static $db;
    
    public function __construct($params = []) {
        $className = get_called_class();
        foreach ($params as $param_name => $param_value){
			if (property_exists($className, $param_name )) {
				$this->$param_name = $param_value;
			}
        }
    }
    
    /**
     * Заполняет массив объектами
     * @param str $className название класса
     */
    public function addData($className) {
        foreach ($_POST as $paramName => $paramValue){
            if (property_exists($className, $paramName )&& isset($paramName)) {
                $ChangingListModel->$paramName = strip_tags($paramValue);
			}
		}
	}
}



