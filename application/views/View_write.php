

<h1>Запись 
    <?php 

    echo '<p> <a style="color: #808000;" href=' . $_SERVER['php_self'] . '/index/index> Главная </a> </p>';
    ?>
    <input id="text_input" name="chat_text_input" type="text" />
    <input id="button" name="chat_button" type="button" value="Добавить"/>

    <script type="text/javascript">
        // делаем фокус на поле ввода при загрузке страницы
        if ($("#text_input").size() > 0)
        {
            $("#text_input").focus();
        }

// функция отправки сообщения
function send_message()
{
   
    var message_text = $('#text_input').val();
    if (message_text!=="")
    {
        alert(message_text);
        $.ajax(
        {
            url: '',
            type: 'POST',
            data:
            {
                'action': 'add_message',
                'message_text': message_text
            },
            dataType: 'json',
            success: function (result)
            {
                $('#chat_text_input').val('Добавлено'); // очищаем поле ввода
            }
         });
     }
 }
 $('#button').click(function()
 {
     send_message();
 });
    </script>
</h1>