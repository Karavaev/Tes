<?php

class Controller_index extends Controller {

    function __construct() {
        
    }

    public function Action_index($parameters = array()) {

        $view = new View();
        $view->generate('index', Singleton::getInstance()->Read($parameters[0]));
    }

    public function Action_quote() {
        if ($_POST['action'] == 'izmenenie') {
            // Singleton::getInstance()->Write($ooooo); 
            Singleton::getInstance()->Rating(array($_POST['id'], $_POST['znak']));
        }
    }

    public function Action_obnov() {
        if ($_POST['action'] == 'obn') {
            $this->Action_index();
        }
    }

}
