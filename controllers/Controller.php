<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 01.11.17
 * Time: 9:49
 */


abstract class Controller {

    public $loader;
    public $twig;
    static $template;


    function __construct()

    {
        $this->loader = new Twig_Loader_Filesystem('views');
        $this->twig = new Twig_Environment($this->loader, array('cache' => 'cache'));
        //$this->twig = new Twig_Environment($this->loader);
        self::$template = $this->twig->loadTemplate('index.php');
    }

    public function niceLook($obj){
        echo '<pre>';
        print_r($obj);
        die();
    }



}