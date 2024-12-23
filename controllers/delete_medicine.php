<?php
include 'connections.php';

$medID = $_POST['medID'];

if (!isset($medID) || empty($medID)) {
    echo json_encode(['status' => 'error', 'message' => 'Medicine ID is required']);
    exit;
}

try {
    $stmt = $conn->prepare("DELETE FROM medicines WHERE id = ?");
    $stmt->bind_param("i", $medID);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(['status' => 'success', 'message' => 'Medicine deleted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Medicine not found']);
    }

    $stmt->close();
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}

$conn->close();