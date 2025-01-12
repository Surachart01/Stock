<?php
    session_start();
    $user = $_SESSION['User'];
    include("../include/connect.inc.php");
    $like = $_POST['like'];
    if($like == ""){
        $sqlInUp = "SELECT * FROM stock LIMIT 25";
        $qInUp = $conn->query($sqlInUp);
        $i = 1;
            while($data = $qInUp->fetch_object()){ 
                $sqlPro = "SELECT * FROM product WHERE id='$data->productId'";
                $qPro = $conn->query($sqlPro);
                $dataPro = $qPro->fetch_object();
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $dataPro->productName; ?></td>
                    <td><?php echo $dataPro->price; ?></td>
                    <td><?php echo $data->qty; ?></td>
                    <?php  
                    if($user->status != 1){?>
                        <td><button class="btn btn-success" id="AddInUp" data-id="<?php echo $stockId ?>" data-productid="<?php echo $data->id; ?>">เพิ่ม</button></td>
                        <td><button class="btn btn-danger" id="DownInUp" data-id="<?php echo $stockId ?>" data-productid="<?php echo $data->id; ?>">ลด</button></td>
                    <?php } ?>
                </tr>
        <?php  
                                    
                                
      }
    }else{
        $sqlSearch = "SELECT * FROM product WHERE productName LIKE '$like%'";
        $qSearch = $conn->query($sqlSearch);
        $i = 1;
        while($data = $qSearch->fetch_object()){
            $sqlPro = "SELECT * FROM stock WHERE productId = '$data->id' AND companyId='$user->companyId'"; 
            $qPro = $conn->query($sqlPro);
            $dataStock = $qPro->fetch_object();
            $stockId = $dataStock->id;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data->productName; ?></td>
                <td><?php echo $data->price ?></td>
                <td><?php echo $dataStock->qty; ?></td>
                <?php  
                if($user->status != 1){?>
                    <td><button class="btn btn-success" id="AddInUp" data-id="<?php echo $stockId ?>" data-productid="<?php echo $data->id; ?>">เพิ่ม</button></td>
                    <td><button class="btn btn-danger" id="DownInUp" data-id="<?php echo $stockId ?>" data-productid="<?php echo $data->id; ?>">ลด</button></td>
                <?php } ?>
            </tr>
            
    <?php $i++;
      }
    }
    ?>
   