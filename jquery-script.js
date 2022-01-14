$(document).keydown(function (e) {
    if (e.keyCode >= 37 && e.keyCode <= 40) {
        alert('Нажата клавиша ' + e.key);
    }
});