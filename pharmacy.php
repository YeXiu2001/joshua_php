<?php
ob_start(); // Start output buffering

include 'controllers/medicine_controller.php';
include 'controllers/categories_controller.php';
include 'controllers/customer_controller.php';
include 'controllers/staff_names.php';
?>

<div class="container">

    <h3 class="text-center">Simple Pharmacy System</h3>
    <div class="mt-3">
        <button class="btn btn-primary"onclick="show_buymedmodal()">Buy</button>
        <button class="btn btn-primary" onclick="show_addmedmodal()">Add Medicine</button>
        <button class="btn btn-secondary" onclick="view_erd()">View ERD</button>
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
                        <!-- icon for edit -->
                        <a data-editID="<?=$row['medID'] ?>" style="margin-right: 10px;" onclick="editmed(this)"><i class="fas fa-edit" style="color:red;"></i></a>
                         <!-- icon for edit -->
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
                            <input type="text" class="form-control" id="edit_med_name" name="edit_med_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Category</label>
                            <select type="text" class="form-select" id="edit_category" name="edit_category" required>
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
                            <input type="number" class="form-control" id="edit_stock_num" name="edit_stock_num" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control" id="edit_price" name="edit_price" required>
                        </div>

                        <div hidden class="mb-3">
                            <label for="" class="form-label">Id</label>
                            <input type="text" class="form-control" id="edit_med_id" name="edit_med_id" readonly>
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
                               <option data-discount="<?=$row['discount']?>" value="<?=$row['id']?>"><?=$row['customer_name']?></option>
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
                               <option data-medPrice="<?=$row['price'] ?>" value="<?=$row['id']?>"><?=$row['med_name']?></option>
                               <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Staff Name</label>
                            <select type="text" class="form-select" id="staffmod_name" name="staffmod_name" required>
                            <option value="">Select..</option>
                               <?php
                                    foreach ($staffs as $row) {
                               ?>
                               <option value="<?=$row['id']?>"><?=$row['staff_name']?></option>
                               <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div  class="mb-3">
                            <label for="" class="form-label">Number of Purchase</label>
                            <input type="number" class="form-control" id="buy_num_of_purchase" name="buy_num_of_purchase" value=1 required >
                        </div>
                        <div class="text-end">
                            <span id="medp_span" class="fw-bold">Base Price: ₱0.00</span>
                        </div>

                        <div class="text-end">
                            <span id="medqty_span" class="fw-bold">Base Total:  ₱0.00</span>
                        </div>

                        <div class="text-end">
                            <span id="meddis_span" class="fw-bold">Discount(%): 0%</span>
                        </div>

                        <div class="text-end">
                            <span id="medprice_span" class="fw-bold">Total Price: ₱0.00</span>
                        </div>

                        <div  hidden class="mb-3">
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

    <!-- START modal for viewing medicine details -->
    <div class="modal fade" id="viewERDModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View ERD</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="assets/images/erd.png" alt="ERD" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END modal for viewing medicine details -->
</div>


<script>
    $(document).ready(function() {

        $('#staffmod_name').select2({
            width: '100%',
            dropdownParent: $('#BuyModal')
        });

        $('#addmodal_cat').select2({
            width: '100%',
            dropdownParent: $('#addMedicineModal')
        });

        $('#selcustomer_name, #selmed_name').select2({
            width: '100%',
            dropdownParent: $('#BuyModal')
        });

        $('#edit_category').select2({ //select id
            width: '100%',
            dropdownParent: $('#editMedicineModal') //modal ID
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

function view_erd(){
    $('#viewERDModal').modal('show');

}

function editmed(el){
    // mao ni ang id sa medicine nga imong iedit
    let edit_medID = $(el).attr('data-editID');
    console.log(edit_medID);
    $.ajax({
        url: 'controllers/get_medicine.php',
        method: 'GET',
        data: {medID: edit_medID},
        success: function(response) {
        console.log(response.data['med_name']);
        $('#edit_med_name').val(response.data['med_name']);
        $('#edit_stock_num').val(response.data['stock_num']);
        $('#edit_med_id').val(response.data['id']);
        $('#edit_category').val(response.data['cate_id']).trigger('change');
        $('#edit_price').val(response.data['price']);
          $('#editMedicineModal').modal('show');
        },
        error: function(err) {
            console.log(err.message);
            swal.fire({
                title: 'Error',
                text: 'There was an error fetching the medicine details',
                icon: 'error'
            });
        }
    });
    
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

    // on change of medicine
    $('#selmed_name').on('change', function(){
        calculatePrice()
    });
    // end onchange medicine

    // onchange num of purchase
    $('#buy_num_of_purchase').on('keyup', function(){
        calculatePrice()
    });
    // end onchange num of purchase
    
    // on change of customer\
    $('#selcustomer_name').on('change', function(){
        calculatePrice()
    });
    // end on change of customer
}

function calculatePrice() {
    // Get values and parse as numbers
    let discount = parseFloat($('#selcustomer_name').find(':selected').attr('data-discount')) || 0;
    let med_price = parseFloat($('#selmed_name').find(':selected').attr('data-medPrice')) || 0;
    let numofp = parseFloat($('#buy_num_of_purchase').val()) || 0;
    let total = 0;

    // Validate inputs first
    if (!med_price || !numofp) {
        total = 0;
    } else {
        // Calculate with or without discount
        if (discount) {
            let discountedPrice = med_price * (1 - (discount / 100));
            total = discountedPrice * numofp;
        } else {
            total = med_price * numofp;
        }
    }
    $('#buy_price').val(total);
    let undiscounted = med_price * numofp;
    const formatPrice =  med_price.toLocaleString('en-PH', {
        style: 'currency',
        currency: 'PHP',
    });

    const formatUndiscounted = undiscounted.toLocaleString('en-PH', {
        style: 'currency',
        currency: 'PHP',
    });

    // Format total as PHP currency using toLocaleString
    const formattedTotal = total.toLocaleString('en-PH', {
        style: 'currency',
        currency: 'PHP',
    });

    $('#medp_span').text(`Base Price: ${formatPrice}`);
    $('#medqty_span').text(`Base Total: ${formatUndiscounted}`);
    // Set the value of #buy_price
    $('#medprice_span').text(`Total Price: ${formattedTotal}`);
    $('#meddis_span').text(`Discount(%): ${discount}%`);
}




$('#addMedForm').on('submit', function(e) {
    e.preventDefault();
    let addmedformdata = new FormData(this);

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

$('#BuyModalForm').on('submit', function(e) {
    e.preventDefault();

    let buyformdata = new FormData(this);
    $.ajax({
        url: 'controllers/buy_medicine.php',
        method: 'POST',
        data: buyformdata,
        processData: false,
        contentType: false,
        success: function(response) {
            $('#BuyModal').modal('hide');
            swal.fire({
                title: 'Success',
                text: response.message,
                icon: 'success'
            }).then(() => {
                location.reload();
            });
        },
        error: function(xhr) {
            // Parse response if JSON, fallback otherwise
            let response;
            try {
                response = JSON.parse(xhr.responseText);
            } catch {
                response = { message: 'An unknown error occurred' };
            }
            Swal.fire({
                title: 'Error',
                text: response.message || 'An error occurred',
                icon: 'error'
            });
        }
    });
});

$('#editMedForm').on('submit', function(e) {
    e.preventDefault();
    let editmedformdata = new FormData(this);
    for (let pair of editmedformdata.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }
    $.ajax({
        url: 'controllers/edit_medicine.php',
        method: 'POST',
        data: editmedformdata,
        processData: false, 
        contentType: false,

        success: function(response) {
            $('#editMedicineModal').modal('hide');
            swal.fire({
                title: 'Success',
                text: 'Medicine updated successfully',
                icon: 'success'
            }).then(() => {
                location.reload();
            });
        },
        error: function(err) {
            console.log(err.message);
            swal.fire({
                title: 'Error',
                text: 'There was an error updating the medicine',
                icon: 'error'
            });
        }
    });
});



</script>

<?php
$content = ob_get_clean();
include 'includes/app.php';