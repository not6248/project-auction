function data_tb_th(ID) {
    $(ID).DataTable({
        fixedHeader: true,
        "responsive": true,
        "autoWidth": false,
        language: {
            "decimal": "",
            "emptyTable": "ไม่มีข้อมูลในตาราง",
            "info": "กำลังแสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
            "infoEmpty": "กำลังแสดง 0 ถึง 0 จาก 0 รายการ",
            "infoFiltered": "<br>(กรองจากทั้งหมด _MAX_ รายการ)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "แสดง _MENU_ รายการ",
            "loadingRecords": "กำลังโหลด...",
            "processing": "",
            "search": "ค้นหา:",
            "zeroRecords": "ไม่พบบันทึกที่ตรงกัน",
            "paginate": {
                "first": "อันดับแรก",
                "last": "ล่าสุด",
                "next": "ต่อไป",
                "previous": "ก่อนหน้า"
            },
            "aria": {
                "sortAscending": ": เปิดใช้งานเพื่อจัดเรียงคอลัมน์จากน้อยไปมาก",
                "sortDescending": ": เปิดใช้งานเพื่อจัดเรียงคอลัมน์จากมากไปน้อย"
            }
        }
    })
}