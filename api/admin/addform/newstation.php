<?php

require_once('../../../config.php');
require('../adminfunctions.php');

try {
 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $Stationname = isset($_POST["stationname"]) ? $_POST["stationname"] : '';
    $Provincename = isset($_POST["provincename"]) ? $_POST["provincename"] : '';
    $capacity = isset($_POST["capacity"]) ? $_POST["capacity"] : '';
   

    $data = [
      'Stationname' => mysqli_real_escape_string($conn, $Stationname),
      'Provincename' => mysqli_real_escape_string($conn, $Provincename),
      'capacity' => mysqli_real_escape_string($conn, $capacity),
    ];
    AddStation($conn, $data);
    $conn->close();
    header('location:../../../admin?msg=newstation');
    echo "station added";
  }
} catch (Exception $e) {
  // Handle the exception here
  echo 'An error occurred: ' . $e->getMessage();
  header('location:../../../admin?msg=notavailable');
}
?>