<?php  
try {
    include("../include/connect.inc.php");

    $companyId = $_POST['companyId'];
    $sqlEdit = "SELECT * FROM company WHERE companyId='$companyId'";
    $qEdit = $conn->query($sqlEdit);
    $dataEdit = $qEdit->fetch_object();
} catch (\Throwable $th) {
    echo $th;
}
    
?>
<input type="text" class="form-control my-4" placeholder="ชื่อสาขา" id="companyName" value="<?php echo $dataEdit->companyName ?>" id="name"> 
<button class="btn btn-success" id="submitEdit" data-id="<?php echo $companyId ?>">ยืนยัน</button>