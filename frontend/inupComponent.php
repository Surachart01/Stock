<?php
include("../include/connect.inc.php");
session_start();
$user = $_SESSION['User'];
$companyId = $_POST['companyId'];

$sqlPro = "SELECT * FROM product WHERE companyId = '$companyId'";
$qPro = $conn->query($sqlPro);
?>

<table class="table" id="tableInUp">
    <thead>
        <th scope="col">#</th>
        <th scope="col">ชิ่อสินค้า</th>
        <th scope="col">ราคา</th>
        <th scope="col">จำนวนสินค้า</th>
        <th scope="col"></th>

    </thead>
    <tbody id="contentTable">
        <?php
        $i = 1;
        while ($data = $qPro->fetch_object()) {
            $sqlStock = "SELECT id,qty FROM stock WHERE companyId='$companyId' AND productId='$data->id'";
            $qStock = $conn->query($sqlStock);
            $rStock = $qStock->num_rows;
            if ($rStock == 0) {
                $totalQty = 0;
                $stockId = "non";
            } else {
                $dataStock = $qStock->fetch_object();
                $totalQty = $dataStock->qty;
                $stockId = $dataStock->id;
            }

        ?>
            <tr>
                <td>
                    <?php echo $i ?>
                </td>
                <td>
                    <?php echo $data->productName; ?>
                </td>
                <td>
                    <?php echo $data->price; ?>
                </td>
                <td>
                    <?php echo $totalQty; ?>
                </td>
                <td>
                    <?php if ($user->status == 5) { ?>
                        <button class="btn btn-success" id="AddInUp" data-id="<?php echo $stockId ?>"
                            data-productid="<?php echo $data->id; ?>">เพิ่ม</button>
                    <?php } ?>
                    <?php if ($user->status == 5 || $user->status == 1) { ?>
                        <button class="btn btn-danger" id="DownInUp" data-id="<?php echo $stockId ?>"
                            data-productid="<?php echo $data->id; ?>">ขาย</button>
                    <?php } ?>
                </td>


            </tr>
        <?php
            $i++;
        }
        ?>
    </tbody>
</table>