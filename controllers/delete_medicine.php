<?php
include 'connections.php';

$medID = $_POST['medID'];

if (!isset($medID) || empty($medID)) {
    echo json_encode(['status' => 'error', 'message' => 'Medicine ID is required']);
    exit;
}

try {
    // Start transaction
    $conn->begin_transaction();
    $stmt = $conn->prepare("DELETE FROM medicines WHERE id = ?");
    $stmt->bind_param("i", $medID);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Commit if successful
        $conn->commit();
        echo json_encode(['status' => 'success', 'message' => 'Medicine deleted successfully']);
    } else {
        // Rollback if no rows affected
        $conn->rollback();
        echo json_encode(['status' => 'error', 'message' => 'Medicine not found']);
    }

    $stmt->close();
} catch (Exception $e) {
    // Rollback on any error
    if ($conn->connect_errno === 0) {
        $conn->rollback();
    }
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}

$conn->close();