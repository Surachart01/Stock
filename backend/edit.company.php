<?php  
    try {
        include("../include/connect.inc.php");
    
        $companyId = $_POST['companyId'];
        $companyName = $_POST['companyName'];
        $sqlEdit = "UPDATE company SET companyName='$companyName' WHERE companyId='$companyId'";
        $qEdit = $conn->query($sqlEdit);
        if($qEdit){
            echo json_encode("1");
        }else{
            echo json_encode("0"); 
        }

    } catch (\Throwable $th) {
        echo $th;
    }
?>