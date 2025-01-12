<?php 
    include("../include/connect.inc.php");
    session_start();
    $user = $_SESSION['User'];

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $memId = $_POST['memId'];

    $sqlUp = "UPDATE member SET firstname='$firstname',lastname='$lastname',email='$email' WHERE memId='$memId'";
    $qUp = $conn->query($sqlUp);
    if($qUp){
        echo json_encode("1");
    }else{
        echo json_encode("0");
    }
?>