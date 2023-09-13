<?php 
//ข้อความสภาพสินค้า
$pd_condition_arr = array(
    "0" => "ไม่เคยใช้",
    "1" => "เหมือนใหม่",
    "2" => "มีตำหนิเล็กน้อย",
    "3" => "เก่า",
    "4" => "เสียหาย");

//ข้อความสถานะต่างๆของการประมูล
$status_name_arr = array(
    "1" => ["b" => "รอการชำระเงิน",            "s" => "รอลูกค้าชำระเงิน"],
    "2" => ["b" => "ชำระแล้วรอผู้ลงสินค้าส่งสินค้า", "s" => "รอการจัดส่งสินค้า "],
    "3" => ["b" => "กำลังส่งสินค้า",             "s" => "อยู่ระหว่างจัดส่งและรอการยืนยันจากลูกค้า"],
    "4" => ["b" => "ได้รับสินค้าแล้ว",            "s" => "ลูกค้าได้รับสินค้าแล้ว"],
    "5" => ["b" => "ไม่ได้รับสินค้า",             "s" => "ลูกค้าไม่ได้รับสินค้า"],
    "6" => ["b" => "ไม่ได้รับสินค้า",             "s" => "ลูกค้าไม่ได้รับสินค้า"],
    "7" => ["b" => "รายการนี้ไม่สมบูรณ์เนื่องจากลูกค้าไม่ได้รับสินค้า"],
);

// order_status_name_arr
$os_name_arr = [
    "0" => "ยังไม่เริ่มประมูล",
    "1" => "กำลังประมูล",
    "2" => "จบการประมูล", 
    "3" => "ไม่มีผู้ประมูล", 
    "4" => "ลูกค้าไม่อัพโหลดสลีปตามเวลา", 
];
//ข้อความสถานะต่างๆ
$service_fee = 15;
?>