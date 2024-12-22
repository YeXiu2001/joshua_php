<?php
ob_start(); // Start output buffering

include 'controllers/medicine_controller.php';
?>

<div class="container">
    <h3 class="text-center">Simple Pharmacy System</h3>
    <div class="mt-3">
        <button class="btn btn-primary">Buy</button>
        <button class="btn btn-primary">Add Medicine</button>
    </div>
    <div class="mt-3">
    <table id="med_tbl" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Medicine</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($med_result as $row) {

                ?>
                <tr>
                    <td><?=$row['med_name'] ?></td>
                    <td><?=$row['category']?></td>
                    <td><?=$row['stock_num']?> pcs</td>
                    <td>&#8369;<?= number_format($row['price'], 2) ?></td>
                    <td>
                        <a href="#" style="margin-right: 10px;"><i class="fas fa-edit" style="color:red;"></i></a>
                        <a href="#"><i class="fas fa-trash" style="color:red;"></i></a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
   $(document).ready(function() {
    $('#med_tbl').DataTable({
        stripeClasses: ['odd', 'even'],
        responsive: true,
        pageLength: 10,
        order: [[0, 'asc']],
        classes: {
            stripe: true
        }
    });
});
</script>
<?php
$content = ob_get_clean();
include 'includes/app.php';