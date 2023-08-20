<?php
include_once('../path.php');
include('../include/driverheader.php');
if(isset($_SESSION['id']) && ($_SESSION['type'] == 1)) {
    $query = "SELECT * FROM tripview WHERE driverid = $driverId"; 
    $result = mysqli_query($conn, $query) or die("Selecting vacation request failed"); 
   
} else {
    header('location: ../main/login.php?msg=please_login'); 
    mysqli_close($conn);
}

if (isset($_POST['changestatus'])){

    $statusvalue=$_POST['statusvalue'];
    $tripid=$_POST['tripid'];

    $sql = "UPDATE trips SET status = ? where tripid=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $statusvalue, $tripid);
  
    if (mysqli_stmt_execute($stmt)) {
        mysqli_close($conn);
        header('Location:driver.php?msg:status_update');
      exit(); 
    } else {
      echo "('Error: " . mysqli_stmt_error($stmt) . "')";
    }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/driver.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">  
<title>Document</title>
</head>
<body>
    <style>
        .icon{
            border:none;
            background-color:transparent;
            font-size: 20px;
            transition:all 0.4s;
        }
        .icon:hover{
           cursor:pointer;
           transform:scale(1.3);
        }

    </style>
      <section class="container p-5 ">
        <h2 class="mb-5">Upcoming Trips</h2>
        <div class="row">
            <div class="col">
                <form class="d-flex">
            <input id="search-input" class="form-control p-2" type="search" placeholder="Search" aria-label="Search">
          </form>
        </div>

      
    </div>
       
    <div class="table-responsive">
    <table id="trip-table" class="table mt-5 ">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">FROM</th>
                <th scope="col">Destination</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>

        </thead>
        <tbody>
        <?php
        if (mysqli_num_rows($result) >0){

        
        $i=1;
        while ($row = mysqli_fetch_array($result)) {
            $tripid = $row['tripid'];
            echo '<tr>';
            echo '<td>' . $i . '</td>';
            echo '<td>' . $row['provinaceorigin'] . '</td>';
            echo '<td>' . $row['provinacedestination'] . '</td>';
            echo '<td>' . $row['schedule'] . '</td>';
            echo '<td>' . $row['starttime'].'&nbsp->&nbsp;'.$row['arrivetime']. '</td>';
            $Statuscolor = $row['status'];
            $colorClass = '';
            $status = '';
            
            if ($Statuscolor === 'Delay') {
                $colorClass = 'text-warning';
                $status='Delay';
            } elseif ($Statuscolor === 'Canceled') {
                $colorClass = 'text-danger';
                $status = 'Canceled';
            } elseif ($Statuscolor === 'Arrived') {
                $colorClass = 'text-success';
                $status = 'Arrived';
            } elseif ($Statuscolor === 'On the way') {
                $colorClass = 'text-secondary';
                $status = 'On the way';
            } elseif ($Statuscolor === 'In progress') {
                $colorClass = 'text-primary';
                $status = 'In progress';
            } else {
                $status = 'Unknown';
            }
            
            echo '<td class="' . $colorClass . '">' . $status . '</td>';
            
            echo '<td>';
            echo '<div class="action-buttons">';
            echo '<button data-toggle="tooltip" data-placement="right" data-tripid="' . $tripid . '" title="Edit Status" class="icon icon-trash text-primary btn-edit-status"><i class="fa-solid text-primary fa-pen-to-square"></i></button>';
            echo ' <button data-toggle="tooltip" data-placement="right" data-driverid="' . $row['tripid'] . '" title="Show Users"  class="icon icon-trash btn-delete">
            <a href="showusers.php?tid='.$tripid.'"><i class="fa-solid fa-users"></i></a>';
            echo '</div>';
            echo '</td>';

            echo '</tr>';
            $i++;
        }
    }else {
        echo"<h5 class='text-center mt-4'>You don't have any Trip for now !</h5>";
            
        }
            ?>
        </tbody>
    </table>
    </div>

      </section>
       <!-- Modal for updating status -->
    <div id="status-modal" class="modal">
        <div class="modal-content">
            <h5 class="text-center">Update Status</h5>
            
            <form id="status-form" method="POST" action="driver.php">
            <input type="hidden" name="tripid" id="status-tripid" value="<?php echo $tripid; ?>">
            <select name="statusvalue" id="status-select" class="form-control mt-4 mb-4">
                <option selected">Select Status</option>
                <option value="In progress">In progress</option>
                <option value="On the way">On the way</option>
                <option value="Arrived">Arrived</option>
                <option value="Delay">Delay</option>
            <option value="Canceled">Canceled</option>
        </select>
    <button class="btn btn-primary close" name="changestatus" type="submit">Update</button>
    <span id="close" class="btn btn-danger close">cancel</span>
</form>

        </div>
    </div>

    <!-- ...existing HTML content... -->

    <!-- JavaScript to handle modal functionality -->
    <script>

let modal = document.getElementById("status-modal");

let editButtons = document.querySelectorAll(".btn-edit-status");

let closeBtn = document.getElementById("close");

let tripIdInput = document.getElementById("status-tripid");

editButtons.forEach(function(button) {
    button.addEventListener("click", function() {
        let tripId = button.getAttribute("data-tripid");
        tripIdInput.value = tripId;
        modal.style.display = "block";
    });
});

// When the user clicks on <span> (x), close the modal
closeBtn.addEventListener("click", function() {
    modal.style.display = "none";
});

window.addEventListener("click", function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});




 
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



           <!-- Footer -->
        <?php include('../include/footer.html')  ?>
  <!-- Footer -->

  



</body>
</html>