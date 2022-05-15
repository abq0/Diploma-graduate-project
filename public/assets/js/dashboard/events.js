window.addEventListener('swal:confirm-alert', function (e) {
    Swal.fire({
        title: e.detail.title,
        text: e.detail.text,
        icon: e.detail.icon,
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: e.detail.confirmButtonText,
        cancelButtonText: e.detail.cancelButtonText,
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit(e.detail.method, e.detail.id, e.detail.status);
        }
    })
});


window.addEventListener('swal:toast-alert', function (e) {
    Swal.fire({
        position: "bottom-right",
        icon: e.detail.icon,
        title: e.detail.title,
        showConfirmButton: false,
        timer: e.detail.timer,
        toast: true,
        width: 270,
        timerProgressBar: true,
    })
});

window.addEventListener('swal:alert', function (e) {
    Swal.fire({
        title: e.detail.title,
        text: e.detail.text,
        icon: e.detail.icon,
        confirmButtonColor: '#3085d6',
        confirmButtonText: e.detail.confirmButtonText,
    })
});

window.addEventListener('inputChecker', function () {
    if ($('#propertyType').val() == 12 || $('#propertyType').val() == 16 || $('#propertyType').val() == 2) {
        $('.additionalOptions').attr('disabled', true)
        $('input[type=radio].additionalOptions').prop('checked', false);
        $('input[type=number].additionalOptions').val(null);
        $('.additionalOptionsError').remove();
    } else {
        $('.additionalOptions').attr('disabled', false)
    }
});
