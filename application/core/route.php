<?php

class Route {

    function __construct() {
        
    }

    public static function Start() {
        //назначение параметров по умолчанию
        $controller_name = 'index';
        $action_name = 'index';
        $action_parameters = array();

        //преобразуем строку запроса в массив
        $route_array = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($route_array[1])) {
            $controller_name = $route_array[1];
        }

        if (!empty($route_array[2])) {
            $action_name = $route_array[2];
        }
        
        if (!empty($route_array[3])) {            
            $action_parameters[] = $route_array[3];
        }
        if (!empty($route_array[4])) {
            $action_parameters[] = $route_array[4];
        }

        // добавляем префиксы
        $controller_name = 'Controller_' . $controller_name;
        $action_name = 'Action_' . $action_name;

        if (file_exists(Q_PATH . '/application/controllers/' . $controller_name . '.php')) {
            include Q_PATH . '/application/controllers/' . $controller_name . '.php';
        } else {
            ob_end_clean();
            header("Location: /404");
            exit;
        }

        $controller = new $controller_name();
        echo $action_parameters[0];
        $controller->$action_name($action_parameters);
    }

}
