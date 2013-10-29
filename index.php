<?php

define("Q_PATH", dirname(__FILE__));

// Подключение всех классов
include Q_PATH . '/application/bootstrap.php';

BashController::Start();
