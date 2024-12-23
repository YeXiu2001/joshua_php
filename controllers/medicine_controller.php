<?php
include 'connections.php';

$med_query = "SELECT medicines.id as medID, med_name, cate_id, stock_num, price, cate_medic.cate_name as category
FROM medicines
JOIN cate_medic
ON medicines.cate_id = cate_medic.id";

$med_result = $conn->query($med_query);
