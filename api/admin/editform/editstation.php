<?php

require_once('../../../config.php');
require('../adminfunctions.php');

try {
  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values from the POST data
    $Stationid = isset($_POST["stationid"]) ? $_POST["stationid"] : '';
    $Stationname = isset($_POST["stationname"]) ? $_POST["stationname"] : '';
    $Provincename = isset($_POST["provincename"]) ? $_POST["provincename"] : '';
    $Capacity = isset($_POST["capacity"]) ? $_POST["capacity"] : '';
    

    $data = [
      'stationid' => mysqli_real_escape_string($conn, $Stationid),
      'stationname' => mysqli_real_escape_string($conn, $Stationname),
      'provincename' => mysqli_real_escape_string($conn, $Provincename),
      'capacity' => mysqli_real_escape_string($conn, $Capacity),
    ];
    EditStation($conn, $data);
    //header('location:../../../admin?msg=stationedited');
    $conn->close();
  }
} catch (Exception $e) {
  // Handle the exception here
  echo 'An error occurred: ' . $e->getMessage();
}
?>