<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Skyline View Drivers</title>
  </head>
  <body>
    <style>
      .btn {
        font-size: 17px;
      }

      #myTable {
        margin-bottom: 0px;
      }

      .active {
  color: green !important;
}

.inactive {
  color: red !important;
}
.valid {
  color: green !important;
}

.expired {
  color: red !important;
}

      .action-buttons {
        display: flex;
        gap: 10px;
      }
    
    </style>
    <div>
    <h2 class="text-center text-primary mt-5 mb-5">View Driver</h2>
      <table id="myTable" class="table table-striped" style="width: 100%">
        <thead>
          <tr>
            <th>Firstname</th>
            <th>Location</th>
            <th>MobileNumber</th>
            <th>Email</th>
            <th>Birthday</th>
            <th>Apply Date</th>
            <th>Licensedate</th>
            <th>LicenseEx</th>
            <th>Online</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          
        $host = $_SERVER['HTTP_HOST'];

          $jsonData = file_get_contents("http://$host/Transportation/api/admin/view/alldriver.php");

            $data = json_decode($jsonData, true);

            foreach ($data as $row) {
              $onlineClass = $row['isOnline'] == 1 ? 'Active' : 'Inactive';
              $licenseClass = $row['licenseexpiry'] == 1 ? 'Expired' : 'Valid';
              echo '<tr data-driverid="' . $row['driverid'] . '">';
              echo "<td>".$row['firstname'].' '.$row['lastname']."</td>";
              echo "<td>".$row['city'].' '.$row['address']."</td>";
              echo "<td>".$row['mobilenumber']."</td>";
              echo "<td>".$row['email']."</td>";
              echo "<td>".$row['birthdate']."</td>";
              echo "<td>".$row['applydate']."</td>";
              echo "<td>".$row['licensedate']."</td>";
              echo '<td class="' . strtolower($licenseClass) . '">' . $licenseClass . '</td>';
              echo '<td class="' . strtolower($onlineClass) . '">' . $onlineClass . '</td>';
              echo '<td>';
              echo '<div class="action-buttons">';
              echo '<button data-toggle="tooltip" data-placement="right" data-driverid="' . $row['driverid'] . '" title="Edit" class="icon-trash btn-editdriver"><i class="fa-solid text-primary fa-user-pen"></i></button> | ';
              echo ' <button data-toggle="tooltip" data-placement="right" data-driverid="' . $row['driverid'] . '" title="Delete Driver"  class="icon-trash btn-delete">
              <i class="fa-solid fa-trash"></i>';
              echo '</div>';
              echo '</td>';
              echo "</tr>";
            }
          ?>
          
        </tbody>
      </table>
    </div>

    <!-- Modal -->
    <div id="deleteConfirmationdrModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirmation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this Driver?</p>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteDriver">Delete</button>
      </div>
    </div>
  </div>
</div>


    
    <div class="modal fade" id="editModaldriver" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="editForm" >
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit driver</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="Licensedate">LicenseDate:</label>
            <input type="date" class="form-control" id="Licensedate" name="Licensedate">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary savedriver" data-driverid="">Save Changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
  </body>
</html>

