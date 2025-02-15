<?php 
    include("../include/connect.inc.php");
    date_default_timezone_set('Asia/Bangkok');
    session_start();
    $user = $_SESSION['User'];
    $companyId = $user->companyId;
    $option = $_POST['option'];
    $qty = $_POST['qty'];
    $productId = $_POST['productId'];
    $stockId = $_POST['stockId'];
    $date = date("Y-m-d");
    $time = date("H:i:s");
    if($stockId=="non" && $option == "up"){
        $sqlIn = "INSERT INTO stock (productId,qty,companyId) VALUES ('$productId','$qty','$companyId')";
        $qIn = $conn->query($sqlIn);
        if($qIn){
            $primaryStock = mysqli_insert_id($conn);
            $sqllog = "INSERT INTO log (stockId,productId,userId,companyId,date,time,qty,status,stockTotal) VALUES ('$primaryStock','$productId','$user->memId','$companyId','$date','$time','$qty','$option','$qty')";
            $qlog = $conn->query($sqllog);
            if($qlog){
                echo json_encode("1");
            }
        }else{
            echo json_encode("0");
        }
    }
    else{
        $sqlSel = "SELECT * FROM stock WHERE id='$stockId'";
        $qSel = $conn->query($sqlSel);
        $dataSel = $qSel->fetch_object();
        $dQty = $dataSel->qty;

        if($option == "up"){
            $total = $dQty+$qty;
        }
        if($option == "down"){
            $total = $dQty-$qty;
        }
        if($total<0){
            echo json_encode("0");
            exit();
        }
        $sqlUp = "UPDATE stock SET qty='$total' WHERE id='$stockId'";
        $qInUp = $conn->query($sqlUp);
        if($qInUp){
            $sqllog = "INSERT INTO log (stockId,productId,userId,companyId,date,time,qty,status,stockTotal) VALUES ('$stockId','$productId','$user->memId','$companyId','$date','$time','$qty','$option','$total')";
            $qlog = $conn->query($sqllog);
            if($qlog){
                echo json_encode("1");
            }
        }else{
            echo json_encode("0");
        }
    }
   
?>