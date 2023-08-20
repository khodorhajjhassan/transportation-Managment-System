<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/modal.css" />
  </head>
  <style>
    .btn {
      font-size: 17px;
    }

    #myTable {
      margin-bottom: 0px;
    }
    .accepted {
      color: green !important;
    }

    .rejected {
      color: red !important;
    }
    .inprogress {
      color: blue!important;
    }
  </style>
  <body>
    <div>
      <h2 class="text-center text-primary mt-5 mb-5">DayOff Requests</h2>
      <table id="myTable" class="table table-striped" style="width: 100%">
        <thead>
          <tr>
            <th>Vacation ID</th>
            <th>Driver Name</th>
            <th>vacation_start</th>
            <th>vacation_end</th>
            <th>reason_of_vacation</th>
            <th>vacation_approved</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $host = $_SERVER['HTTP_HOST'];

          $jsonData = file_get_contents("http://$host/transportation/api/admin/view/alldayoff.php");

          $data = json_decode($jsonData, true);

          foreach ($data as $row) {
            $vacationApproved = $row['vacation_approved'] == 0 ? 'InProgress' : ($row['vacation_approved'] == 1 ? 'Rejected' : ($row['vacation_approved'] == 2 ? 'Accepted' : 'Unknown'));
            echo '<tr data-vacationid="' . $row['vacationid'] . '">';
            echo "<td>" . $row['vacationid'] . "</td>";
            echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
            echo "<td>" . $row['vacation_start'] . "</td>";
            echo "<td>" . $row['vacation_end'] . "</td>";
            echo "<td>" . $row['reason_of_vacation'] . "</td>";
            echo '<td class="' . strtolower($vacationApproved) . '">' . $vacationApproved . '</td>';
            echo '<td colspan="">';

            // Check if vacation_approved is 1 or 2 and disable buttons accordingly
            if ($row['vacation_approved'] == 1 || $row['vacation_approved'] == 2) {
              echo '<button disabled data-toggle="tooltip" data-placement="right" title="Accept Request" data-vacationid="' . $row['vacationid'] . '" class="icon-trash accept-request"><i class="fa-solid fa-circle-check"></i></button> |';
              echo '<button disabled data-toggle="tooltip" data-placement="right" title="Reject Request" data-vacationid="' . $row['vacationid'] . '" class="icon-trash btn-delete4"><i class="fa-solid fa-trash"></i></button>';
            } else {
              echo '<button data-toggle="tooltip" data-placement="right" title="Accept Request" data-vacationid="' . $row['vacationid'] . '" class="icon-trash accept-request"><i class="fa-solid fa-circle-check"></i></button> |';
              echo '<button data-toggle="tooltip" data-placement="right" title="Reject Request" data-vacationid="' . $row['vacationid'] . '" class="icon-trash btn-delete4"><i class="fa-solid fa-trash"></i></button>';
            }

            echo '</td>';
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
            <p>Are you sure you want to Reject this Vacation?</p>
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
            <p>Are you sure you want to Accept this Vacation?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="confirmAcceptBtn">Accept</button>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  </body>
</html>
