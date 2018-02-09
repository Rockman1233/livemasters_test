<?php

/**
 * Класс-маршрутизатор для определения запрашиваемой страницы.
 * цепляет классы контроллеров и моделей;
 * создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
 */
class Route {
	/** @var array маршруты */
    private $_aRouts = [];
    
    public function __construct() {
        $routes = './config/routes.php';
        $this->_aRouts = include($routes);
    }
	
    /**
     * текущий URL
     * @return string
     */
    private function _getURL() {
        //получаем строку запроса
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
        return '';
    }
	
    /**
     * @param obj $obj - Что будем смотреть?
     */
    public function niceLook($obj) {
        echo '<pre>';
        print_r($obj);
        echo '</pre>';
        echo '<br>';
        //die();
    }
	
    /**
     * Инициализация маршрутов
     */
    public function start() {
        $uri = $this->_getURL();
        //echo "Строка запроса - ".$uri;
        foreach ($this->_aRouts as $uriPattern => $path) {
            if (preg_match('~'.$uriPattern.'~', $uri)) {
                $url = $GLOBALS['base_dir'];
                //вырезаем ненужную часть урла
                $uri = strtok($uri, '?');
                $cutDir = preg_split('~/~', $uri);
                //берем последнюю часть адеса
                $lastFolder = end($cutDir);
                //black magic (change reg exp)
                $internalRoute = preg_replace('~'.$uriPattern.'~', $path, $lastFolder);
                //делаем массив из сегментов URL
                $segments = explode('/',$internalRoute);
                //take name of file with class
                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);
                //take name of method
                $actionName = 'action' . ucfirst(array_shift($segments));
                $parametrs[] = $_GET['sort'] ?? '';
                //echo '<br> Контроллер - '.$controllerName;
                //echo '<br> Метод контроллера - '.$actionName;
                //connecting files
                $controllerFile = './controllers/'.$controllerName.'.php';
                if(file_exists($controllerFile)) {
                    require_once $controllerFile;
                }
                //create new object
                $classObject = new $controllerName();
                $result = call_user_func_array(array($classObject, $actionName), $parametrs);
                if(!$result) {
                    break;
                }
            }
        }
    }
}
