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

function update_status($conn){
    $result_query = mysqli_query($conn,"SELECT * FROM `product` WHERE NOW() >= pd_start_show_date AND pd_status = 0;");
    if($result_query){
        if(mysqli_num_rows($result_query) > 0){
            mysqli_query($conn,"UPDATE product SET pd_status = '2' WHERE NOW() >= pd_start_show_date AND pd_status = 0");
            mysqli_query($conn,"UPDATE order_tb
            JOIN product ON order_tb.order_id = product.pd_id
            SET order_tb.order_status = 1
            WHERE NOW() >= product.pd_start_show_date AND order_tb.order_status = 0;
            ");
        }else{
            // echo "Not Found";
        }
    }
    
    // mysqli_query($conn,);

}
?>