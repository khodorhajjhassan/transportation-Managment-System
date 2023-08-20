<?php
// Check if the array element exists and is not null
include_once('../config.php');
session_start();
$driverId = $_SESSION['id']; 
if (isset($_SESSION['id']) && isset($_SESSION['type']) && $_SESSION['type'] == 1) {
    $query = "SELECT u.firstname, u.lastname
          FROM users AS u
          JOIN driver AS d ON u.userid = d.driverid
          WHERE d.driverid = $driverId";

    $result = mysqli_query($conn, $query) or die("Selecting user profile failed");
    $row = mysqli_fetch_array($result);
    $_SESSION['username'] = $row['firstname'];
}
else {
    header('location:../main/login.php?msg=please_login');
    exit(); // Add this line to prevent further execution of the code
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Header</title>
</head>
<body>
    <section class="top-nav  driver-nav">
        <div class="logo">
            <a href="../index.php"><img src="../img/Transportation_Logo.png" alt=""></a>
        </div>
        <input id="menu-toggle" type="checkbox" />
        <label class='menu-button-container' for="menu-toggle">
        <div class='menu-button'></div>
      </label>
        <ul class="menu">
            <li><a class="line" href="./driver.php"><h6 class="line text-danger"><?php echo $row['firstname'] ,' ', $row['lastname'] ?></h6></a></li>
            <li><a class="line" href="./driverManage.php">Manage</a></li>
            <li><a class="line" href="./editprofile.php">Profile</a></li>
            <li><a class="signup" href="../user/logout.php">Logout</a></li>
          
      </section>
</body>
</html>