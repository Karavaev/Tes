function rating(a) {
    var url = document.URL.replace(/(\\|\/)[^\\\/]*$/, '/')+'quote/';
    
    function onAjaxSuccess() {
      location.reload();
    }
    
    $.post(
        url,
        {
            action: 'izmenenie',
            id: a,
            znak: '+'

        },
        onAjaxSuccess()
    );



}
;

function ratint(a) {
     var url = document.URL.replace(/(\\|\/)[^\\\/]*$/, '/')+'quote/';
    $.post(
        url,
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

