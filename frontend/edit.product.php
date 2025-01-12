<?php  
    include("../include/connect.inc.php");
    $productId = $_POST['productId'];
    $sql = "SELECT * FROM product WHERE id='$productId'";
    $qSql = $conn->query($sql);
    $data = $qSql->fetch_object();
?>

<label for="" class="form-label">ชื่อสินค้า</label>
<input type="text" class="form-control" id="productName" placeholder="ขิื่อสินค้า" value="<?php echo $data->productName ?>">
<input type="text" class="form-control my-3" id="price" placeholder="ราคาสินค้า" value="<?php echo $data->price ?>">
<input id="description" class="form-control mb-3" placeholder="รายละเอียดสินค้า" value="<?php echo $data->description ?>">
<button class="btn btn-success form-control" id="subEdit" data-id="<?php echo $productId; ?>">ยืนยัน</button>