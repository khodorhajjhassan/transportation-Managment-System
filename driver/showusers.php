<?php
include_once('../path.php');
include('../include/driverheader.php');
if(isset($_SESSION['id']) && ($_SESSION['type'] == 1)) {
    $tripid=$_GET['tid'];
    $query = "SELECT * FROM transactionsview WHERE tripid = $tripid"; 
    $result = mysqli_query($conn, $query) or die("Selecting vacation request failed"); 
   
} else {
    header('location: ../main/login.php?msg=please_login');
    mysqli_close($conn);
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
        <h2 class="mb-5">Users Booking</h2>
        <div class="row">
            <div class="col">
                <form class="d-flex">
            <input id="search-input" class="form-control p-2" type="search" placeholder="Search" aria-label="Search">
          </form>
        </div>

      
    </div>
       
    
    <table id="trip-table" class="table mt-5 ">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Paymentid</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
            </tr>

        </thead>
        <tbody>
        <?php
         if (mysqli_num_rows($result) > 0) {
            
        $i=1;
        while ($row = mysqli_fetch_array($result)) {
            $tripid=$row['tripid'];
            echo '<tr>';
            echo '<td>' . $i . '</td>';
            echo '<td>' . $row['txn_id'] . '</td>';
            echo '<td>' . $row['firstname'] . '</td>';
            echo '<td>' . $row['lastname'] . '</td>';
        

            echo '</tr>';
            $i++;
        }
    }else {
      
        echo"  <div class='text-center' style='height:30px'><h5 class='text-center mt-4'>No users booked yet</h5></div>";
    }
        ?>
        </tbody>
    </table>

      </section>

      


           <!-- Footer -->
        <?php include('../include/footer.html')  ?>
  <!-- Footer -->

  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  <script src="js/driver.js"></script>

</body>
</html>