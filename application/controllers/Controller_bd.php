<?php

class ClassSingleton
{

    protected $_db;
    protected static $instance; // object instance

    public function __construct()
    {
        $host = '127.0.0.1';
        $database = "test";
        $username = "mysql";
        $password = "mysql";
        $port = "3306";
        $this->_db = new PDO('mysql:host=' . $host . ';dbname=' . $database . ';port=' . $port, $username, $password);
    }

// Защищаем от создания через new Singleton

    private function __clone()
    {

    }

// Защищаем от создания через клонирование

    private function __wakeup()
    {

    }

// Защищаем от создания через unserialize

    public static function getInstance()
    { // Возвращает единственный экземпляр класса. @return Singleton
        if (!isset(self::$instance)) {
            $class = get_called_class();
            self::$instance = new $class();
        }
        return self::$instance;
    }


}

class DB extends ClassSingleton
{
    protected $query = array();
    public function select($select)
    {
        $this->query['select'] = $select;
        return $this;
    }

    public function upval($values = array())
    {
        $tabl = '';
        $this->query['INSERT INTO'] = array();
        foreach ($values as $key => $value) {
            if ($key != 'tabl') {
                $stolb .= "`" . $key . "`,";
                $znach .= "'" . $value . "',";
            } else {
                $tabl = $value;
            }
        }
        $stolb = preg_replace('/\,$/', ')', $stolb);
        $znach = preg_replace('/\,$/', ')', $znach);
        $this->query['INSERT INTO'] = "`" . $tabl . "`" . ' (' . $stolb . ' VALUES' . ' (' . $znach . ';';

        return $this;

    }

    public function insert($insert)
    {
        $this->query['insert into'] = $insert;
        return $this;
    }

    public function from($from)
    {
        $this->query['from'] = $from;
        return $this;
    }

    public function update($update)
    {
        $this->query['update'] = $update;

        return $this;
    }

    public function where($where = array())
    {
        $this->query[' where'] = array();
        if (is_array($where)) {
            foreach ($where as $key => $value) {
                $this->query[' where'] = $key . '=' . $value;
            }
        } else {
            $this->query[' where'] = 'id ' . $where;
        }
        return $this;
    }

    public function set($set = array())
    {
        $this->query[' set'] = array();
        if (is_array($set)) {
            foreach ($set as $key => $value) {
                $this->query[' set'] = $key . '=' . $value;
            }
        } else {
            $this->query[' set'] = '';
        }

        return $this;
    }

    public function orderBy($order)
    {
        $this->query['order'] = $order;
        return $this;
    }

    /**
     * @return PDOStatement
     */
    public function fetch()
    {
        $raw_query = '';
        foreach ($this->query as $type => $query) {
            $raw_query .= $type . ' ' . $query;
        }
        $result = $this->_db->query($raw_query);
        $this->$query = array();
        return $result;
    }

    public function limit($limit = array())
    {
        $this->query[' limit'] = $limit[0] . ', ' . $limit[1];
        return $this;
    }

}

class ClassBash extends DB
{
    public function Read($page)
    {
        $message = array();
// Подготовка к постраничному выводу
        $perpage = 10; // Количество отображаемых данных из БД
        if (empty($page) || ($page <= 0)) {
            $page = 1;
        } else {

            $page = (int)$page; // Считывание текущей страницы
        }
// Общее количество информации
        $vse = $this->select('*')->from('bash')->fetch();
        $pages_count = ceil($vse->rowCount() / $perpage); // Количество страниц
// Если номер страницы оказался больше количества страниц

        if ($page > $pages_count)
            $page = $pages_count;

        $start_pos = ($page - 1) * $perpage; // Начальная позиция, для запроса к БД

        $otobr = $this->select('*')->from('bash')->limit(array($start_pos, $perpage))->fetch();
        foreach ($otobr as $row) {
            $message[] = array($row[1], $row[0], $row[2]);
        }
        //
        return array(array($page, $pages_count), $message);
    }

    public function Write($message)
    {
        $this->upval(array('tabl' => 'bash', 'id' => 'NULL', 'Message' => $message, 'Rating' => '0'))->fetch();
    }

    public function Rating($id_reting)
    {
        $this->update('bash')->set(array('Rating' => 'Rating' . $id_reting[1] . '1'))->where(array('id' => $id_reting[0]))->fetch();
    }

}




