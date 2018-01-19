<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 01.11.17
 * Time: 9:49
 */


abstract class Controller {

    public $loader;
    static $twig;


    function __construct()

    {
        $this->loader = new Twig_Loader_Filesystem('views');
        //$twig = new Twig_Environment($loader, array('cache' => 'cache'));
        self::$twig = new Twig_Environment($this->loader);
    }

    public function actionIndex() {

    }

    public function niceLook($obj){
        echo '<pre>';
        print_r($obj);
    }



}