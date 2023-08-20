<?php 
try {
require_once('../../../config.php');
require('../../../controller_login/user_functions.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : '';
    $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : '';
    $phoneNumber = isset($_POST["mobilenumber"]) ? $_POST["mobilenumber"] : '';
    $email = isset($_POST["email"]) ? stripcslashes($_POST["email"]) : '';
    $birthdate = isset($_POST["birthdate"]) ? $_POST["birthdate"] : '';
    $city = isset($_POST["city"]) ? $_POST["city"] : '';
    $address = isset($_POST["address"]) ? $_POST["address"] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';
     
   
    
    $data = [
        'firstname' => mysqli_real_escape_string($conn, $firstname),
        'lastName' => mysqli_real_escape_string($conn, $lastname),
        'mobilenumber' => mysqli_real_escape_string($conn, $phoneNumber),
        'email' => mysqli_real_escape_string($conn, $email),
        'useraddress' => mysqli_real_escape_string($conn, $address),
        'birthdate' => mysqli_real_escape_string($conn,$birthdate),
        'role' => mysqli_real_escape_string($conn, '2'),
        'city' => mysqli_real_escape_string($conn, $city),
        'generatedID' => generateId(2),
        'hashedPassword' => password_hash(mysqli_real_escape_string($conn, stripcslashes($password)), PASSWORD_DEFAULT),
      ];

      addUser($conn, $data);
      $conn->close();
      header('location:../../../admin?msg=newadmin');
}


} catch (Exception $e) {
    // Handle the exception here
    $err = "Caught exception: " . $e->getMessage();
    

  }

?>