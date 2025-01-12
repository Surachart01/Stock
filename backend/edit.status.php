<?php  
    include("../include/connect.inc.php");
    session_start();
    $user = $_SESSION['User'];
    $change = $_POST['change'];
    $memId = $_POST['memId'];

    $sqlChange = "UPDATE member SET status='$change' WHERE memId='$memId'";
    $qChange = $conn->query($sqlChange);
    if($qChange){
        echo json_encode("1");
    }else{
        echo json_encode("0");
    }
?>