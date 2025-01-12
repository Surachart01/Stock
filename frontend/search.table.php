<?php
    include("../include/connect.inc.php");
    $like = $_POST['like'];
    if($like == " "){
        $sqlSearch = "SELECT * FROM product LIMIT 25";
    
    }else{
        $sqlSearch = "SELECT * FROM product WHERE productName LIKE '$like%'";
    }
    
    $qSearch = $conn->query($sqlSearch);
    $i = 1;
    while($data = $qSearch->fetch_object()){?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $data->productName; ?></td>
            <td><?php echo $data->price ?></td>
            <td><button class="btn btn-warning" data-id="<?php echo $data->id ?>" id="productEdit">แก้ไข</button></td>
        </tr>
        
<?php $i++;
  }
?>