<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/modal.css" />
    <title>Document</title>
  </head>
  <body>
  <style>
    .btn {
      font-size: 17px;
    }

    #myTable {
      margin-bottom: 0px;
    }
    .refund{
      color:blue;
    }
    .refund:hover
    {
      color:red;
      cursor: pointer;
      transition:.3s all ease;
      transform :scale(1.2)
    }
    .review{
      color:#9FA909;
    }
    .review:hover{
      color:gold;
      cursor: pointer;
      transition:.3s all ease;
      transform :scale(1.2)
    }
  </style>
  <div>
  <h2 class="text-center text-primary mt-5 mb-5">Cancelled Trips</h2>
  <table id="myTable" class="table table-striped" style="width: 100%">
  <thead>
    <tr>
      <th>Cancel ID</th>
      <th>Receipt ID</th>
      <th>User ID</th>
      <th>Trip ID</th>
      <th>Amount Paid</th>
      <th>Status</th>
      
      <!-- Added column for the block button -->
    </tr>
  </thead>
  <tbody>
    <?php
      $host = $_SERVER['HTTP_HOST'];
      $jsonData = file_get_contents("http://$host/transportation/api/admin/view/cancelledtrips.php");
      $data = json_decode($jsonData, true);

      foreach ($data as $row) {
        echo "<tr>";
        echo "<td>".$row['canceledid']."</td>";
        echo "<td>".$row['txn_id']."</td>";
        echo "<td>".$row['userid']."</td>";
        echo "<td>".$row['tripid']."</td>";
        echo "<td>".$row['amountpaid']."</td>";
        $refunded = $row['refunded'] == 1;
        echo '<td><button data-toggle="tooltip" data-placement="right" title="Refund" data-canceledid="'.$row['canceledid'].'" class="icon-trash btn-refunded"'.($refunded ? ' disabled' : '').'><i class="fa-solid '.($refunded ? 'fa-circle-check' : 'fa-circle-xmark'). ' fa-lg" style="color: '.($refunded ? '#2e64e5' : '#e71c0d').';"></i></button></td>';        
        echo "</tr>";
      }
    ?>
  </tbody>
</table>
  </div>
  <div id="refundUser" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirmation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to Refund this User?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDeletePayment">Refund</button>
      </div>
    </div>
  </div>
</div>
 
  <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center" id="reviewModalLabel">Review Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <div id="reviewStars"></div>
        <p id="reviewComment"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  </body>
</html>
