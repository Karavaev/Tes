<?php include('/header.php'); ?>

    <h1>Вывод информации</h1>

<?php foreach ($message as $arr) { ?>
    <?php
    echo '<a href="#" onclick="rating(' . "'" . $arr[1] . "'" .
        '); return false;">+</a> ' . $arr[2] . '<a href="#" onclick="ratint(' .
        "'" . $arr[1] . "'" . '); return false;">-</a> ';
    echo ' <a  href=' . $_SERVER['php_self'] . '/view/' . $arr[1] . '>' . $j . '</a> ';
    ?>
    <p><?php
        echo $arr[0];
        ?>
    </p>
<?php } ?>

<?php include('/footer.php'); ?>