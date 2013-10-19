<?php

class Controller_write {

    public function Action_index() {
        $view = new View();
        $view->generate('write');
    }

    public function Action_write() {


        if ($_POST['action'] == 'add_message') {
            $text = $_POST['message_text'];
            ClassSingleton::getInstance()->Write($text);
        }
    }

}