function processSuccess(msg,url) {
    Swal.fire({
        icon: "success",
        title: msg,
        showConfirmButton: false,
        timer: 1500,
    }).then(function () {
        window.location.replace(url);
    });
}

function processFailed(msg) {
    Swal.fire({
        text: msg,
        icon: "error",
        buttonsStyling: false,
        confirmButtonText: "Tutup",
        customClass: {
            confirmButton: "btn font-weight-bold btn-light-primary",
        },
    });
}
