<?php  
    include("../include/connect.inc.php");
    session_start();
    $user = $_SESSION['User'];
    $memId = $_POST['memId'];

    $sqlUser = "SELECT * FROM member WHERE memId='$memId'";
    $qUser = $conn->query($sqlUser);
    $dataUser = $qUser->fetch_object();

    $sqlCompany = "SELECT * FROM company WHERE companyId='$dataUser->companyId'";
    $qCompany = $conn->query($sqlCompany);
    $dataCompany = $qCompany->fetch_object();
?>

<div class="row">
    <div class="col-6">
        <input type="hidden" value="<?php  echo $memId; ?>" id="memId">
        <label for="" class="form-label">ขิ่อ</label>
        <input type="text" class="form-control mb-2" value="<?php echo $dataUser->firstname  ?>" id="firstname">
        <label for="" class="form-label">email</label>
        <input type="email" class="form-control" value="<?php echo $dataUser->email  ?>" id="email">

    </div>
    <div class="col-6">
        <label for="" class="form-label">นามสกุล</label>
        <input type="text" class="form-control mb-2" value="<?php echo $dataUser->lastname  ?>" id="lastname">
        <label for="" class="form-label">สาขา</label>
        <input type="text" disabled class="form-control" value="<?php echo $dataCompany->companyName  ?>" id="company">
    </div>
</div>
<div class="row">
    <button class="btn btn-success mt-3" id="btnSubEdit">ยืนยัน</button>
</div>
<hr>

<div class="row mt-4">
    <div class="col-12">
        <p>status : 
            <?php 
        if($dataUser->status == 1){echo 'user'; }else if($dataUser->status == 5){echo 'admin';}else{echo 'superAdmin';}
        ?></p>
    </div>
    <?php  
        if($dataUser->status == 9){
        
    ?>
    <div class="col-4"><button class="btn btn-primary w-100 " id="changeStatus" data-status="9" data-memid="<?php echo $memId ?>">SuperAdmin</button></div>
    <?php  }?>
    <div class="col-4"><button class="btn btn-primary w-100 " id="changeStatus" data-status="5" data-memid="<?php echo $memId ?>">Admin</button></div>
    <div class="col-4"><button class="btn btn-primary w-100 " id="changeStatus" data-status="1" data-memid="<?php echo $memId ?>">User</button></div>
</div>
<div class="row">
    <div class="col-12">
        <hr>
        <button class="btn btn-danger form-control mt-2" data-memid="<?php echo $memId; ?>" id="deluser">ลบผู้ใช้</button>
    </div>
</div>

<script>
    
</script>
