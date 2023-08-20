
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
  <h2 class="text-center text-primary mt-5 mb-5">View Stations</h2>
    <table id="myTable" class="table table-striped" style="width: 100%">
      <thead>
        <tr>
          <th>Station ID</th>
          <th>Station name</th>
          <th>province</th>
          <th>capacity</th>
          <th>Action</th>
        
          <!-- Added column for the block button -->
        </tr>
      </thead>
      <tbody>
        <?php
          $host = $_SERVER['HTTP_HOST'];

          $jsonData = file_get_contents("http://$host/transportation/api/admin/view/allstations.php");

            $data = json_decode($jsonData, true);

          foreach ($data as $row) {
            echo '<tr data-stationid="' . $row['stationid'] . '">';
            echo "<td>".$row['stationid']."</td>";
            echo "<td>".$row['stationname']."</td>";
            echo "<td>".$row['provincename']."</td>";
            echo "<td>".$row['capacity']."</td>";
            echo '<td colspan=""><button data-toggle="tooltip" data-placement="right" title="Edit" data-stationid="' . $row['stationid'] . '" class="icon-trash btn-editstation"><i class="fa-solid text-primary fa-user-pen"></i></button> | 
            <button data-toggle="tooltip" data-placement="right" title="Remove station" data-stationid="' . $row['stationid'] . '" class="icon-trash btn-deletestation">
            <i class="fa-solid fa-trash"></i>
            </button>
            </td>';
            echo "</tr>";
          }
        ?>
        
      </tbody>
    </table>
<!-- Delete Modal -->
<div id="deleteConfirmationstationModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirmation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this Station?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteStation">Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModalStation" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="editForm">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Station</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="stationname">Station Name:</label>
            <input type="text" class="form-control" id="stationname" name="stationname">
          </div>
          <div class="form-group">
            <label for="provincename">Province Name:</label>
            <input type="text" class="form-control" id="provincename" name="provincename">
          </div>
          <div class="form-group">
            <label for="capacity"> Capacity:</label>
            <input type="number" class="form-control" id="capacity" name="capacity">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary savestation">Save Changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>


  </body>
</html>