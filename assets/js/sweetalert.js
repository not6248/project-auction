//สมัครสมาชิก
$(document).ready(function() {
    $("#registerForm").submit(function(e) {
        e.preventDefault();
        let Method = $(this).attr("method");
        let formUrl = $(this).attr("action");
        let formData = $(this).serialize();
        $("#spinner-div").fadeIn(500);
        $.ajax({
            type: Method,
            url: formUrl,
            data: formData,
            success: function(data) {
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
                    }).then(function(result) {
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
            complete: function() {
                // ซ่อน Spinners เมื่อเสร็จสิ้นการทำงานทุกกรณี
                $("#spinner-div").hide();
            }
        });
    });
});

//กรอก OTP
$(document).ready(function() {
    $("#otpForm").submit(function(e) {
        e.preventDefault();
        let Method = $(this).attr("method");
        let formUrl = $(this).attr("action");
        let formData = $(this).serialize();
        $.ajax({
            type: Method,
            url: formUrl,
            data: formData,
            success: function(data) {
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
                    }).then(function(result) {
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
$(document).ready(function() {
    $("#loginForm").submit(function(e) {
        e.preventDefault();
        let formUrl = $(this).attr("action");
        let Method = $(this).attr("method");
        let formData = $(this).serialize();
        $.ajax({
            type: Method,
            url: formUrl,
            data: formData,
            success: function(data) {
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
                }).then(function(result) {
                    window.location.href = "./"
                })
                }
                else if(result.status == "warning") {
                    Swal.fire({
                        title: 'แจ้งเตือน!',
                        html: result.msg,
                        icon: result.status,
                        heightAuto: false,
                        confirmButtonText: "OK",
                    }).then(function(result){
                        if (result.isConfirmed) {
                            $("#spinner-div").fadeIn(500);
                            $.ajax({
                                type: "post",
                                url: "./ajax/ajax_renew_otp_login.php",
                                success: function (response) {
                                    let result2 = JSON.parse(response);
                                    if(result2.status == "success"){
                                        $("#spinner-div").hide();
                                        window.location.href = "./?page=register&function=verify_email"
                                        // window.location.href = "./?page=register&function=verify_email"
                                    }
                                }
                            });
                        }
                    });
                }else {
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
            confirmButtonText: 'Yes, Log out!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "./ajax/ajax_logout.php",
                    success: function (data) {
                        let result = JSON.parse(data);
                        if(result.status == "success"){
                            Swal.fire({
                                icon: 'success',
                                title: 'Log out success',
                                showConfirmButton: false,
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