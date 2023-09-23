//เพิ่มสินค้า
$(document).ready(function () {
    $("#product-add").submit(async function (e) { // เพิ่ม async ที่นี่
        e.preventDefault();
        let Method = $(this).attr("method"); 
        let formUrl = $(this).attr("action");
        let formData = new FormData(this);
        let fee = $(this).data("fee");

        const { value: accept } = await Swal.fire({
            title: 'Terms and conditions',
            html: "Products will be charged a service fee of " + fee + " %.",
            input: 'checkbox',
            inputValue: 1,
            inputPlaceholder:
                'I agree with the terms and conditions',
            confirmButtonText:
                'Continue <i class="fa fa-arrow-right"></i>',
            inputValidator: (result) => {
                return !result && 'You need to agree with T&C'
            }
        })

        if (accept) {
            $.ajax({
                type: Method, 
                url: formUrl,
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data);
                    let result = JSON.parse(data);
                    if (result.status == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: result.msg,
                            showConfirmButton: false,
                            heightAuto: false,
                            timer: 1500
                        }).then(() => {
                            window.location.href = "./?page=product"
                        })
                    } else if (result.status == "error") {
                        Swal.fire({
                            icon: result.status,
                            title: 'Oops...',
                            html: result.msg,
                            heightAuto: false,
                        })
                    }
                }
            });
        }
    });
});

//แก้ไขสินค้า
$(document).ready(function () {
    $("#product-update").submit(function (e) {
        e.preventDefault();
        const urlParams = new URLSearchParams(window.location.search);
        const pdId = urlParams.get('pd_id');
        let Method = $(this).attr("method");
        let formUrl = $(this).attr("action");
        let formData = new FormData(this);
        console.log(pdId);

        formData.append('pd_id', pdId);
        $.ajax({
            type: Method,
            url: formUrl,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                let result = JSON.parse(response)
                let status = result.status;
                switch (status) {
                    case "success":
                        Swal.fire({
                            icon: result.status,
                            title: result.msg,
                            heightAuto: false,
                            showConfirmButton: false,
                            timer: 1500,
                        }).then(() => {
                            history.back();
                        });
                        break;
                    case "error":
                        Swal.fire({
                            icon: result.status,
                            title: result.msg,
                            heightAuto: false,
                        })
                }
            }
        });
    });
});

//ลบสินค้า
$(document).ready(function () {
    $('#product_list').on('click', '.product-del-btn', function (e) {
        e.preventDefault();
        let pd_id = $(this).data("pd-id");
        let formUrl = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                console.log(pd_id);
                $.ajax({
                    type: "post",
                    url: formUrl,
                    data: { pd_id: pd_id },
                    success: function (data) {
                        let result = JSON.parse(data)
                        if (result.status == "success") {
                            console.log(result);
                            Swal.fire(
                                'Deleted!',
                                result.msg,
                                result.status
                            ).then(() => {
                                location.reload();
                            })
                        } else if (result.status == "error") {
                            Swal.fire(
                                'Deleted!',
                                result.msg,
                                result.status
                            )
                        }
                    }
                });
            }
        })
    });
});