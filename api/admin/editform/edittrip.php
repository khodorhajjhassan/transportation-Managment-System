<?php

require_once('../../../config.php');
require('../adminfunctions.php');

try {
  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values from the POST data
    $tripid = isset($_POST["tripId"]) ? $_POST["tripId"] : '';
    $date = isset($_POST["date"]) ? $_POST["date"] : '';
    $startTime = isset($_POST["startTime"]) ? $_POST["startTime"] : '';
    $arriveTime = isset($_POST["arriveTime"]) ? $_POST["arriveTime"] : '';
    

    $data = [
      'tripid' => mysqli_real_escape_string($conn, $tripid),
      'date' => mysqli_real_escape_string($conn, $date),
      'startTime' => mysqli_real_escape_string($conn, $startTime),
      'arriveTime' => mysqli_real_escape_string($conn, $arriveTime),
    ];
    EditTrip($conn, $data);
    header('location:../../../admin?msg=tripedited');
    $conn->close();
  }
} catch (Exception $e) {
  // Handle the exception here
  echo 'An error occurred: ' . $e->getMessage();
}
?>