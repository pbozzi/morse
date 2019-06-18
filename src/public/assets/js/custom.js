function focusOnLoad()
{
     document.getElementById("txt1").focus();
}

function updateText(morse) {
    document.getElementById("txt2").value = morse;
}

function copyText() {
    var text = document.getElementById("txt1");
    text.select();
    document.execCommand("copy");
}

var _getForm = document.getElementById("form");
_getForm.addEventListener('reset', function() {
    document.getElementById("txt1").focus();
});