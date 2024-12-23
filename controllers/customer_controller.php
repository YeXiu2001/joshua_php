<?php
include 'connections.php';

$customer_query = "SELECT * FROM p_customers";
    
    $customer_result = $conn->query($customer_query);

    if ($customer_result->num_rows > 0) {
        while ($row = $customer_result->fetch_assoc()) {
            $customers[] = $row;
        }
    } else {
        $customers = [];
    }
