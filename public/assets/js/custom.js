$('#allOffices').click(function () {
    $('.selectorRow').fadeOut();
    $('.resultRow').delay(600).fadeIn();
    $('.officeRow').css('display', 'flex');
    livewire.emit('getInfo',1);
});

$('#allProperties').click(function () {
    $('.selectorRow').fadeOut();
    $('.resultRow').delay(600).fadeIn();
    $('.propertiesRow').css('display', 'flex');
    livewire.emit('getInfo',2);
});

$('#selectorBack').click(function () {
    $('.resultRow').fadeOut();
    $('.selectorRow').delay(600).fadeIn();
    setTimeout(function () {
        $('.propertiesRow').css('display', 'none');
        $('.officeRow').css('display', 'none');
    }, 600);
});

/*$('#cityFilter').change(function () {
    livewire.emit('filter',);
});*/
