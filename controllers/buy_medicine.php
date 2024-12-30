<?php
include 'connections.php';

$cus = $_POST['selcustomer_name'];
$med = $_POST['selmed_name'];
$staff = $_POST['staffmod_name'];
$quantity = $_POST['buy_num_of_purchase'];
$price = $_POST['buy_price'];
$staff_id = //butang diri ang data gikan sa imong giappebd sa formdata
// iapil diri ang staff_id nga imong gi append sa formdata

if (!isset($cus) || !isset($med) || !isset($quantity) || !isset($staff) || !isset($price)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Missing Data!']);
    exit;
}

try {
    // Start transaction
    $conn->begin_transaction();
    $current_date = date('Y-m-d H:i:s');

    $checkStock = $conn->prepare("SELECT stock_num FROM medicines WHERE id = ?");
    $checkStock->bind_param("i", $med);
    $checkStock->execute();
    $result = $checkStock->get_result();
    $currentStock = $result->fetch_assoc()['stock_num'];

    // Check if resulting stock would be negative
    if ($currentStock < $quantity) {
        http_response_code(400); // Set HTTP error code for AJAX error handling
        echo json_encode([
            'status' => 'error',
            'message' => 'Insufficient stock. Current stock: ' . $currentStock
        ]);
        exit();
    }

    // iapil ang created_by, created_at sa insert statement
    // gamita ang $current_date nga variable sa created_at
    // gamita ang staff_id nga variable sa created_by
    $stmt = $conn->prepare("INSERT INTO purchases (prem_cus_id, med_id, staff_id, num_purchase, total_price) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiid", $cus, $med, $staff, $quantity, $price);
    $stmt->execute();

    $stmt2 = $conn->prepare("UPDATE medicines SET stock_num = stock_num - ? WHERE id = ?");
    $stmt2->bind_param("ii", $quantity, $med);
    $stmt2->execute();

    if ($stmt->affected_rows > 0) {
        // Commit if successful
        $conn->commit();
        echo json_encode(['status' => 'success', 'message' => 'Medicine bought successfully']);
    } else {
        // Rollback if no rows affected
        $conn->rollback();
        http_response_code(400); // Set HTTP error code for AJAX error handling
        echo json_encode(['status' => 'error', 'message' => 'Contact your Administrator']);
    }

    $stmt->close();
} catch (Exception $e) {
    // Rollback on any error
    if ($conn->connect_errno === 0) {
        $conn->rollback();
    }
    http_response_code(500); // Set HTTP error code for AJAX error handling
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}
