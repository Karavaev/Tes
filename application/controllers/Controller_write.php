<?php


class Controller_write {

    function __construct() {
     
    }

    public function Action_index() {
        $view = new View();
        $view->generate('write');           

    }


}