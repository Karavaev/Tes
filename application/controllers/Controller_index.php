<?php

class Controller_index extends Controller {

function __construct() {

}
public function Action_index($parameters=array()) {
//$view = new View();
      //  echo $parameters[0];
Singleton::getInstance()->doAction($parameters[0]);
//$view->generate('index', array('Тест'));
}

}
class Singleton {
public $pag=array() ;    
protected static $instance;  // object instance
private function __construct(){
mysql_connect("127.0.0.1:3306", "mysql", "mysql") or die(mysql_error());
mysql_select_db("test") or die(mysql_error());
mysql_query("CREATE TABLE IF NOT EXISTS bash (
	  id INT AUTO_INCREMENT,
	  Message VARCHAR(255),
	  Rating INT,
	  PRIMARY KEY(id)
	)") Or die(mysql_error());
mysql_close ();

}  // Защищаем от создания через new Singleton
private function __clone() { }  // Защищаем от создания через клонирование
private function __wakeup() { }  // Защищаем от создания через unserialize
public static function getInstance() {    // Возвращает единственный экземпляр класса. @return Singleton
if (!isset(self::$instance) ) {
$class = __CLASS__;
self::$instance = new $class();
}
return self::$instance;
}

public function link_bar($page, $pages_count)
{
    global $pag;
    for ($j = 1; $j <= $pages_count;$j++)
    {
// Вывод ссылки

if ($j == $page) {

$pag[]= ' <a style="color: #808000;" ><b>'.$j.'</b></a> ';

} else {

$pag[]= ' <a style="color: #808000;" href='.$_SERVER['php_self'].'/index/index/'.$j.'>'.$j.'</a> ';

}
}
//return true;

} // Конец функции

public function doAction($page)
{
$message=array() ;
global $pag;
// Подключение к базе данных

mysql_connect("127.0.0.1:3306", "mysql", "mysql") or die(mysql_error());
mysql_select_db("test") or die(mysql_error());
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

if ($page > $pages_count) $page = $pages_count;

$start_pos = ($page - 1) * $perpage; // Начальная позиция, для запроса к БД
// Вызов функции, для вывода ссылок на экран

       $this->link_bar($page, $pages_count);
// Вывод информации из базы данных

$message[]= '<p><b>Постраничный вывод информации</b></p>';

$result = mysql_query('select * from bash limit '.$start_pos.', '.$perpage) or die('error!');

while ($row = mysql_fetch_array($result)) {

$message[]= '<p>'.$row['Message'].'</p>';

}
$view = new View();

$view->generate('index', array($pag,$message));
}
}