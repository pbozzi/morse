function updateText(input) {
    $.ajax({
        url : "/api/v1/convert",
        type : 'post',
        data : {
            input : input,
        },
        //beforeSend : function(){
        //    $("#resultado").html("ENVIANDO...");
        //}
    })
    .done(function(msg) {
        $("#txt2").val(msg.output);
    })
    .fail(function(jqXHR, textStatus, msg) {
        alert(msg.text);
    }); 
}

function copyText() {
    var text = document.getElementById("txt2");
    text.select();
    document.execCommand("copy");
}

var _getForm = document.getElementById("form");
_getForm.addEventListener('reset', function() {
    document.getElementById("txt1").focus();
});
