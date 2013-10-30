// делаем фокус на поле ввода при загрузке страницы
if ($("#text_input").size() > 0) {
    $("#text_input").focus();
}

// функция отправки сообщения
function send_message() {

    var message_text = $('#text_input').val();
    var url = document.URL.replace(/(\\|\/)[^\\\/]*$/, '/')+'add/';

    if (message_text != "" && message_text != "Добавлено") {
        
        function onAjaxSuccess() {
            $('#text_input').val('Добавлено');
        }
        $.post(
            url,
            {
                action: 'add_message',
                message_text: message_text
            },
            onAjaxSuccess
        );




    }
}
$('#button').click(function () {
    send_message();
});


