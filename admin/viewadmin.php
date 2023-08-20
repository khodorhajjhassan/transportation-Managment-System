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
  <h2 class="text-center text-primary mt-5 mb-5">View Admin</h2>
    <table id="myTable" class="table table-striped" style="width: 100%">
      <thead>
        <tr>
          <th>Name</th>
          <th>Last Name</th>
          <th>Phone</th>
          <th>Email Time</th>
          <th>Date of Birthday Time</th>
          <th>City</th>
          <th>Address</th>
          <th>Action</th>
          
          <!-- Added column for the block button -->
        </tr>
      </thead>
      <tbody>
        <?php
           $host = $_SERVER['HTTP_HOST'];
           $jsonData = file_get_contents("http://$host/transportation/api/admin/view/alladmin.php");
           $data = json_decode($jsonData, true);

          foreach ($data as $row) {
            echo "<tr>";
            echo "<td>".$row['firstname']."</td>";
            echo "<td>".$row['lastname']."</td>";
            echo "<td>".$row['mobilenumber']."</td>";
            echo "<td>".$row['email']."  </td>";
            echo "<td>".$row['birthdate']."</td>";
            echo "<td>".$row['city']."</td>";
            echo "<td>".$row['address']."</td>";
            echo '<td colspan=""><button data-toggle="tooltip" data-placement="right" title="Remove Admin" data-userid="' . $row['userid'] . '"  class="icon-trash btn-delete3"><i class="fa-solid fa-trash"></i></button>
            
            </td>';
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
  <!-- Modal -->
  <div id="deleteConfirmationModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirmation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this Admin?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
      </div>
    </div>
  </div>
</div>
 
  
</body>
</html>

