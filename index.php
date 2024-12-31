<!DOCTYPE html>
<html lang="en">
    <head>
		<title>Login Page</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



    </head>
    <body>
	<main>
         <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
               <div class="container">
                  <div class="row justify-content-center">
                     <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="card mb-3">
                           <div class="card-body">
                              <div class="pt-4 pb-2">
                                 <h5 class="card-title text-center pb-0 fs-4"><strong>Simple Pharmacy System Login</strong></h5>
                                 <p class="text-center small">Enter your Username and Password to login</p>
                              </div>
                              <form class="row g-3 needs-validation" id="loginform" method="POST">
                                 <div class="col-12">
                                    <label for="uname" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                       <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                                        <input type="text" name="uname" class="form-control" id="uname" required>
                                       <!-- <div class="invalid-feedback">Please enter your username.</div> -->
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <label for="pword" class="form-label">Password</label> <input type="password" name="pword" class="form-control" id="pword" required>
                                    <!-- <div class="invalid-feedback">Please enter your password!</div> -->
                                 </div>
                                 <div class="col-12"> <button class="btn btn-primary w-100" type="submit">Login</button></div>
                                 <!-- <div class="col-12">
                                    <p class="small mb-0">Don't have account? <a href="signup.php">Create an account</a></p>
                                 </div> -->
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </main>

<script>

$('#loginform').on('submit', function(e) {
e.preventDefault();
let loginformdata = new FormData(this);
for (let pair of loginformdata.entries()) {
    console.log(pair[0] + ': ' + pair[1]);
}
$.ajax({
    url: 'authentication/auth.php',
    method: 'POST',
    data: loginformdata,
    processData: false, 
    contentType: false,

    success: function(response) {
        if (typeof response === 'string') {
            response = JSON.parse(response);
        }
        let staff_name = response.data.staff_name;
        let staff_id = response.data.id;
        $.ajax({
            type: 'POST',
            url: 'authentication/authsession.php',
            data: {
                staff_name: staff_name,
                staff_id: staff_id
            },
            success: function() {
                window.location.href = 'pharmacy.php';
            },
            error: function(err) {
                console.log(err.message);
                swal.fire({
                    title: 'Error',
                    text: 'Invalid Username and Password',
                    icon: 'error'
                });
            }
        });
    },
    error: function(err) {
        console.log(err.message);
        swal.fire({
                title: 'Error',
                text: 'Invalid Username and Password',
                icon: 'error'
            });
    }
});
});


</script>

    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

	</body>
</html>