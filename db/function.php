<?php 

function echoJson_status_msg($status, $msg)
{
    echo json_encode(array("status" => $status, "msg" => $msg));
    exit();
}

function os_sts_user($os_id,$os_name_arr){
    if($os_id > 3){
        return $os_name_arr[3];
    }else{
        return $os_name_arr[$os_id];
    }
}
?>