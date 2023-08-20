<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
</head>
<body>
  <style>
    .btn {
      font-size: 17px;
    }

    #myTable {
      margin-bottom: 0px;
    }
  </style>
  <div>
    
    <h2 class="text-center text-primary mt-5 mb-5 title">Dashboard</h2>
    <table id="myTable" class="table table-striped" style="width: 100%">
      <thead>
        <tr>
          <th>Userid</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>email</th>
          <th>MobileNumber</th>
          <th>Number of trips</th>
          <th>Action</th>
          <!-- Added column for the block button -->
        </tr>
      </thead>
      <tbody>
        <?php
        $host = $_SERVER['HTTP_HOST'];
          $jsonData = file_get_contents("http://$host/Transportation/api/admin/view/allusers.php");
          $data = json_decode($jsonData, true);
          foreach ($data as $row) {
            echo "<tr>";
            echo "<td>".$row['userid']."</td>";
            echo "<td>".$row['firstname']."</td>";
            echo "<td>".$row['lastname']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['mobilenumber']."</td>";
            echo "<td>".$row['nboftrips']."</td>";
            echo "<td>";
        
            if ($row['isblocked'] == 0) {
              echo '<button data-toggle="tooltip" data-placement="right" title="Block User" data-userid="'.$row['userid'].'" class="icon-trash btn-unblock"><i class="fa-solid fa-unlock"></i></button>';
            } else {
              echo '<button data-toggle="tooltip" data-placement="right" title="Unblock User" data-userid="'.$row['userid'].'" class="icon-trash btn-blockuser"><i class="fa-solid fa-lock"></i></button>';
            }
        
            echo "</td>";
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
          <h4 class="modal-title" id="confirmationTitle">Confirmation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p id="confirmationText">Are you sure you want to Block this User?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Block</button>
        </div>
      </div>
    </div>
  </div>
  <div id="unblockConfirmationModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="confirmationTitle">Confirmation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p id="confirmationText">Are you sure you want to Unblock this User?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" id="confirmunblockBtn">Unblock</button>
        </div>
      </div>
    </div>
  </div>
  
</body>
</html>
