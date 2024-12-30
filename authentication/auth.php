<?php
include 'C:\xampp\htdocs\joshua_php\controllers\connections.php';

$username = $_POST['uname'];
$pass = $_POST['pword'];



if (!isset($username) || !isset($pass)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Missing Input!']);
    exit;

}

$verquery="SELECT * FROM staffs WHERE username = '$username' AND password = '$pass'";
$result = $conn->query($verquery);
  if ($result == null || $result->num_rows == 0 || !$result) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid Username or Password']);
    exit; 
// header("Location: /index.php");
  }
else {  
    echo json_encode(['status' => 'success', 'message' => 'Login Successful']);
}



