<?php 
    session_start();
    unset($_SESSION['user_login']);
    unset($_SESSION['username'] );
    session_destroy();
    echo json_encode(array("status" => "success"));
;?>