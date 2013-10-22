<?php

class View
{

    public function generate($view, $data = array())
    {
        include Q_PATH . '/application/views/template.php';
    }

}