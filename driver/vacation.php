<?php 
require_once('../config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    session_start();
    if(isset($_SESSION['id']) && ($_SESSION['type']==1)){
      $id=$_SESSION['id'];
    }
    

    $Startdate=$_POST['startdate'];
    $Enddate=$_POST['enddate'];
    $Reason=$_POST['reason'];
    
      $sqlvacation = "INSERT INTO vacation_request ( driverid,vacation_start, vacation_end, reason_of_vacation) VALUES (?,?,?,?)";
      $stmtvacation  = mysqli_prepare($conn, $sqlvacation);
      mysqli_stmt_bind_param($stmtvacation, "ssss", $id,$Startdate, $Enddate, $Reason);

      if (mysqli_stmt_execute($stmtvacation)) {
      echo "vacation request added successfully.";
      header('Location:driverManage.php?msg=request-send');
      } else {
       echo "Error: " . mysqli_stmt_error($stmtvacation);
      header('Location:driverManage.php?msg=request-faild');

      }

      mysqli_stmt_close($stmtvacation);

}


?>