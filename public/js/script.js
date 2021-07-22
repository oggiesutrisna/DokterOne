$(function () {
    $(".delete-button").click(function (e) {
        e.preventDefault();
        Swal.fire({
            title: "Hapus?",
            text: "Data tersebut akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya!",
            cancelButtonText: "Batal",
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $("#form").submit();
            }
        });
    });

    $('[data-toggle="tooltip"]').tooltip();
});
