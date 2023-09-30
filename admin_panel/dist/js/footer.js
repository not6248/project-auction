//เมื่อ upload ภาพ จะมีการ preview ให้ดู [MAIN]
$("#main-img-pd-input").change(function() {
    MianimagePreview(this);
});

function MianimagePreview(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function(event) {
            $('#main-preview').html('<img class="mb-3" src="' + event.target.result + '" width="200" height="200"/>');
        };
        fileReader.readAsDataURL(fileInput.files[0]);
    }
}

// ===============================================================

//เมื่อ upload ภาพ จะมีการ preview ให้ดู [SUB]
$("#sub-img-pd-input").change(function() {
    SubimagePreview(this);
});

function SubimagePreview(fileInput) {
    let previewContainer = $('#sub-preview');
    if (fileInput.files && fileInput.files.length > 0) {
        if (fileInput.files.length > 3) {
            Swal.fire({
                icon: 'error',
                title: 'You have exceeded the number of files selected.',
                text: 'Please select no more than 3 images.',
            });
            previewContainer.empty();
            let colDiv = $('<div>').addClass('col-3 mb-3');
            let img = $('<img>').attr('width', '200').attr('height', '200');
            colDiv.append(img);
            previewContainer.append(colDiv);
            fileInput.value = ''; // ล้างไฟล์ที่ถูกเลือก
            // <img class="mb-3" width="210" height="140">

            return;
        }

        previewContainer.empty(); // Clear previous previews

        for (let i = 0; i < fileInput.files.length; i++) {
            let fileReader = new FileReader();
            fileReader.onload = function(event) {
                // สร้าง <div class="col-3">
                let colDiv = $('<div>').addClass('col-3 mb-3');

                // สร้าง <img> และกำหนดคุณสมบัติ
                let img = $('<img>').attr('src', event.target.result).attr('width', '200').attr('height', '200');

                // เพิ่ม <img> ลงใน <div class="col-3">
                colDiv.append(img);

                // เพิ่ม <div class="col-3"> ลงใน previewContainer
                previewContainer.append(colDiv);
            };
            fileReader.readAsDataURL(fileInput.files[i]);
        }
    }
}

//ค่าบริการ
$(document).ready(function () {
    $(document).ready(function () {
        $('.toggle-switch').on('change', function () {
            $('.toggle-switch').prop('disabled', false); // ปิดการใช้งานทุกตัวก่อน
            $('.toggle-switch').prop('checked', false); // ยกเลิกการเลือกทุกตัวก่อน
            $(this).prop('checked', true); // เลือกตัวที่ถูกคลิก
            $(this).prop('disabled', true); // ปิดการใช้งานตัวที่ถูกเลือก
            let feeId = $(this).data('fee-id');
            console.log(feeId);
            $.ajax({
                type: "POST",
                url: "../ajax/ajax_fee_select.php",
                data: { fee_id: feeId },
                success: function (response) {
                    console.log(response);
                }
            });
        });
    });
});