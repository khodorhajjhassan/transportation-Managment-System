<?php

require_once '../config.php';
require_once '../controller_login/user_functions.php';
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare the SQL statement
$query = "SELECT * FROM users WHERE email=?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);




if ($row && password_verify($password, $row['password'])) {
 $query2 = "SELECT * FROM driver WHERE driverid=?";
    $stmt2 = mysqli_prepare($conn, $query2);
    mysqli_stmt_bind_param($stmt2, 's', $row['userid']);
    mysqli_stmt_execute($stmt2);
    
    $result2 = mysqli_stmt_get_result($stmt2);
    $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
   

    if ($row['isblocked'] == 1) {
        
        header('location:login.php?msg=blocked');
        exit;
    }


    // Password is correct
    if ($row['role'] == 0 && $row['emailapproved'] == 1) {
        session_start();
        $_SESSION["id"] = $row['userid'];
        $_SESSION["type"] = $row['role'];
        header('location:../user/usermain.php?msg=success');
    } else if ($row['role'] == 0 && $row['emailapproved'] == 0) {
        header('location:verification.php?email='.$email.'&msg=enter-your-verification-code');
    } else if ($row['role'] == 1 && $row2['accepted'] == 1) {
        session_start();
        $_SESSION["id"] = $row['userid'];
        $_SESSION["type"] = $row['role'];
        $_SESSION["name"] = $row['firstname'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["mobile"] = $row['mobilenumber'];

        isOnline($conn,1,$_SESSION["id"]);

        header('location:../driver/driver.php?msg=success');
    }
    else if ($row['role'] == 1 && $row2['accepted'] == 0) {
        header('location:registration/driverwaiting.php');
    }
     else if ($row['role'] == 2) {
        session_start();
        $_SESSION["id"] = $row['userid'];
        $_SESSION["type"] = $row['role'];
        header('location:../admin?msg=welcome-admin');
    } else if ($row['role'] == 9) {
        session_start();
        $_SESSION["id"] = $row['userid'];
        $_SESSION["type"] = $row['role'];
        header('location:./registration/driverwaiting.php?msg=welcome-new-driver');
    }
} else {
    // Password is incorrect or user doesn't exist
    header('location:login.php?msg=failed'."&email=" . urlencode($email) );
}

?>
