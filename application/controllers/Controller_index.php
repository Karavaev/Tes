<?php

class Controller_index extends Controller {

    function __construct() {
        
    }
    public function Action_index() {
        $view = new View();
        $view->generate('index',array('Тест'));
    }
}
