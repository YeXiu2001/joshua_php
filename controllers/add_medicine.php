<?php
include 'connections.php';

$med_name = $_POST['med_name'];
$cate_id = $_POST['addmodal_cat'];
$stock_num = $_POST['stock_num'];
$price = $_POST['price'];
$staffid = $_POST['msid'];
$cdate = date('Y-m-d H:i:s');

if (!isset($med_name) || !isset($cate_id) || !isset($stock_num) || !isset($price) || !isset($staffid)) {
    echo json_encode(['status' => 'error', 'message' => 'Missing Data!']);
    exit;
}

try {
    // Start transaction
    $conn->begin_transaction();
    $stmt = $conn->prepare("INSERT INTO medicines (med_name, cate_id, stock_num, price, created_by, created_at) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siidis", $med_name, $cate_id, $stock_num, $price, $staffid, $cdate);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Commit if successful
        $conn->commit();
        echo json_encode(['status' => 'success', 'message' => 'Medicine added successfully']);
    } else {
        // Rollback if no rows affected
        $conn->rollback();
        echo json_encode(['status' => 'error', 'message' => 'Medicine not added']);
    }

    $stmt->close();
} catch (Exception $e) {
    // Rollback on any error
    if ($conn->connect_errno === 0) {
        $conn->rollback();
    }
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}

