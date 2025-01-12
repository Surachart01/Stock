<?php  
    include("../include/connect.inc.php");
    $sqlCompany = "SELECT * FROM company";
    $qCompany = $conn->query($sqlCompany);

    $sqlStatus = "SELECT * FROM status ";
    $qStatus = $conn->query($sqlStatus);
?>
<label for="" class="form-label">ชื่อ</label>
<input type="text" class="form-control" id="firstname">
<label for="" class="form-label">นามสกุล</label>
<input type="text" class="form-control" id="lastname">
<label for="" class="form-label">email</label>
<input type="email" class="form-control" id="email">
<label for="" class="form-label">password</label>
<input type="password" class="form-control" id="password1">
<label for="" class="form-label">confirm-password</label>
<input type="password" class="form-control" id="password2">
<label class="form-label">สาขา</label>
<select class="form-select form-select-lg" id="companyIdIn">
    <option selected>โปรดเลือกสาขา</option>
<?php while($dataCompany = $qCompany->fetch_object()){ ?>
        <option value="<?php echo $dataCompany->companyId ?>"><?php echo $dataCompany->companyName ?></option>
<?php 
} ?>
</select>

<label class="form-label">สถานะ</label>
<select class="form-select form-select-lg" id="statusId">
    <option selected>โปรดเลือก</option>
<?php while($dataStatus = $qStatus->fetch_object()){ ?>
        <option value="<?php echo $dataStatus->statusId ?>"><?php echo $dataStatus->statusName ?></option>
<?php 
} ?>
</select>

<button class="btn btn-success mt-2" id="subInUser">ยืนยัน</button>

