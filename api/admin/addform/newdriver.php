<?php

require_once('../../../config.php');
require('../../../sendmail.php');
require('../adminfunctions.php');
require('../../../controller_login/user_functions.php');

try {
  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values from the POST data
    $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : '';
    $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : '';
    $phoneNumber = isset($_POST["phoneNumber"]) ? $_POST["phoneNumber"] : '';
    $email = isset($_POST["email"]) ? stripcslashes($_POST["email"]) : '';
    $address = isset($_POST["address"]) ? $_POST["address"] : '';
    $licenseDate = isset($_POST["licenseDate"]) ? $_POST["licenseDate"] : '';
    $password = "Skyline2023";


    $email = $_POST['email'];
    $subject = "Status Notification";
    $cc = "teamesamailer@gmail.com";
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $cc = filter_var($cc, FILTER_SANITIZE_EMAIL);
    $message = "<p style='font-size: 16px; color: #333;'><strong>Dear Applicant,</strong></p>
    <p style='font-size: 14px; color: #555;'>Congratulations! We are pleased to inform you that you have been Added as a <span style='font-weight: bold; color: green;'>Driver</span>.</p>
    <p style='font-size: 14px; color: #555;'>We appreciate your interest and enthusiasm in joining our team. You could LogIn with the below creditanels.</p>
    <p style='margin-auto;font-size: 14px; color: #855;'>email: $email</p>
    <p style='margin-auto;font-size: 14px; color: #855;'>password: $password</p>
    <p style='font-size: 14px; color: red;'>Please Change your password after you Login.</p>
    <p style='font-size: 14px; color: #555;'>Thank you for your patience, and we look forward to welcoming you onboard.</p>
    <p style='font-size: 14px; color: #555; margin-top: 20px;'>Regards,</p>
    <p style='font-size: 14px; color: #555;'>Team Skyline</p>";

    $data = [
      'firstname' => mysqli_real_escape_string($conn, $firstname),
      'lastName' => mysqli_real_escape_string($conn, $lastname),
      'mobilenumber' => mysqli_real_escape_string($conn, $phoneNumber),
      'email' => mysqli_real_escape_string($conn, $email),
      'useraddress' => mysqli_real_escape_string($conn, $address),
      'licensedate' => mysqli_real_escape_string($conn, $licenseDate),
      'birthdate' => mysqli_real_escape_string($conn, '1970-07-02'),
      'licenseUrl' => mysqli_real_escape_string($conn, ''),
      'about' => mysqli_real_escape_string($conn, ''),
      'role' => mysqli_real_escape_string($conn, '1'),
      'city' => mysqli_real_escape_string($conn, ''),
      'generatedID' => generateId(1),
      'isaccepted' => mysqli_real_escape_string($conn, '1'),
      'hashedPassword' => password_hash(mysqli_real_escape_string($conn, stripcslashes($password)), PASSWORD_DEFAULT),
    ];

    addUser($conn, $data);

    $updateQuery = "UPDATE driver SET accepted = 1 WHERE driverid = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("s", $data['generatedID']);
    $stmt->execute();
    $stmt->close();

    sendEmailWithCC($email, $cc, $subject, $message);
    $conn->close();
    header('location:../../../admin?msg=newdriver');
  }
} catch (Exception $e) {
  // Handle the exception here
  $err = "Caught exception: " . $e->getMessage();
  
  if ($err == "Caught exception: Duplicate entry '$email' for key 'users.email_UNIQUE'") {
    header('Location: ../../../admin?msg=emailerr');
    exit();
  }
  else if($err == "Caught exception: Duplicate entry '$phoneNumber' for key 'users.mobilenumber_UNIQUE'")
  header('Location: ../../../admin?msg=mobileerr');
    exit();
}


?>
