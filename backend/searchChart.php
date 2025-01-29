<?php
include("../include/connect.inc.php");

$month = $_POST['month'] ?? date('Y-m'); // รับค่าจาก POST หรือใช้ค่าเริ่มต้นเป็นเดือนปัจจุบัน

$sqlCheck = "SELECT product.productName, 
                    SUM(CASE WHEN log.status = 'up' THEN log.qty ELSE 0 END) AS qtyIn, 
                    SUM(CASE WHEN log.status = 'down' THEN log.qty ELSE 0 END) AS qtyOut
             FROM log 
             INNER JOIN product ON product.id = log.productId 
             WHERE log.date LIKE '$month%'  -- ดึงข้อมูลเฉพาะเดือนที่เลือก
             GROUP BY product.productName";

$qCheck = $conn->query($sqlCheck);

$labels = [];
$up = [];
$down = [];

while ($item = $qCheck->fetch_object()) {
    $labels[] = $item->productName;
    $up[] = (int) $item->qtyIn;
    $down[] = (int) $item->qtyOut;
}

header('Content-Type: application/json'); // บอกให้ JS ทราบว่าเป็น JSON
echo json_encode(['dataLabels' => $labels, 'up' => $up, 'down' => $down]);
?>
