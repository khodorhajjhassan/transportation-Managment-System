
<?php
$host = $_SERVER['HTTP_HOST'];
$apiUrl = "http://$host/transportation/api/admin/dropdown.php";
$data = file_get_contents($apiUrl);
$dropdown = json_decode($data, true);
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  </head>
  <style>
    .btn {
      font-size: 17px;
    }

    #myTable {
      margin-bottom: 0px;
    }
  </style>
  <body>
  
  <div>
  <h2 class="text-center text-primary mt-5 mb-5">View Bus</h2>
    <table id="myTable" class="table table-striped" style="width: 100%">
      <thead>
        <tr>
          <th>Bus ID</th>
          <th>Driver name</th>
          <th>capacity</th>
          <th>Station</th>
          <th>Mechanic Date</th>
          <th>Insurance number</th>
          <th>Mechanic Due</th>
          <th>Action</th>
        
          <!-- Added column for the block button -->
        </tr>
      </thead>
      <tbody>
        <?php
          
        $host = $_SERVER['HTTP_HOST'];
          $jsonData = file_get_contents("http://$host/Transportation/api/admin/view/allbus.php");
          $data = json_decode($jsonData, true);

          foreach ($data as $row) {
            echo '<tr data-busid="' . $row['busid'] . '">';
            echo "<td>".$row['busid']."</td>";
            echo '<td data-driverid="' . $row['driverid'] . '">'.$row['firstname'].' '.$row['lastname']."</td>";
            echo "<td>".$row['capacity']."</td>";
            echo "<td>".$row['province'].', '.$row['station']."</td>";
            echo "<td>".$row['mechanicdate']."</td>";
            echo "<td>".$row['insurancenb']."</td>";
            echo "<td>" . ($row['mechanicdue'] == 1 ? '<span style="color: red;">Yes</span>' : '<span style="color: green;">No</span>') . "</td>";
            echo '<td colspan=""><button data-toggle="tooltip" data-placement="right" title="Edit" data-busid="' . $row['busid'] . '" class="icon-trash btn-editbus"><i class="fa-solid text-primary fa-user-pen"></i></button> | 
            <button data-toggle="tooltip" data-placement="right" title="Remove Bus" data-busid="' . $row['busid'] . '" class="icon-trash btn-delete2">
            <i class="fa-solid fa-trash"></i>
            </button>
            </td>';
            echo "</tr>";
          }
        ?>
        
      </tbody>
    </table>
<!-- Modal -->
    <div id="deleteConfirmationbusModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirmation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this Bus?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteBus">Delete</button>
      </div>
    </div>
  </div>
</div>

  <div class="modal fade" id="editModalbus" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="editForm">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Bus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="Drivername">Driver name:</label>
            <select class="form-control" id="Drivername" name="Drivername">
              <!-- Add dropdown options here -->
              <?php
            foreach ($dropdown['driver'] as $drivers) {
              $drivername = $drivers['Drivers'];
              $driverid = $drivers['driverid'];
              echo '<option value="' . $driverid . '">' . $drivername . '</option>';
            }
            ?>
            </select>
          </div>
          <div class="form-group">
            <label for="Mechanicdue">Mechanicdue date:</label>
            <input type="date" class="form-control" id="Mechanicdue" name="Mechanicdue">
          </div>
          <div class="form-group">
            <label for="Insurance">Insurance number:</label>
            <input type="text" class="form-control" id="Insurance" name="Insurance">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary savebus">Save Changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

  </body>
</html>
