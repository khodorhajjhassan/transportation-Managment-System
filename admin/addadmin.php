<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
  <style>
     .vspan{
        color:red !important;
      }
  </style>
    <title>Add Trip</title>
  </head>
  <body>
    <h2 class="text-center text-primary mt-5 mb-5">Add Admin</h2>
    <div class="card-body content">
    <form action="../api/admin/addform/newadmin.php" method="POST" onsubmit="return validateadmin()">
      <h5 class="text-primary">Add Admin Information</h5>
      <hr class="hr">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <h5>First Name</h5>
            <span id="vfirst" class="vspan"></span>
         <input type="text" class="form-control" id="fname" name="firstname" style="width: 100%;">
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="form-group">
          <h5>Last Name</h5>
          <span id="vlast" class="vspan"></span>
           <input type="text" class="form-control" id="last" name="lastname" style="width: 100%;">
          </div>
        </div>
          <!-- /.form-group -->
          <!-- /.form-group -->
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
               <h5>Phone Number</h5>
               <span id="vphone" class="vspan"></span>
            <input type="number" class="form-control" id="phone" name="mobilenumber" style="width: 100%;">
            </div>
           

          </div>
          <div class="col-md-6">
            <div class="form-group">
               <h5>Email</h5>
               <span id="vemail" class="vspan"></span>
               <input type="email" class="form-control" id="email" name="email" style="width: 100%;">
            </div>
           

          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
               <h5>Date of Birthday</h5>
               <span id="vbirth" class="vspan"></span>
            <input type="date" class="form-control" id="birth" name="birthdate" style="width: 100%;">
            </div>
           

          </div>
          <div class="col-md-6">
            <div class="form-group">
               <h5>Password</h5>
               <span id="vpassword" class="vspan"></span>
               <input type="password" class="form-control" id="password" name="password" style="width: 100%;">
            </div>
           

          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
               <h5>City</h5>
               <span id="vcity" class="vspan"></span>
            <input type="text" class="form-control" id="city"  name="city" style="width: 100%;">
            </div>
           

          </div>
          <div class="col-md-6">
            <div class="form-group">
               <h5>Address</h5>
               <span id="vaddress" class="vspan"></span>
            <input type="text" class="form-control" id="address" name="address" style="width: 100%;">
            </div>
          </div>
        </div>
      
    <hr class="hr">
    <div class="bottom text-center">
      <button class="btn btn-primary" type="submit" id="submit" >Submit</button>
    </form>
    </div>

    <script src="./js/validation/adminvalidation.js"></script>
  </body>
</html>
