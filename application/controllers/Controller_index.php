<?php

class Controller_index extends Controller {

    function __construct() {
        
    }

    public function Action_index($parameters = array()) {
        include Q_PATH . '/application/controllers/Controller_bd.php';

        $view = new View();
        $view->generate('index', Singleton::getInstance()->Read($parameters[0]));
    }

}
