<?php 
    try {
        include("../include/connect.inc.php");
    
        $companyName = $_POST['companyName'];
        $sqlInsert = "INSERT INTO company (companyName) VALUES ('$companyName')";
        $qInsert = $conn->query($sqlInsert);
        if($qInsert){
            echo json_encode("1");
        }else{
            echo json_encode("0"); 
        }
    } catch (\Throwable $th) {
        echo $th;
    }

?>