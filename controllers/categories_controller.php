<?php
include 'connections.php';

$cat_q = "SELECT * FROM cate_medic";
$cat_result = $conn->query($cat_q);

if ($cat_result->num_rows > 0) {
    while ($row = $cat_result->fetch_assoc()) {
        $categories[] = $row;
    }
} else {
    $categories = [];
}