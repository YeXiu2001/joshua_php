<?php
include 'connections.php';

$staffs_query= 'SELECT * FROM staffs';

$staff_result = $conn->query($staffs_query);

if ($staff_result->num_rows > 0) {
    while ($row = $staff_result->fetch_assoc()) {
        $staffs[] = $row;
    }
} else {
    $staffs = [];
}