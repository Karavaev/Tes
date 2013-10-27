// делаем фокус на поле ввода при загрузке страницы
if ($("#text_input").size() > 0) {
    $("#text_input").focus();
}

// функция отправки сообщения
function send_message() {

    var message_text = $('#text_input').val();

    if (message_text !== "") {
        $.post(
            "http://tes/add/",
            {
                action: 'add_message',
                message_text: message_text
            },
            onAjaxSuccess
        );

        function onAjaxSuccess() {
            $('#text_input').val('Добавлено');
        }


    }
}
$('#button').click(function () {
    send_message();
});


