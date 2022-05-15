$(document).ready(function () {
    $('.additionalOptions').attr('disabled', true)
    $('.loading-Screen').fadeOut()
    $('body').removeClass('overflow-hidden');

    if ($('#propertyType').val() == 12 || $('#propertyType').val() == 16 ||$('#propertyType').val() == 2) {
        $('.additionalOptions').attr('disabled', true)
        $('input[type=radio].additionalOptions').prop('checked', false);
        $('input[type=number].additionalOptions').val(null);
        $('.additionalOptionsError').remove();
    } else {
        $('.additionalOptions').attr('disabled', false)
    }
})

$('.infoSwitcher').click(function () {
    $(this).text(function (i, text) {
        if ($(this).hasClass('personalInformation')) {
            $(this).attr('disabled', 'disabled');
            $(this).removeClass('personalInformation');
            $(this).text("إظهار البيانات الشخصية");
            $(this).parent().next('.personalInformation').fadeOut();
            $(this).parent().next('.personalInformation').next('.officeInformation').delay(500).fadeIn();
            setTimeout(() => {
                $(this).removeAttr('disabled')
            }, 800);
        } else {
            $(this).attr('disabled', 'disabled');
            $(this).addClass('personalInformation');
            $(this).text("إظهار بيانات المكتب");
            $(this).parent().next('.personalInformation').next('.officeInformation').fadeOut();
            $(this).parent().next('.personalInformation').delay(500).fadeIn();
            setTimeout(() => {
                $(this).removeAttr('disabled')
            }, 800);
        }
    })
})

$('.passwordReveal').click(function (i, attr) {
    if ($(this).next(".passwordValue").attr('type') == 'password') {
        $(this).next(".passwordValue").attr('type', 'text');
    } else {
        $(this).next(".passwordValue").attr('type', 'password');
    }
})

$('#officeFilter').change(function () {
    Livewire.emit('officeFilter', $('#officeFilter').val());
})

$('#propertiesFilter').change(function () {
    Livewire.emit('propertiesFilter', $('#propertiesFilter').val());
})


$('#propertyType').change(function () {
    if ($(this).val() == 12 || $(this).val() == 16 || $(this).val() == 2) {
        $('.additionalOptions').attr('disabled', true)
        $('input[type=radio].additionalOptions').prop('checked', false);
        $('input[type=number].additionalOptions').val(null);
        $('.additionalOptionsError').remove();
    } else {
        $('.additionalOptions').attr('disabled', false)
    }
});
