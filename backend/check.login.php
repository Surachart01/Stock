<?php
    session_start();
    include("../include/connect.inc.php");
    $email = $_POST['email'];
    if(isset($_POST['password'])){
        $password = $_POST['password'];
        $sql = "SELECT * FROM member WHERE email='$email' AND password='$password'";
        $qSql = $conn->query($sql);
        $rSql = $qSql->num_rows;

        if($rSql == 1){
            $dataUser = $qSql->fetch_object();
            $_SESSION['User'] = $dataUser;
            echo json_encode("9");
        }else{
            echo json_encode("0");
        }
    }

    if(isset($_POST['gId'])){
        $gId = $_POST['gId'];
        $sql = "SELECT * FROM member WHERE email='$email'";
        $qSql = $conn->query($sql);
        $rSql = $qSql->num_rows;

        if($rSql == 1){
            $dataUser = $qSql->fetch_object();
            $_SESSION['User'] = $dataUser;
            echo json_encode($dataUser->status);
        }else{
            echo json_encode("0");
        }
    }
    

    

?>