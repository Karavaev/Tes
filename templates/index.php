<?php include(Q_PATH . '/templates/header.php'); ?>

<?php
echo ' <a  href=' . $_SERVER['php_self'] . '/add> Запись сообщений </a> <br/>';
for ($j = 1; $j <= $pages_count; $j++) {
// Вывод ссылки

    if ($j == $page) {

        echo ' <a ><b>' . $j . '</b></a> ';
    } else {

        echo ' <a  href=' . $_SERVER['php_self'] . '/index/' . $j . '>' . $j . '</a> ';
    }
}
?>
    <h1>Постраничный вывод информации</h1>

<?php foreach ($message as $arr) { ?>

    <?php
    echo ' <a  href=' . $_SERVER['php_self'] . '/view/' . $arr[1] . '>' . $arr[1] . '</a> </br>';
    echo '<a href="#" onclick="rating(' . "'" . $arr[1] . "'" .
        '); return false;">+</a> ' . $arr[2] . '<a href="#" onclick="ratint(' .
        "'" . $arr[1] . "'" . '); return false;">-</a> ';

    ?>
    <p><?php
        echo $arr[0];
        ?>
    </p>
<?php } ?>



<?php include(Q_PATH . '/templates/footer.php'); ?>