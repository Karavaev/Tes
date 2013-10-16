<h1>
    <?php
    
    echo '<p> <a style="color: #808000;" href=' . $_SERVER['php_self'] . '/write/index> Запись сообщений </a> </p>';
    for ($j = 1; $j <= $data[0][1]; $j++) {
// Вывод ссылки

        if ($j == $data[0][0]) {

            echo ' <a style="color: #808000;" ><b>' . $j . '</b></a> ';
        } else {

            echo ' <a style="color: #808000;" href=' . $_SERVER['php_self'] . '/index/index/' . $j . '>' . $j . '</a> ';
        }
    }

    echo '<p><b>Постраничный вывод информации</b></p>';
    foreach ($data[1] as $arr) {
        echo '<p>';
        echo $arr[0];
        echo '<a style="color: #808000;" href=' . $_SERVER['php_self'] . '/index/quote/' . $arr[1] . '>' . $arr[1] . '</a> ';
        echo '</p>';
    }
    ?>
</h1>