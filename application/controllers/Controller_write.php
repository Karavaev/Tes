<?php

class Controller_write
{

    public function Action_index()
    {
        $view = new View();
        $view->generate('write');
    }

    public function Action_write()
    {        
        if (isset($_POST['action']) && $_POST['action'] == 'add_message'){
            if (isset($_POST['message_text'])){
                $bash = new ClassBash();
                $bash->Write($_POST['message_text']);
            }
        }
    }

}