<?php $host = $_SERVER['HTTP_HOST'];
        $apiUrl = "http://$host/transportation/api/admin/dropdown.php";
        $data = file_get_contents($apiUrl);
        $dropdown = json_decode($data, true); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Document</title>
    <style>
      .vspan{
        color: red !important;
      }
    </style>
  </head>
  <body>
    <h2 class="text-center text-primary mt-5 mb-5">Add Driver</h2>
    <div class="card-body content">
      <form action="../api/admin/addform/newdriver.php" method="POST" onsubmit="return validateDriver()">
      <h5 class="text-primary">Add Driver Information and License</h5>
      <hr class="hr">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <h5>First Name</h5>
         <input type="text" name="firstname" class="form-control" style="width: 100%;" id="firstName">
         <span id="vFirstName" class="vspan"></span>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="form-group">
          <h5>Last Name</h5>
           <input type="text" name="lastname" class="form-control" style="width: 100%;" id="lastName">
           <span id="vLastName" class="vspan"></span>
          </div>
        </div>
          <!-- /.form-group -->
          <!-- /.form-group -->
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
               <h5>Phone Number</h5>
            <input type="number" name="phoneNumber" class="form-control"  style="width: 100%;" id="phoneNumber">
            <span id="vPhoneNumber" class="vspan"></span>
            </div>
           

          </div>
          <div class="col-md-6">
            <div class="form-group">
               <h5>Email</h5>
               <input type="email" name="email" class="form-control" style="width: 100%;" id="email">
               <span id="vEmail" class="vspan"></span>
            </div>
           

          </div>
        </div>
        <div class="row">
        <div class="col-md-6">
            <div class="form-group">
               <h5>Address</h5>
            <input type="text" class="form-control" name="address"  style="width: 100%;" id="address">
            <span id="vAddress" class="vspan"></span>
            </div>
           

          </div>
          <div class="col-md-6">
            <div class="form-group">
               <h5>License Date</h5>
               <input type="date" class="form-control" name="licenseDate" style="width: 100%;" id="licenseDate">
               <span id="vLicenseDate" class="vspan"></span>
            </div>
           

          </div>
        </div>
      
    <hr class="hr">
    <div class="bottom text-center">
      <button class="btn btn-primary " type="submit" id="submit">Submit</button>
    </form>
    </div>

    <script src="./js/validation/drivervalidation.js"></script>
  </body>
</html>
