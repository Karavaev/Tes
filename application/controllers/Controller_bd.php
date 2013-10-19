<?php

class ClassSingleton {

    protected static $instance;  // object instance

    private function __construct() {
        mysql_connect("127.0.0.1:3306", "mysql", "mysql") or die(mysql_error());
        mysql_select_db("test") or die(mysql_error());
        mysql_query("CREATE TABLE IF NOT EXISTS bash (
	  id INT AUTO_INCREMENT,
	  Message VARCHAR(255),
	  Rating INT,
	  PRIMARY KEY(id)
	)") Or die(mysql_error());
    }

// Защищаем от создания через new Singleton

    private function __clone() {
        
    }

// Защищаем от создания через клонирование

    private function __wakeup() {
        
    }

// Защищаем от создания через unserialize

    public static function getInstance() {    // Возвращает единственный экземпляр класса. @return Singleton
        if (!isset(self::$instance)) {
            $class = __CLASS__;
            self::$instance = new $class();
        }

        return self::$instance;
    }

    public function Read($page) {
        $message = array();
// Подготовка к постраничному выводу
        $perpage = 10; // Количество отображаемых данных из БД
        if (empty($page) || ($page <= 0)) {
            $page = 1;
        } else {

            $page = (int) $page; // Считывание текущей страницы
        }

// Общее количество информации

        $count = mysql_numrows(mysql_query('select * from bash')) or die('error! Записей не найдено!');

        $pages_count = ceil($count / $perpage); // Количество страниц
// Если номер страницы оказался больше количества страниц

        if ($page > $pages_count)
            $page = $pages_count;

        $start_pos = ($page - 1) * $perpage; // Начальная позиция, для запроса к БД
// Вывод информации из базы данных

        $result = mysql_query('select * from bash limit ' . $start_pos . ', ' . $perpage) or die('error!');

        while ($row = mysql_fetch_array($result)) {

            $message[] = array($row['Message'], $row['id'], $row['Rating']);
        }
        mysql_close();
        return array(array($page, $pages_count), $message);
    }

    public function Write($Message) {
// Подключение к базе данных
        mysql_query("INSERT INTO `Test`.`bash` (`id`, `Message`, `Rating`) VALUES (NULL, '" . $Message . "', '0');") or die(mysql_error());
    }

    public function Rating($id_reting) {
        mysql_query('UPDATE bash SET Rating = Rating ' . $id_reting[1] . ' 1 WHERE id = ' . $id_reting[0]) or die('error!');
    }

}