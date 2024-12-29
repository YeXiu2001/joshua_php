<?php
header('Content-Type: application/json');
include 'connections.php';

$medID = $_GET['medID'];

if (!$medID) {
    echo json_encode(['status' => 'error', 'message' => 'Medicine ID is required']);
    exit;
}

try {
    $stmt = $conn->prepare("SELECT * FROM medicines WHERE id = ?");
    $stmt->bind_param("i", $medID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $med_data = $result->fetch_assoc();
        echo json_encode(['status' => 'success', 'data' => $med_data]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Medicine not found']);
    }

    $stmt->close();
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
} finally {
    if ($conn) {
        $conn->close();
    }
}