<?php 
    session_start();
    // unset($_SESSION['user_login']);
    // unset($_SESSION['username'] );
    session_unset();
    session_destroy();
    echo json_encode(array("status" => "success"));
;?>