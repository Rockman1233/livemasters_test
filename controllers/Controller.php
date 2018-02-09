<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 01.11.17
 * Time: 9:49
 * Основной контроллер
 */
abstract class Controller {

	/** Лоудер */
    public $loader;
    public $twig;
    static $template;

    /**
     * Конструктор
     */
    function __construct() {
        $this->loader = new Twig_Loader_Filesystem('views');
        //$this->twig = new Twig_Environment($this->loader, array('cache' => 'cache'));
        $this->twig = new Twig_Environment($this->loader);
        self::$template = $this->twig->loadTemplate('index.php');
    }
    
    /**
     * Красивый вывод объекта (служебная)
     * @return obj $obj
     */
    public function niceLook($obj) {
        echo '<pre>';
        print_r($obj);
        //die();
    }
}