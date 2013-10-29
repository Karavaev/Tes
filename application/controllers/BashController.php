<?php

class BashController extends WebController
{
    protected $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function actionIndex($param)
    {
        $page = $param[0];

        $message = array();
// Подготовка к постраничному выводу
        $perpage = 10; // Количество отображаемых данных из БД
        if (empty($page) || ($page <= 0)) {
            $page = 1;
        } else {

            $page = (int)$page; // Считывание текущей страницы
        }

// Общее количество информации
        $vse = $this->db->select('*')->from('bash')->fetch();
        $pages_count = ceil($vse->rowCount() / $perpage); // Количество страниц        
// Если номер страницы оказался больше количества страниц

        if ($page > $pages_count)
            $page = $pages_count;
        if ($page != 0) {
            $start_pos = ($page - 1) * $perpage; // Начальная позиция, для запроса к БД

            $otobr = $this->db->select('*')->from('bash')->limit(array($start_pos, $perpage))->fetch();
            foreach ($otobr as $row) {
                $message[] = array($row[1], $row[0], $row[2]);
            }
        }
        echo $this->render('templates/index.php', array('page' => $page, 'pages_count' => $pages_count, 'message' => $message));
    }

    public function actionAdd()
    {
        if (isset($_POST['action']) && $_POST['action'] == 'add_message') {
            $message = $_POST['message_text'];
            if (isset($message)) {
                $this->db->upval(array('tabl' => 'bash', 'id' => 'NULL', 'Message' => $message, 'Rating' => '0'))->fetch();
            }

        }
        echo $this->render('templates/add.php');
    }

    public function actionQuote()
    {
        if (isset($_POST['action']) && $_POST['action'] == 'izmenenie') {
            $id = $_POST['id'];
            $znak = $_POST['znak'];
            if (isset($id) && isset($znak)) {

                $this->db->update('bash')->set(array('Rating' => 'Rating' . $znak . '1'))->where(array('id' => $id))->fetch(); //update('bash')->set(array('Rating' => 'Rating' . $_POST['znak'] . '1'))->where(array('id' => $_POST['id']))->fetch();

            }
        }
    }

    public function actionView($param)
    {
        $id = $param[0];
        $otobr = $this->db->select('*')->from('bash')->where(array('id' => $id))->fetch();
        foreach ($otobr as $row) {
            $message[] = array($row[1], $row[0], $row[2]);
        }
        echo $this->render('templates/view.php', array('message' => $message));
    }
}