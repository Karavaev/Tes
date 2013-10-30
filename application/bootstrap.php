<?php

function __autoload($class)
{
    $__autoload = array(
        'Error404' => '/application/core/exception.php',
        'DB' => '/application/core/bd/bd.php',
        'WebController' => '/application/core/web/WebController.php',
        'BaseController' => '/application/core/BaseController.php',
    );
    if (isset($__autoload[$class])) {
        include(Q_PATH . $__autoload[$class]);
    } elseif (substr($class, -10) == 'Controller') {
        include(Q_PATH . '/application/controllers/' . substr($class, 0, -10) . 'Controller.php');
    }
}


