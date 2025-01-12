<?php 
 include("../include/connect.inc.php");
 $productName = $_POST['productName'];
 $price = $_POST['price'];
 $description = $_POST['description'];

 $sqlIn = "INSERT INTO product (productName,price,description) VALUES ('$productName','$price','$description')";
 $qIn = $conn->query($sqlIn);
 if($qIn){
    echo json_encode("1");
 }else{
    echo json_encode("0");
 }
?>