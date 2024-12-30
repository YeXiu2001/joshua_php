<?php
session_start();
// setup session here using the data staff id staff name
$staff_id = $_POST['staff_id'];
$staff_name = $_POST['staff_name'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['staff_id'] = $staff_id;
    $_SESSION['staff_name'] = $staff_name;
    echo json_encode(['success' => true]);
}else{
    echo json_encode(['error' => true]);
}