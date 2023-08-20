<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/modal.css" />
</head>
<body>
  <h2 class="text-center text-primary mt-5 mb-5">Manage Applications</h2>
  
  <style>
    .btn {
      font-size: 17px;
    }
   th{  
    text-align: center !important;
  }
   

    #myTable {
      margin-bottom: 0px;
    }
  </style>
  <div>
    
    <table id="myTable" class="table table-striped" style="width: 100%">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
          <th>Phone</th>
          <th>City</th>
          <th>Address</th>
          <th>Date of Birthday</th>
          <th>License date</th>
          <th>License Exp</th>
          <th class="about">About</th>
          <th>Apply Date</th>
          <th>Action</th>
          
          <!-- Added column for the block button -->
        </tr>
      </thead>
      <tbody>
        <?php
          $host = $_SERVER['HTTP_HOST'];
          $jsonData = file_get_contents("http://$host/Transportation/api/admin/view/allapplications.php");
          $data = json_decode($jsonData, true);

          foreach ($data as $row) {
            echo "<tr>";
            echo "<td>".$row['firstname']."</td>";
            echo "<td>".$row['lastname']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['mobilenumber']." </td>";
            echo "<td>".$row['city']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td>".$row['birthdate']."</td>";
            echo "<td>".$row['licensedate']."</td>";
            echo "<td>".$row['licenseexpiry']."</td>";
            echo "<td>".$row['about']."</td>";
            echo "<td>".$row['applydate']."</td>";
            echo '<td colspan="">
            <button data-toggle="tooltip" data-placement="right" title="Show License" class="icon-trash showlicense" onclick="window.open(\''.$row['LicenseUrl'].'\', \'_blank\')"><i class="fa-solid fa-id-card"></i></button><br>
            <button data-toggle="tooltip" data-placement="right" title="Accept Driver" data-driverid="' . $row['driverid'] . '" class="icon-trash accept-driver"><i class="fa-solid fa-circle-check"></i></button><br>
            <button data-toggle="tooltip" data-placement="right" title="Reject Driver" data-driverid="' . $row['driverid'] . '" class="icon-trash btn-delete4">
          <i class="fa-solid fa-trash"></i>
            </td>';
            echo "</tr>";
          }
          
        ?>
        
      </tbody>
    </table>
  </div>
  <div id="rejectConfirmationModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirmation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to Reject this Application?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmRejectBtn">Reject</button>
      </div>
    </div>
  </div>
</div>

<div id="acceptConfirmationModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirmation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to Accept this Application?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmAcceptBtn">Accept</button>
      </div>
    </div>
  </div>
</div>
  
</body>
</html>

