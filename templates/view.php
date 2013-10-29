<?php include('/header.php');
echo '<a href=' . $_SERVER['php_self'] . '/index> Главная </a>';
?>

    <h1>Вывод одиночного сообщения</h1>

<?php foreach ($message as $arr) { ?>
    <?php
    echo '<a href="#" onclick="rating(' . "'" . $arr[1] . "'" .
        '); return false;">+</a> ' . $arr[2] . '<a href="#" onclick="ratint(' .
        "'" . $arr[1] . "'" . '); return false;">-</a> ';
    ?>
    <p><?php
        echo $arr[0];
        ?>
    </p>
<?php } ?>

<?php include('/footer.php'); ?>