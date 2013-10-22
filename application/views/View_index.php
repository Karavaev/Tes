<script text="text/javascript" src="../../js/rating.js"></script>
<?php
echo ' <a  href=' . $_SERVER['php_self'] . '/write/index> Запись сообщений </a> <br/>';
for ($j = 1; $j <= $data[0][1]; $j++) {
// Вывод ссылки

    if ($j == $data[0][0]) {

        echo ' <a ><b>' . $j . '</b></a> ';
    } else {

        echo ' <a  href=' . $_SERVER['php_self'] . '/index/index/' . $j . '>' . $j . '</a> ';
    }
}

echo '<h1>Постраничный вывод информации</h1>';
?>

<?php foreach ($data[1] as $arr) { ?>
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

