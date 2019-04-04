$( document ).ready(function() {
    $("#btn").click(
        function(){
            sendAjaxForm('result_form', 'main_form', 'encode');
            return false;
        }
    );
});

function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url:     url,
        type:     "POST",
        dataType: "html",
        data: $("#"+ajax_form).serializeFormJSON(),
        success: function(response) {
            document.getElementById("output_number").value = response;
        },
        error: function(response) {
            $('#result_form').html('Ошибка. Данные не отправлены.');
        }
    });
}
(function ($) {
    $.fn.serializeFormJSON = function () {

        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
})(jQuery);