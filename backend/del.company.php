<?php  
    include("../include/connect.inc.php");

    $companyId = $_POST['companyId'];
    $sqlDel = "DELETE FROM company WHERE companyId='$companyId'";
    $qDel = $conn->query($sqlDel);
    if($qDel){
        echo json_encode("1");
    }else{
        echo json_encode("0"); 
    }
?>