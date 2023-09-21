<?php 

function echoJson_status_msg($status, $msg)
{
    echo json_encode(array("status" => $status, "msg" => $msg));
    exit();
}
// Order Show สถานะ Order ที่แสดงให้ลูกค้าดู
function os_sts_user($os_id,$os_name_arr){
    if($os_id > 3){
        return $os_name_arr[3];
    }else{
        return $os_name_arr[$os_id];
    }
}

function order_profile_status($arr,$pay_status,$dlv_status,$u_type){
        if($pay_status < 3){
            return $arr[0][$u_type];
        }elseif($pay_status == 3 && $dlv_status == 0){
            return $arr[1][$u_type];
        }elseif($pay_status == 3 && $dlv_status == 1){
            return $arr[2][$u_type];
        }elseif($pay_status == 3 && $dlv_status == 2){
            return $arr[3][$u_type];
        }elseif($pay_status == 4 && $dlv_status == 2){
            return $arr[6];
        }
}
?>