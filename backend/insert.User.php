<?php  
    include("../include/connect.inc.php");
    session_start();
    $user = $_SESSION['User'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $companyId = $_POST['companyId'];
    $statusId = $_POST['statusId'];

    $sqlInUser = "INSERT INTO member (firstname,lastname,email,password,status,companyId) VALUES ('$firstname','$lastname','$email','$password','$statusId','$companyId')";
    $qInUser = $conn->query($sqlInUser);
    if($qInUser){
        echo json_encode("1");
    }else{
        echo json_encode("0");
    }
?>