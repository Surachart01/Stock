<?php
include("../include/connect.inc.php");
$companyId = $_POST['companyId'];
$sqlPro = "SELECT * FROM product WHERE companyId = '$companyId'";
$qPro = $conn->query($sqlPro);
?>
<thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">ชื่อสินค้า</th>
        <th scope="col">ราคาสินค้า</th>
        <th scope="col"></th>

    </tr>
</thead>
<tbody id="contentTable">
    <?php
    $i = 1;
    while ($data = $qPro->fetch_object()) { ?>
        <tr>
            <td>
                <?php echo $i ?>
            </td>
            <td>
                <?php echo $data->productName; ?>
            </td>
            <td>
                <?php echo $data->price ?>
            </td>
            <td><?php if ($user->status == 5) { ?>
                    <button class="btn btn-warning" data-id="<?php echo $data->id ?>"
                        id="productEdit">แก้ไข</button>
                    <button class="btn btn-danger" data-id="<?php echo $data->id ?>"
                        id="productDel">ลบ</button>
                <?php } ?>
            </td>
        </tr>
    <?php

        $i++;
    }
    ?>
</tbody>