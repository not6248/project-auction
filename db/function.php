<?php 

function echoJson_status_msg($status, $msg)
{
    echo json_encode(array("status" => $status, "msg" => $msg));
    exit();
}

function os_sts_user($os_id,$os_name_arr){
    if(!($os_id > 0)){
        return $os_name_arr[0];
    }else{
        return $os_name_arr[1];
    }
}

// function update_status(){
//     mysqli_query($conn,"UPDATE product SET pd_status = '1' WHERE NOW() >= pd_start_show_date AND pd_status = 0");
//     // mysqli_query($conn,);

// }
?>