<?php

class Controller_index extends Controller
{

    private $bash;

    function __construct()
    {
        global $bash;
        $bash = new ClassBash();
    }

    public function Action_index($parameters = array())
    {
        global $bash;
        $view = new View();
        $view->generate('index', $bash->Read($parameters[0]));
    }

    public function Action_quote()
    {
        global $bash;
        if (isset($_POST['action']) && $_POST['action'] == 'izmenenie'){
            if (isset($_POST['id']) && isset($_POST['znak'])){
                $bash->Rating(array($_POST['id'], $_POST['znak']));
            }
        }
    }
}
