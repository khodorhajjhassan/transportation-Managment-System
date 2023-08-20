<?php
 $host = $_SERVER['HTTP_HOST'];
 $jsonData = file_get_contents("http://$host/transportation/api/admin/view/alltrips.php");
          $data = json_decode($jsonData, true);
 $apiUrl = "http://$host/transportation/api/admin/dropdown.php";
        $apidata = file_get_contents($apiUrl);
        $dropdown = json_decode($apidata, true); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>
<body>
  <h2 class="text-center text-primary mt-5 mb-5">Manage Trips</h2>
  
  <style>
    .btn {
      font-size: 17px;
    }


    #myTable {
      margin-bottom: 0px;
    }
  </style>
  <div>
    
    <table id="myTable" class="table table-striped" style="width: 100%">
      <thead>
        <tr>
          <th>Trip ID</th>
          <th>Origin</th>
          <th>Destination</th>
          <th>Date</th>
          <th>Start Time</th>
          <th>Arrive Time</th>
          <th>Bus</th>
          <th>Status</th>
          <th>Action</th>
          <!-- Added column for the block button -->
        </tr>
      </thead>
      <tbody>
        <?php

          foreach ($data as $row) {
            echo '<tr data-tripid="' . $row['tripid'] . '">';
            
            echo "<td>".$row['tripid']."</td>";
            echo "<td>".$row['provinaceorigin'].', '.$row['origin']."</td>";
            echo "<td>".$row['provinacedestination'].', '.$row['destination']."</td>";
            echo "<td>".$row['schedule']."</td>";
            echo "<td>".$row['starttime']."</td>";
            echo "<td>".$row['arrivetime']."</td>";
            echo '<td  ><h6>'.$row['Bus'].' ,'.$row['firstname'].' '.$row['lastname']."</h6></td>";
            echo "<td>".$row['status']."</td>";
            echo '<td colspan=""><button data-toggle="tooltip" data-placement="right" title="Edit Trip" data-tripid="' . $row['tripid'] . '" class="icon-trash btn-edittrip"><i class="fa-solid text-primary fa-user-pen"></i></button> | 
            <button data-toggle="tooltip" data-placement="right" title="Remove Trip" data-tripid="' . $row['tripid'] . '" class="icon-trash btn-delete1">
            <i class="fa-solid fa-trash"></i>
        </button>

            </td>';
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
  
  <div id="deleteConfirmationModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirmation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this Trip?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
      </div>
    </div>
  </div>
</div>

    <div class="modal fade" id="editModaltrip" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="editForm" >
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Trip</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        
          <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date">
          </div>
          <div class="form-group">
            <label for="startTime">Start Time:</label>
            <input type="time" class="form-control" id="startTime" name="startTime">
          </div>
          <div class="form-group">
            <label for="arriveTime">Arrive Time:</label>
            <input type="time" class="form-control" id="arriveTime" name="arriveTime">
          </div>
          
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary savetrip" data-tripid="">Save Changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>

