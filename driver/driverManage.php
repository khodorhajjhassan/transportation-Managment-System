<?php
include_once('../config.php');
include('../include/driverheader.php');

$driverId = $_SESSION['id']; 

if(isset($_SESSION['id']) && ($_SESSION['type'] == 1)) {
    $query = "SELECT vacationid, vacation_start, vacation_end, reason_of_vacation, vacation_approved
    FROM vacation_request
    WHERE driverid = $driverId"; 
    $result = mysqli_query($conn, $query) or die("Selecting vacation request failed"); 
   
} else {
    header('location: ../main/login.php?msg=please_login'); 
    mysqli_close($conn);

}
$errorMessage="";

if (isset($_GET['msg']) && ($_GET['msg'] == "request-send")) {
    $errorMessage = "Vacation Request Sent !";
   }else if (isset($_GET['msg']) && ($_GET['msg'] == "request-faild")) {
    $errorMessage = "Faild Request for Vacation !";
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/driver.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>


<section class="container p-5 ">
    <h2 class="mb-5">Manage Your Days Off</h2>
    <div class="row">
        <div class="col">
            <form class="d-flex">
                <input id="search-input" class="form-control p-2" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>
        
      
    </div>
    <h5 class="text-success text-center mt-4" id="err"><?php echo $errorMessage ?></h5>

    <div class="table-responsive">
    <table id="trip-table" class="table mt-5 ">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#Vacation req</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Reason</th>
                <th scope="col">Response</th>
            </tr>

        </thead>
        <tbody>
        <?php
        if (mysqli_num_rows($result) >0){

        
        $i=1;
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>' . $i . '</td>';
            echo '<td>' . $row['vacation_start'] . '</td>';
            echo '<td>' . $row['vacation_end'] . '</td>';
            echo '<td>' . $row['reason_of_vacation'] . '</td>';
            $vacationApproved = $row['vacation_approved'];
            $colorClass = '';
            switch ($vacationApproved) {
                case 0:
                    $colorClass = 'text-warning';
                    $status = 'In Progress';
                    break;
                case 1:
                    $colorClass = 'text-danger';
                    $status = 'Rejected';
                    break;
                case 2:
                    $colorClass = 'text-success';
                    $status = 'Accepted';
                    break;
                default:
                    $status = 'Unknown';
            }
            echo '<td class="' . $colorClass . '">' . $status . '</td>';
            echo '</tr>';
            $i++;
        }
    }else {
        echo"<h5 class='text-center mt-4'>No Request For any Vacation yet !</h5>";

    }
        ?>
        </tbody>
    </table>
</div>

    <div class="col text-end " >
            <a href="DayOff.php" class="btn" style="color:white;background-color:#0a3b5f;  border: 1px solid #0a3b5f; border-radius: 10px;">Day Off Request</a>
        </div>
</section>

<?php include('../include/footer.html') ?>
<script>
    const searchInput = document.getElementById('search-input');
    const tripTable = document.getElementById('trip-table');
    const tableRows = tripTable.getElementsByTagName('tr');

    searchInput.addEventListener('input', function() {
        const searchQuery = searchInput.value.toLowerCase();

        for (let i = 1; i < tableRows.length; i++) {
            const row = tableRows[i];
            const rowData = row.innerText.toLowerCase();

            if (rowData.includes(searchQuery)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });
    err=document.getElementById("err");
      setTimeout(function() {
        document.getElementById("err").style.display = "none";
      }, 3000);

</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>