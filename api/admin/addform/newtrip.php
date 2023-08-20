<?php

require_once('../../../config.php');
require('../adminfunctions.php');

try {
  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values from the POST data
    $startLocation = isset($_POST["startLocation"]) ? $_POST["startLocation"] : '';
    $destinationLocation = isset($_POST["destinationLocation"]) ? $_POST["destinationLocation"] : '';
    $date = isset($_POST["date"]) ? $_POST["date"] : '';
    $time = isset($_POST["time"]) ? $_POST["time"] : '';
    $busNumber = isset($_POST["busNumber"]) ? $_POST["busNumber"] : '';
    $arriveTime = isset($_POST["arrivetime"]) ? $_POST["arrivetime"] : '';
    $ticketprice = isset($_POST["ticketprice"]) ? $_POST["ticketprice"] : '';
    $details = isset($_POST["details"]) ? $_POST["details"] : '';

    $data = [
      'startLocation' => mysqli_real_escape_string($conn, $startLocation),
      'destinationLocation' => mysqli_real_escape_string($conn, $destinationLocation),
      'date' => mysqli_real_escape_string($conn, $date),
      'time' => mysqli_real_escape_string($conn, $time),
      'busNumber' => mysqli_real_escape_string($conn, $busNumber),
      'arriveTime' => mysqli_real_escape_string($conn, $arriveTime),
      'ticketprice' => mysqli_real_escape_string($conn, $ticketprice),
      'details' => mysqli_real_escape_string($conn, $details),
    ];

    AddTrip($conn, $data);
    $conn->close();
    header('location:../../../admin?msg=newtrip');
  }
} catch (Exception $e) {
  // Handle the exception here
  echo 'Caught exception: ' . $e->getMessage();
}
?>
