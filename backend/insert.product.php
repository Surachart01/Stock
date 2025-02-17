<?php 
 include("../include/connect.inc.php");
 session_start();
 $user = $_SESSION['User'];
 $productName = $_POST['productName'];
 $price = $_POST['price'];
 $description = $_POST['description'];

 $sqlIn = "INSERT INTO product (productName,price,description,companyId) VALUES ('$productName','$price','$description','$user->companyId')";
 $qIn = $conn->query($sqlIn);
 if($qIn){
    echo json_encode("1");
 }else{
    echo json_encode("0");
 }
?>