//สมัครสมาชิก
$(document).ready(function () {
    $("#registerForm").submit(function (e) {
        e.preventDefault();
        let Method = $(this).attr("method");
        let formUrl = $(this).attr("action");
        let formData = $(this).serialize();
        $("#spinner-div").fadeIn(500);
        $.ajax({
            type: Method,
            url: formUrl,
            data: formData,
            success: function (data) {
                let result = JSON.parse(data);
                if (result.status == "success") { //success
                    window.location.href = "./?page=register&function=verify_email"
                } else if (result.status == "warning") { //warning
                    console.log("warning");
                    Swal.fire({
                        title: 'แจ้งเตือน!',
                        text: result.msg,
                        icon: result.status,
                        heightAuto: false,
                        confirmButtonText: "เข้าสู่ระบบ",
                        // backdrop: false
                    }).then(function (result) {
                        if (result.isConfirmed) {
                            setTimeout(() => {
                                $('#Modal-login').modal('show');
                            }, 200)
                        }
                        // window.location.reload();
                    });
                } else { //error
                    Swal.fire({
                        title: 'ล้มเหลว!',
                        text: result.msg,
                        icon: result.status,
                        heightAuto: false,
                        // backdrop: false
                    });
                }
            },
            complete: function () {
                // ซ่อน Spinners เมื่อเสร็จสิ้นการทำงานทุกกรณี
                $("#spinner-div").hide();
            }
        });
    });
});

//กรอก OTP
$(document).ready(function () {
    $("#otpForm").submit(function (e) {
        e.preventDefault();
        let Method = $(this).attr("method");
        let formUrl = $(this).attr("action");
        let formData = $(this).serialize();
        $.ajax({
            type: Method,
            url: formUrl,
            data: formData,
            success: function (data) {
                let result = JSON.parse(data);
                if (result.status == "success") {
                    Swal.fire({
                        title: 'success!',
                        html: result.msg,
                        icon: result.status,
                        heightAuto: false,
                        showConfirmButton: false,
                        timer: 3000,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                        // confirmButtonText: "เข้าสู่ระบบ",
                    }).then(function (result) {
                        window.location.href = "./"
                    })
                } else if (result.status == "warning") {
                    Swal.fire({
                        title: 'แจ้งเตือน!',
                        html: result.msg,
                        icon: result.status,
                        heightAuto: false,
                        // confirmButtonText: "เข้าสู่ระบบ",
                    })
                } else {
                    Swal.fire({
                        title: 'ล้มเหลว!',
                        html: result.msg,
                        icon: result.status,
                        heightAuto: false,
                    });
                }
            }
        });
    });
});

//ปุ่ม Login
$(document).ready(function () {
    $("#loginForm").submit(function (e) {
        e.preventDefault();
        let formUrl = $(this).attr("action");
        let Method = $(this).attr("method");
        let formData = $(this).serialize();
        $.ajax({
            type: Method,
            url: formUrl,
            data: formData,
            success: function (data) {
                let result = JSON.parse(data);
                if (result.status == "success") {
                    Swal.fire({
                        title: 'success!',
                        html: result.msg,
                        icon: result.status,
                        heightAuto: false,
                        showConfirmButton: false,
                        timer: 1500,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                        // confirmButtonText: "เข้าสู่ระบบ",
                    }).then(function (result) {
                        window.location.href = "./"
                    })
                }
                else if (result.status == "warning") {
                    Swal.fire({
                        title: 'แจ้งเตือน!',
                        html: result.msg,
                        icon: result.status,
                        heightAuto: false,
                        confirmButtonText: "OK",
                    }).then(function (result) {
                        if (result.isConfirmed) {
                            $("#spinner-div").fadeIn(500);
                            $.ajax({
                                type: "post",
                                url: "./ajax/ajax_renew_otp_login.php",
                                success: function (response) {
                                    let result2 = JSON.parse(response);
                                    if (result2.status == "success") {
                                        $("#spinner-div").hide();
                                        window.location.href = "./?page=register&function=verify_email"
                                        // window.location.href = "./?page=register&function=verify_email"
                                    }
                                }
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'ล้มเหลว!',
                        html: result.msg,
                        icon: result.status,
                        heightAuto: false,
                        // backdrop: false
                    });
                }

            }
        });
    });
});

// ปุ่ม log out
$(document).ready(function () {
    $('#logout-btn').click(function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to log out?",
            icon: 'question',
            showCancelButton: true,
            heightAuto: false,
            confirmButtonText: 'Yes, Log out!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "./ajax/ajax_logout.php",
                    success: function (data) {
                        let result = JSON.parse(data);
                        if (result.status == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Log out success',
                                showConfirmButton: false,
                                heightAuto: false,
                                timer: 1200
                            }).then(() => {
                                window.location.href = "./"
                            })
                        }
                    }
                });

            }
        })
    });
});

$(document).ready(function () {
    $('#profil-detail-update-form').submit(function (e) {
        e.preventDefault();
        let formUrl = $(this).attr("action");
        let Method = $(this).attr("method");
        let formData = $(this).serialize();
        $.ajax({
            type: Method,
            url: formUrl,
            data: formData,
            success: function (response) {
                console.log("profil-detail-update-form :" + response);
                if (response == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'ข้อมูลอัพเดตแล้ว',
                        heightAuto: false,
                        showConfirmButton: false
                    })
                } else if (response == "error") {
                    Swal.fire({
                        icon: 'warning',
                        title: 'อัพเดตไม่สำเร็จ',
                        heightAuto: false,
                        showConfirmButton: false
                    })
                }
            }
        });

    });
});

$(document).ready(function () {
    $("#product-upload").submit(function (e) {
        e.preventDefault();
        let Method = $(this).attr("method");
        let formUrl = $(this).attr("action");
        let formData = new FormData(this);
        $.ajax({
            type: Method,
            url: formUrl,
            data: formData,
            processData: false,  // ไม่ต้องประมวลผลข้อมูล
            contentType: false,  // ไม่ต้องตั้งค่า content type
            success: function (response) {
                console.log(response);
            }
        });
    });
});

$(document).ready(function () {
    $('.product-image-thumb').on('click', function () {
        var $image_element = $(this).find('img')
        $('.product-image').prop('src', $image_element.attr('src'))
        $('.product-image-thumb.active').removeClass('active')
        $(this).addClass('active')
    })
})




$(document).ready(function () {
    // เมื่อคลิกที่ icon
    $(".fav_star_icon").click(function () {
        // ตรวจสอบสถานะของ icon
        let isFavorite = $(this).hasClass("bi-star");
        let pd_id = $(this).data("pd-id"); // รับค่า pd_id จาก PHP
        console.log("dwad");
        $.ajax({
            type: "POST",
            url: "./ajax/ajax_fav.php",
            data: { pd_id: pd_id },
            success: function (data) {
                let result = JSON.parse(data);
                // ตรวจสอบสถานะที่ส่งกลับจาก PHP
                if (result.status === "fav_add") {
                    console.log("fav_add");
                    // ถ้าเพิ่มสินค้าโปรด
                    if (isFavorite) {
                        // ถ้าเป็นสถานะ 'bi-star' ให้เปลี่ยนเป็น 'bi-star-fill'
                        $(".fav_star_icon").removeClass("bi-star").addClass("bi-star-fill");
                    }
                } else if (result.status === "fav_remove") {
                    console.log("fav_remove");
                    // ถ้าลบสินค้าโปรด
                    if (!isFavorite) {
                        // ถ้าเป็นสถานะ 'bi-star-fill' ให้เปลี่ยนเป็น 'bi-star'
                        $(".fav_star_icon").removeClass("bi-star-fill").addClass("bi-star");

                    }
                } else if (result.status === "own_product") {
                    Swal.fire({
                        icon: 'warning',
                        title: result.msg,
                        showConfirmButton: false,
                        heightAuto: false,
                        timer: 2750
                    })
                }else if (result.status === "error") {
                    Swal.fire({
                        icon: 'error',
                        title: result.msg,
                        showConfirmButton: false,
                        heightAuto: false,
                        timer: 2750
                    })
                }else if(result.status === "no_login"){
                    Swal.fire({
                        icon: 'warning',
                        title: result.msg,
                        showConfirmButton: false,
                        heightAuto: false,
                        timer: 1600
                    })
                }
            }
        });
    });
});