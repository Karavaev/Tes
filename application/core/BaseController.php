<?php

//abstract 
class BaseController
{
    public static function Start()
    {
        //назначение параметров по умолчанию        
        $action_name = 'index';
        $action_parameters = array();

        //преобразуем строку запроса в массив
        $route_array = explode('/', $_SERVER['REQUEST_URI']);

        // Заменить empty на аналог с проверкой ключа в массиве
        if (!empty($route_array[1])) {
            $action_name = $route_array[1];
        }

        if (!empty($route_array[2])) {
            $action_parameters[] = $route_array[2];
        }

        // добавляем префиксы
        $action_name = 'action' . ucfirst($action_name);
        $className = get_called_class();
        $controller = new $className();
        try {
            if (!method_exists($className, $action_name)) {
                throw new Error404();
            } else {
                $controller->$action_name($action_parameters);
            }
        } catch (Error404 $e) {
            echo 'страница не найдена';
        }
    }


}
