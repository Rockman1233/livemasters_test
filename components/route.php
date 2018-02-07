<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/

class Route {
    private $aRouts = [];

    public function __construct() {

            $routes = './config/routes.php';
            $this->aRouts = include($routes);

    }

    private function getURL() {
        //получаем строку запроса
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');

        }
        return null;
    }

    public function niceLook($obj) {
        echo '<pre>';
        print_r($obj);
        echo '</pre>';
        echo '<br>';
        //die();
    }


    public function start() {

        $uri = $this->getURL();
        //echo "Строка запроса - ".$uri;

        foreach ($this->aRouts as $uriPattern => $path) {
            if (preg_match("~$uriPattern~",$uri)) {


                $url = $GLOBALS['base_dir'];
                //вырезаем ненужную часть урла
                $uri = strtok($uri, '?');
                $cutDir = preg_split("~/~", $uri);
                //берем последнюю часть адеса
                $lastFolder = end($cutDir);
                //black magic (change reg exp)
                $internalRoute = preg_replace("~$uriPattern~","$path","$lastFolder");
                //$parametrs[0] = preg_replace("/~[^0-9]~/","","$uri");

                $segments = explode('/',$internalRoute);

                $controllerName = array_shift($segments).'Controller';

                //take name of file with class

                $controllerName = ucfirst($controllerName);

                //take name of method

                $actionName = 'action'.ucfirst(array_shift($segments));

                $parametrs[] = $_GET['sort'];

                //echo '<br> Контроллер - '.$controllerName;
                //echo '<br> Метод контроллера - '.$actionName;

                //connecting files
                $controllerFile = './controllers/'.$controllerName.'.php';

                if(file_exists($controllerFile)) {
                    include_once $controllerFile;
                }

                //create new object
                $classObject = new $controllerName();
                $result = call_user_func_array(array($classObject, $actionName), $parametrs);

                if($result != NULL) {
                    break;
                }
            }
        }
    }
}
