<?php
if (mail('not-6248@hotmail.com', 'ทดสอบนะครับ', 'Mail Sender ของ Laragon ใช้ง่ายมาก', 'From: ข้อความระบบ <com40190boy@gmail.com>')) {
    echo 'ส่งสำเร็จ';
} else {
    echo 'เน่า';
}
