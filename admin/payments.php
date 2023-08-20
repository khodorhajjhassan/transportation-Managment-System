<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/modal.css">
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
  <?php
  include('../config.php');
  $sql='select * from rate';
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);
  mysqli_close($conn);
  ?>
 
  <div>
    <h2 class="text-center text-primary mt-5 mb-5">Payments</h2>
    <form >
    <div class="row mb-4">
      <div class="col-2 d-flex justify-content-around gap-4">
        <label>Dollar Rate is:</label>
        <input type="number" value="<?php echo $row['rate']; ?>" class="form-control ratevalue" name="rate"/>
        <div class="rateerror text-danger"></div>
      </div>
      <div class="col-2">
      <button id="submit_rate"  type="button" name="submit_rate" class="btn btn-primary">submit</button>
      </div>
      <div class="col-6">
      </div>
    </div>
</form>
  <table id="myTable" class="table table-striped" style="width: 100%">
  <thead>
    <tr>
      <th>PaymentID</th>
      <th>Userid</th>
      <th>Tripid</th>
      <th>Firstname</th>
      <th>LastName</th>
      <th>AmountPaid</th>
      <th>Review</th>
      
      <!-- Added column for the block button -->
    </tr>
  </thead>
  <tbody>
    <?php
      $host = $_SERVER['HTTP_HOST'];
      $jsonData = file_get_contents("http://$host/transportation/api/admin/view/allpayments.php");
      $data = json_decode($jsonData, true);

      foreach ($data as $row) {
        echo "<tr>";
        echo "<td>".$row['txn_id']."</td>";
        echo "<td>".$row['UserID']."</td>";
        echo "<td>".$row['tripid']."</td>";
        echo "<td>".$row['firstname']."</td>";
        echo "<td>".$row['lastname']."</td>";
        echo "<td>".$row['ticketprice'].$row['currency']."</td>";
        echo ($row['rating'] === null && $row['comments'] === null)
              ? '<td>No Review</td>'
              : '<td><i class="fa-solid fa-star fa-xl review" onclick="showReview('.$row['rating'].', \''.$row['comments'].'\')"></i></td>';
        
        echo "</tr>";
      }
    ?>
  </tbody>
</table>
  </div>
  <div class="modal-container" id="myModal">
      <div class="modal-wrapper bg-white">
        <div class="modall">
          <header>
            <h2>Confirmation</h2>
          </header>
          <main>
            <div class="icon-wrapper">
              <i class="fa-solid fa-circle-exclamation"></i>
            </div>
            <div class="text-wrapper">
              <span>Are you sure you want to Refund this Client?</span>
            </div>
          </main>
          <footer>
            <div class="btn-container">
              <div class="cancel-wrapper">
                <button class="btn btn-cancel">Cancel</button>
              </div>
              <div class="delete-confirm-wrapper">
                <button class="btn btn-confirm">
                  <i class="fa-solid fa-trash"></i>
                  Confirm
                </button>
              </div>
            </div>
          </footer>
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
