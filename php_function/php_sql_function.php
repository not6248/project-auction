<?php
function InsertData($conn,$strTable, $strField, $strValue){
    $strSQL = "INSERT INTO $strTable ($strField) VALUES ($strValue) ";
    $result = mysqli_query($conn, $strSQL);
    
    if ($result) {
        return true;
    } else {
        return false;
    }
}
?>