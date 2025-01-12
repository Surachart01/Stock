<?php  
    include("../include/connect.inc.php");

    $productId = $_POST['productId'];
    $sqlDelLog ="DELETE FROM stock WHERE productId ='$productId'";
    $sqlPro = "DELETE FROM product WHERE id='$productId'";
    $qDelLog = $conn->query($sqlDelLog);
    $qPro = $conn->query($sqlPro);

    if($qPro){
        echo json_encode("1");
    }else{
        echo json_encode("0"); 
    }
?>