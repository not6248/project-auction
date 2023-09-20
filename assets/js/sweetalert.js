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
                    // console.log("warning");
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
                    }).then(() => {
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
                    }).then(() => {
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

// ปุ่ม Update ข้อมูล profil
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
                        showConfirmButton: false,
                        timer: 1200
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

//* เพิ่มสินค้า 
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
                    let result = JSON.parse(data);
                    if (result.status == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: result.msg,
                            showConfirmButton: false,
                            heightAuto: false,
                            timer: 1500
                        }).then(() => {
                            window.location.href = "./?page=profile&subpage=product"
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

//ปุ่ม Update ข้อมูลสินค้า
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


//ปุ่ม Fav สลับดาว และ นำการเพิ่มข้อมูลใส่ภายในฐานข้อมูล
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
                } else if (result.status === "warning") {
                    Swal.fire({
                        icon: result.status,
                        title: result.msg,
                        heightAuto: false,
                    })
                } else if (result.status === "error") {
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
    $('#seller_product_list').on('click', '.product-del-btn', function (e) {
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

//ปุ่มประมูลสินค้า
$(document).ready(function () {
    $("#bid-form").submit(function (e) {
        e.preventDefault();
        let Method = $(this).attr("method");
        let formUrl = $(this).attr("action");
        let pd_id = $(this).data("pd-id");
        let pd_price_chack = $(this).data("pd-price-chack");
        let formData = $(this).serialize();
        console.log(pd_id);
        console.log(formData);
        let priceOfferValue = $(this).find('[name="price-offer"]').val();
        let price = priceOfferValue * 10;

        Swal.fire({
            title: 'Are you sure?',
            html: "The price you offer is : <b>" + price + " ฿</b><br>You won't be able to revert this!",
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Yes, that's correct.",
            showCancelButton: true,
            heightAuto: false
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: Method,
                    url: formUrl,
                    data: {
                        price_offer: price,
                        pd_id: pd_id,
                        pd_price_chack: pd_price_chack
                    },
                    success: function (data) {
                        let result = JSON.parse(data);
                        let status = result.status;
                        console.log(status);
                        switch (status) {
                            case "success":
                                Swal.fire({
                                    icon: result.status,
                                    title: result.msg,
                                    heightAuto: false,
                                    showConfirmButton: false,
                                    timer: 1500,
                                }).then(() => {
                                    location.reload();
                                });
                                break;
                            case "warning":
                                Swal.fire({
                                    icon: result.status,
                                    title: result.msg,
                                    heightAuto: false,
                                })
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
            }
        })
    });
});


//ปุ่ม Upload บัตร ปชช
$(document).ready(function () {
    $("#add_id_card_img_form").submit(function (e) {
        e.preventDefault();
        let Method = $(this).attr("method");
        let formUrl = $(this).attr("action");
        let formData = new FormData(this);
        console.log(Method);
        // console.log(formUrl);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            heightAuto: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, upload now!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: Method,
                    url: formUrl,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
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
                                    location.reload();
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
            }
        })
    });
});

//ปุ่มอัพโหลดสลีป
$(document).ready(function () {
    $("#pay_slip_img_form").submit(function (e) {
        e.preventDefault();
        let Method = $(this).attr("method");
        let formUrl = $(this).attr("action");
        let formData = new FormData(this);
        let pd_id = $(this).data("pd-id");

        // เพิ่ม pd_id เข้า formData
        formData.append('pd_id', pd_id);


        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            heightAuto: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, upload now!'
        }).then((result) => {
            if (result.isConfirmed) {
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
                                    location.reload();
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
            }
        })
    });
});

//ปุ่มเพิ่มเลขพัสดุ
$(document).ready(function () {
    $("#tk_form").submit(function (e) { 
        e.preventDefault();
        let Method = $(this).attr("method");
        let formUrl = $(this).attr("action");
        let formData = $(this).serialize();
        const urlParams = new URLSearchParams(window.location.search);
        const order_id = urlParams.get('order_id');

        // เพิ่ม order_id เข้า formData
        formData += '&order_id=' + order_id;

        Swal.fire({
            title: 'คุณแน่ใจหรือไม่?',
            text: "คุณจะไม่สามารถย้อนกลับสิ่งนี้ได้!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่!',
            cancelButtonText: 'ยกเลิก'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: Method,
                    url: formUrl,
                    data: formData,
                    success: function (response) {
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
                                    location.reload();
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
            }
          })
    });
});