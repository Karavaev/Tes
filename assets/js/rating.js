function rating(a) {
    $.post(
        "http://tes/quote/",
        {
            action: 'izmenenie',
            id: a,
            znak: '+'

        },
        onAjaxSuccess
    );

    function onAjaxSuccess() {
        location.reload();
    }

}
;

function ratint(a) {
    $.post(
        "http://tes/quote/",
        {
            action: 'izmenenie',
            id: a,
            znak: '-'

        },
        onAjaxSuccess
    );

    function onAjaxSuccess() {
        location.reload();
    }

}
;

