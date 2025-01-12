<?php 
    include("../include/connect.inc.php");
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $productId = $_POST['productId'];

    $sqlUp = "UPDATE product SET productName='$productName',price='$price',description='$description' WHERE id ='$productId'";
    $qUp = $conn->query($sqlUp);
    if($qUp){
        echo json_encode("1");
    }else{
        echo json_encode("0");
    }
?>