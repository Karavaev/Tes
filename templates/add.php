<?php
echo '<a href=' . $_SERVER['php_self'] . '/index> Главная </a>';
?>
    <h1>Запись </h1>
    <input id="text_input" name="text_input" type="text"/>
    <input id="button" name="button" type="button" value="Добавить"/></br>

<?php include(Q_PATH . '/templates/header.php'); ?>

<?php include(Q_PATH . '/templates/footer.php'); ?>