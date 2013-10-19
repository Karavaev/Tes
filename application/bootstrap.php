<!-- Подключаем jQuery и chat_scripts.js-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="js/chat_scripts.js"></script>

<?php
include Q_PATH . '/application/core/controller.php';
include Q_PATH . '/application/core/view.php';
include Q_PATH . '/application/controllers/Controller_bd.php';
include Q_PATH . '/application/core/route.php';

Route::Start();
