<?php

require_once('../../../config.php');
require('../adminfunctions.php');

try {
  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values from the POST data
    $selectstation = isset($_POST["selectstation"]) ? $_POST["selectstation"] : '';
    $selectdriver = isset($_POST["selectdriver"]) ? $_POST["selectdriver"] : '';
    $capacity = isset($_POST["capacity"]) ? $_POST["capacity"] : '';
    $platenumber = isset($_POST["platenumber"]) ? $_POST["platenumber"] : '';
    $Mechanic = isset($_POST["Mechanic"]) ? $_POST["Mechanic"] : '';
    $Insurance = isset($_POST["Insurance"]) ? $_POST["Insurance"] : '';

    $data = [
      'selectstation' => mysqli_real_escape_string($conn, $selectstation),
      'selectdriver' => mysqli_real_escape_string($conn, $selectdriver),
      'capacity' => mysqli_real_escape_string($conn, $capacity),
      'platenumber' => mysqli_real_escape_string($conn, $platenumber),
      'Mechanic' => mysqli_real_escape_string($conn, $Mechanic),
      'Insurance' => mysqli_real_escape_string($conn, $Insurance)
    ];
    AddBus($conn, $data);
    $conn->close();
    header('location:../../../admin?msg=newbus');
  }
} catch (Exception $e) {
  // Handle the exception here
  echo 'An error occurred: ' . $e->getMessage();
  header('location:../../../admin?msg=notavailable');
}
?>
