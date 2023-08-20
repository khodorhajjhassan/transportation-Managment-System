<?php

require_once('../../../config.php');
require('../adminfunctions.php');

try {
  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values from the POST data
    $driverid = isset($_POST["driverid"]) ? $_POST["driverid"] : '';
    $Licensedate = isset($_POST["Licensedate"]) ? $_POST["Licensedate"] : '';

    echo $driverid;
    echo $Licensedate;
    

    $data = [
      'driverid' => mysqli_real_escape_string($conn, $driverid),
      'Licensedate' => mysqli_real_escape_string($conn, $Licensedate),
      
    ];
    EditDriver($conn, $data);
    header('location:../../../admin');
    $conn->close();
  }
} catch (Exception $e) {
  // Handle the exception here
  echo 'An error occurred: ' . $e->getMessage();
}
?>