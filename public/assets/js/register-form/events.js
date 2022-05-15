window.addEventListener('swal:toast-alert',function(e){
    Swal.fire({
        position:"bottom-right",
        icon: e.detail.icon,
        title: e.detail.title,
        showConfirmButton: false,
        timer: e.detail.timer,
        toast:true,
        width:270,
        timerProgressBar:true,
    })
});

window.addEventListener('showRepeatDiv',function(e){
    $('.stepsForm').fadeOut();
    $('.requestSuccesses').delay(500).fadeIn();
});

