<?php
ob_start(); // Start output buffering

include 'controllers/medicine_controller.php';
include 'controllers/categories_controller.php';
include 'controllers/customer_controller.php';
?>

<div class="container">

    <h3 class="text-center">Simple Pharmacy System</h3>
    <div class="mt-3">
        <button class="btn btn-primary"onclick="show_buymedmodal()">Buy</button>
        <button class="btn btn-primary" onclick="show_buymedmodal()">Add Medicine</button>
        <button class="btn btn-secondary">View ERD</button>
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
                        <a data-editID="<?=$row['medID'] ?>" style="margin-right: 10px;" onclick="editmed(this)"><i class="fas fa-edit" style="color:red;"></i></a>
                        <a data-deleteID="<?=$row['medID'] ?>" onclick="deletemed(this)"> <i class="fas fa-trash" style="color:red;"></i> </a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- START modal for add medicine -->
    <div class="modal fade" id="addMedicineModal" tabindex="-1" aria-labelledby="addMedicineModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMedicineModalLabel">Add Medicine</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  
                    <form id="addMedForm" action="">
                        <div class="mb-3">
                            <label for="" class="form-label">Medicine</label>
                            <input type="text" class="form-control" id="med_name" name="med_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Category</label>
                            <select id="addmodal_cat" class="form-select select2" name="addmodal_cat" required>
                            <option value="">Select..</option>
                               <?php
                                    foreach ($categories as $row) {
                               ?>
                               <option value="<?=$row['id']?>"><?=$row['cate_name']?></option>
                               <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock_num" name="stock_num" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                        </div>
                        
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>          
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END modal for add medicine -->

        <!-- EDIT modal for add medicine -->
        <div class="modal fade" id="editMedicineModal" tabindex="-1" aria-labelledby="editMedicineModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMedicineModalLabel">Edit Medicine</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editMedForm" action="">
                        <div class="mb-3">
                            <label for="" class="form-label">Medicine</label>
                            <input type="text" class="form-control" id="edit_med_name" name="edit_ed_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Category</label>
                            <input type="text" class="form-control" id="edit_category" name="edit_category" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="edit_stock_num" name="edit_stock_num" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control" id="edit_price" name="edit_price" required>
                        </div>
                        
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>          
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- EDIT modal for add medicine -->
</div>


     <!-- Buy modal for add medicine -->
     <div class="modal fade" id="BuyModal" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buy Medicine</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="BuyModalForm" action="">
                        <div class="mb-3">
                            <label for="" class="form-label">Premium Customer's Name</label>
                            <select type="text" class="form-select" id="selcustomer_name" name="selcustomer_name" required>
                            <option value="">Select..</option>
                               <?php
                                    foreach ($customers as $row) {
                               ?>
                               <option value="<?=$row['id']?>"><?=$row['customer_name']?></option>
                               <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Medicine</label>
                            <select type="text" class="form-select" id="selmed_name" name="selmed_name" required>
                            <option value="">Select..</option>
                               <?php
                                    foreach ($medicines as $row) {
                               ?>
                               <option value="<?=$row['id']?>"><?=$row['med_name']?></option>
                               <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Number of Purchase</label>
                            <input type="number" class="form-control" id="buy_num_of_purchase" name="buy_num_of_purchase" value=1 required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control" id="buy_price" name="buy_price" required readonly>
                        </div>
                        
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>          
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- BUY modal for add medicine -->
</div>

<script>
    $(document).ready(function() {
        $('#addmodal_cat').select2({
            width: '100%',
            dropdownParent: $('#addMedicineModal')
        });
    });
</script>
<script>
   $(document).ready(function() {
        $('#med_tbl').DataTable({
            stripeClasses: ['odd', 'even'],
            responsive: true,
            pageLength: 10,
            order: [],
            classes: {
                stripe: true
            }
        });
});

function deletemed(el){
    let medID = $(el).attr('data-deleteID');

    swal.fire({
        title: 'Delete Medicine?',
        text: 'This cannot be undone',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'controllers/delete_medicine.php',
                method: 'POST',
                data: {
                    medID: medID
                },

                success: function(response){
                    swal.fire({
                        title: 'Medicine deleted',
                        text: 'The medicine has been successfully deleted',
                        icon: 'success'
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(err){
                    console.log(err.message);
                    swal.fire({
                        title: 'Error',
                        text: 'There was an error deleting the medicine',
                        icon: 'error'
                    });
                }

            });
        }
    })
}

function editmed(el){
    let edit_medID = $(el).attr('data-editID');

    $('#editMedicineModal').modal('show');
}

function show_addmedmodal(){
    $('#addMedForm')[0].reset();
    $('#addmodal_cat').val(null).trigger('change');
    $('#addMedicineModal').modal('show');
}

function show_buymedmodal(){
    $('#BuyModalForm')[0].reset();
    $('#selcustomer_name').val(null).trigger('change');
    $('#selmed_name').val(null).trigger('change');
    $('#BuyModal').modal('show');
}

$('#addMedForm').on('submit', function(e) {
    e.preventDefault();
    let addmedformdata = new FormData(this);
    console.log(...addmedformdata);
    $.ajax({
        url: 'controllers/add_medicine.php',
        method: 'POST',
        data: addmedformdata,
        processData: false, 
        contentType: false,
        success: function(response) {
            $('#addMedicineModal').modal('hide');
            swal.fire({
                title: 'Success',
                text: 'Medicine added successfully',
                icon: 'success'
            }).then(() => {
                location.reload();
            });
        },
        error: function(err) {
            console.log(err.message);
            swal.fire({
                title: 'Error',
                text: 'There was an error adding the medicine',
                icon: 'error'
            });
        }
    });
});

$('#buyMedForm').on('submit', function(e) {
    e.preventDefault();
    let addmedformdata = new FormData(this);
    console.log(...addmedformdata);
    $.ajax({
        url: 'controllers/add_medicine.php',
        method: 'POST',
        data: addmedformdata,
        processData: false, 
        contentType: false,
        success: function(response) {
            $('#buyMedicineModal').modal('hide');
            swal.fire({
                title: 'Success',
                text: 'Medicine added successfully',
                icon: 'success'
            }).then(() => {
                location.reload();
            });
        },
        error: function(err) {
            console.log(err.message);
            swal.fire({
                title: 'Error',
                text: 'There was an error adding the medicine',
                icon: 'error'
            });
        }
    });
});



</script>

<?php
$content = ob_get_clean();
include 'includes/app.php';