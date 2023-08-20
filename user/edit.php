<?php
session_start();

include('../config.php');
include('../controller_login/user_functions.php');

$data = [
    'firstname' => mysqli_real_escape_string($conn, $_POST['firstname']),
    'lastName' => mysqli_real_escape_string($conn, $_POST['lastName']),
    'mobilenumber' => mysqli_real_escape_string($conn, $_POST['number']),
    'hashedPassword' => password_hash(mysqli_real_escape_string($conn, stripslashes($_POST['password'])), PASSWORD_DEFAULT),
];

if (!isset($_SESSION['id']) || ($_SESSION['type'] != 0)) {
    header('location: ../main/login.php?msg=please_login');
    exit;
}

$id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE userid = $id";
$result = mysqli_query($conn, $query) or die("Selecting user profile failed");
$row = mysqli_fetch_array($result);

if (isset($_GET['msg']) && ($_GET['msg'] == "Mobilefailed")) {
    $errorMessage = "Register Failed: Mobile Number Already Exists";
} elseif (isset($_GET['msg']) && ($_GET['msg'] == "edit_success")) {
    $errorMessage = "Success Edit Profile";
}

$currentMobileNumber = $row['mobilenumber'];

if ($data['mobilenumber'] !== $currentMobileNumber) {
    if (existingMobile($conn, $data['mobilenumber'])) {
        header('location:editprofile.php?msg=Mobilefailed');
        exit;
    }
}

editprofile($conn, $data);
header('location:editprofile.php?msg=edit_success');

$conn->close();
?>
