<?php
session_start();

include('../config.php');
include('../controller_login/user_functions.php');

$data = [
    'hashedPassword' => password_hash(mysqli_real_escape_string($conn, stripslashes($_POST['password'])), PASSWORD_DEFAULT),
];
$driverId = $_SESSION['id']; 
$query = "SELECT * FROM users WHERE userid = $driverId";
$result = mysqli_query($conn, $query) or die("Selecting user profile failed");

if (mysqli_num_rows($result) > 0){

    $password=password_hash(mysqli_real_escape_string($conn, stripslashes($_POST['password'])), PASSWORD_DEFAULT);
    $sql="Update users set password=? where userid=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,'si',$password, $driverId);

    if(mysqli_stmt_execute($stmt)) {
        header('Location:editprofile.php?msg=change_success');
    }else{
        header('Location:editprofile.php?msg=change_failed');
    }

}
else{
    header('location:../main/login.php?msg=please_login');

}


$conn->close();
?>
