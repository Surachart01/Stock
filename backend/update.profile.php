<?php  
try {
    include("../include/connect.inc.php");
    session_start();
    $userid = $_SESSION['User']->memId;
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

    $sqlUser = "UPDATE member SET firstname = '$firstName' , lastname = '$lastName' , email = '$email' WHERE memId = '$userid'";
    $qUser = $conn->query($sqlUser);
    if($qUser){
        $sqlSelect = "SELECT * FROM member WHERE memId = '$userid'";
        $qSelect = $conn->query($sqlSelect);
        $dataUser = $qSelect->fetch_object();
        $_SESSION['User'] = $dataUser;
        echo 1;
    }else{
        echo 0;
    }
} catch (\Throwable $th) {
    echo $th;
}
    

    
?>