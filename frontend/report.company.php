<?php
include("../include/connect.inc.php");
session_start();
if (isset($_POST['companyId'])) {
    $companyId = $_POST['companyId'];
} else {
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
                    <th scope="col">พนักงาน</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">จำนวน</th>
                    <th scope="col">จำนวนสินค้าคงเหลือ</th>
                    
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
    $sqlUser = "SELECT * FROM member WHERE memId = '$data->userId'";
    $qUser = $conn->query($sqlUser);
    $dataUser = $qUser->fetch_object();
?>

    <tr>
        <td scope="row"><?php echo $i; ?></td>
        <td><?php echo $dataPro->productName; ?></td>
        <td><?php echo $data->date; ?></td>
        <td><?php echo $dataUser->firstname; ?></td>
        <td>
            <?php
            if ($data->status == 'up') {
                echo '<span style="color: green; font-size: 1em;">เพิ่มสินค้า</span>';
            } elseif ($data->status == 'down') {
                echo '<span style="color: red; font-size: 1em;">ขายสินค้า</span>';
            } else {
                echo $data->status;
            }
            ?>
        </td>
        <td><?php echo $data->qty; ?> ชิ้น</td>
        <td><?php echo $data->stockTotal; ?> ชิ้น</td>
        
        
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