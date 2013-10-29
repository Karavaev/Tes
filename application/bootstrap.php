<?php
/**
 * Массив, хранящий имя класса и путь до файла
 */
$__autoload = array(
    'Error404' => '/application/core/exception.php',
    'DB' => '/application/core/bd/bd.php',
    'WebController' => '/application/core/web/WebController.php',
    'BaseController' => '/application/core/BaseController.php',

);
 
function __autoload($class) {
    global $__autoload;
 
    if (isset($__autoload[$class])) {
        include(Q_PATH  . $__autoload[$class]);
    } 
    elseif (substr($class, -10) == 'Controller') {
        include(Q_PATH . '/application/controllers/'.substr($class,0, -10).'Controller.php');
    }
}


