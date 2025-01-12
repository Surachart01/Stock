<?php 
    include("../include/connect.inc.php");
    $memId = $_POST['memId'];
    $sqlDel = "DELETE FROM member WHERE memId='$memId'";
    $qDel = $conn->query($sqlDel);
    if($qDel){
        echo json_encode("1");
    }else{
        echo json_encode("0");
    }
?>