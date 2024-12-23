<?php
include 'connections.php';

$med_query = "SELECT medicines.id as medID, med_name, cate_id, stock_num, price, cate_medic.cate_name as category
FROM medicines
JOIN cate_medic
ON medicines.cate_id = cate_medic.id
ORDER BY medicines.id DESC";

$med_result = $conn->query($med_query);

$medic_query = "SELECT * FROM medicines";

$medic_result = $conn->query($medic_query);

if ($medic_result->num_rows > 0) {
    while ($row = $medic_result->fetch_assoc()) {
        $medicines[] = $row;
    }
} else {
    $medicines = [];
}

