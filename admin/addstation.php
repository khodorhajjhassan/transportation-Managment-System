<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .vspan{
        color: red !important;
      }
    </style>
</head>
<body>
<h2 class="text-center text-primary mt-5 mb-5">Add Stations</h2>
<div class="card-body content">
<form action="../api/admin/addform/newstation.php" method="POST" onsubmit="return validatestation()">
      <h5 class="text-primary">Add Stations</h5>
      <hr class="hr">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <h5>Station Name</h5>
         <input type="text" name="stationname" class="form-control" style="width: 100%;" id="stationname">
         <span id="vstationname" class="vspan"></span>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="form-group">
          <h5>Province Name</h5>
           <input type="text" name="provincename" class="form-control" style="width: 100%;" id="provincename">
           <span id="vprovincename" class="vspan"></span>
          </div>
        </div>
       
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
               <h5>Capacity</h5>
            <input type="number" name="capacity" class="form-control"  style="width: 100%;" id="capacity">
            <span id="vcapacity" class="vspan"></span>
            </div>
           

          </div>
         
        </div>
        <hr class="hr">
    <div class="bottom text-center">
      <button  type="submit" class="btn btn-primary" id="submit">Submit</button>
    </div>
</form>
</div>

<script src="./js/validation/stationvalidation.js"></script>
</body>
</html>