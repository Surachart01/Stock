<?php
include("../include/connect.inc.php");
session_start();
if(isset($_POST['companyId'])){
    $companyId = $_POST['companyId'];
}else{
    $companyId = $_SESSION['User']->companyId;
}
$companyId = $_POST['companyId'];
$user = $_SESSION['User'];
$year = $_POST['year'];
$month = str_pad($_POST['month'], 2, "0", STR_PAD_LEFT);

$date = $year . "-" . $month;
$sDate = $date . "%";

?>

<div class="card">
    <div class="card-header">
        <h4>รายงานของ <?php echo $date; ?></h4>
    </div>
    <div class="card-body">
        <table class="table" id="tableCompany">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ชื่อสินค้า</th>
                    <th scope="col">วันที่</th>
                    <th scope="col">เวลา</th>
                    <th scope="col">จำนวน</th>
                    <th scope="col">สถานะ</th>

                </tr>
            </thead>
            <tbody>
    </div>
</div>




<?php
$sqlSel = "SELECT * FROM log WHERE date LIKE '$sDate' AND companyId='$companyId'";
$qSel = $conn->query($sqlSel);
$i = 1;
while ($data = $qSel->fetch_object()) {
    $sqlPro = "SELECT * FROM product WHERE id='$data->productId'";
    $qPro = $conn->query($sqlPro);
    $dataPro = $qPro->fetch_object();
?>

    <tr>
        <td scope="row"><?php echo $i ?></td>
        <td><?php echo $dataPro->productName; ?></td>
        <td><?php echo $data->date; ?></td>
        <td><?php echo $data->time; ?></td>
        <td><?php echo $data->qty; ?></td>
        <td>
            <?php 
            if ($data->status == 'up') {
                echo '<span style="color: green; font-size: 2em;">↑</span>';
            } elseif ($data->status == 'down') {
                echo '<span style="color: red; font-size: 2em;">↓</span>';
            } else {
                echo $data->status;
            }
            ?>
        </td></td>
    </tr>
<?php
    $i++;
}
?>
</tbody>
</table>

<script>
    $(document).ready(function() {
        let table = new DataTable('#tableCompany');

    })
</script>