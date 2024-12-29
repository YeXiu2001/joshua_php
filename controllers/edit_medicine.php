<?php
header('Content-Type: application/json');
include 'connections.php';

$medname = $_POST['edit_med_name'];
$medcate = $_POST['edit_category'];
$medstock = $_POST['edit_stock_num'];
$medprice = $_POST['edit_price'];
$medID = $_POST['edit_med_id'];

try{
    $stmt = $conn->prepare("UPDATE medicines SET med_name = ?, cate_id = ?, stock_num = ?, price = ? WHERE id = ?");
    $stmt->bind_param("siidi", $medname, $medcate, $medstock, $medprice, $medID);
    $stmt->execute();

    if($stmt->affected_rows > 0){
        echo json_encode(['status' => 'success', 'message' => 'Medicine updated successfully']);
    }
}catch(Exception $e){
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}
