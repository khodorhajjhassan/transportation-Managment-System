<?php

require_once('../../../config.php');
require('../adminfunctions.php');

try {
  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values from the POST data
    $Busid = isset($_POST["busId"]) ? $_POST["busId"] : '';
    $Drivername = isset($_POST["driverName"]) ? $_POST["driverName"] : '';
    $MechanicDueDate = isset($_POST["mechanicDueDate"]) ? $_POST["mechanicDueDate"] : '';
    $InsuranceNumber = isset($_POST["insuranceNumber"]) ? $_POST["insuranceNumber"] : '';
    

    $data = [
      'Busid' => mysqli_real_escape_string($conn, $Busid),
      'Drivername' => mysqli_real_escape_string($conn, $Drivername),
      'MechanicDueDate' => mysqli_real_escape_string($conn, $MechanicDueDate),
      'InsuranceNumber' => mysqli_real_escape_string($conn, $InsuranceNumber),
    ];
    EditBus($conn, $data);
    header('location:../../../admin?msg=Busedited');
    $conn->close();
  }
} catch (Exception $e) {
  // Handle the exception here
  echo 'An error occurred: ' . $e->getMessage();
}
?>