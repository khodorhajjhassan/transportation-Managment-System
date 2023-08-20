<?php
include('../../config.php');
include('../../controller_login/user_functions.php');

$data = [
    'firstname' => mysqli_real_escape_string($conn, $_POST['firstname']),
    'lastName' => mysqli_real_escape_string($conn, $_POST['lastName']),
    'mobilenumber' => mysqli_real_escape_string($conn, $_POST['number']),
    'email' => mysqli_real_escape_string($conn, stripcslashes($_POST['email'])),
    'hashedPassword' => password_hash( mysqli_real_escape_string($conn, stripcslashes($_POST['password'])), PASSWORD_DEFAULT),
    'city' => mysqli_real_escape_string($conn, $_POST['city']),
    'useraddress' => mysqli_real_escape_string($conn, $_POST['address']),
    'birthdate' => mysqli_real_escape_string($conn, $_POST['birthdate']),
    'generatedID' => generateId(0),
];

if(existingMobile($conn,$data['mobilenumber']) && existingEmail($conn,$data['email'])){
    
    header('location:userregister.php?msg=failed'.
    "&firstname=" . urlencode($data['firstname']) . 
    "&lastName=" . urlencode($data['lastName']) . 
    "&number=" . urlencode($data['mobilenumber']) . 
    "&email=" . urlencode($data['email']) . 
    "&city=" . urlencode($data['city']) . 
    "&address=" . urlencode($data['useraddress']) . 
    "&birthdate=" . urlencode($data['birthdate']));
}
else if(existingMobile($conn,$data['mobilenumber'])){
    header('location:userregister.php?msg=Mobilefailed'.
    "&firstname=" . urlencode($data['firstname']) . 
    "&lastName=" . urlencode($data['lastName']) . 
    "&number=" . urlencode($data['mobilenumber']) . 
    "&email=" . urlencode($data['email']) . 
    "&city=" . urlencode($data['city']) . 
    "&address=" . urlencode($data['useraddress']) . 
    "&birthdate=" . urlencode($data['birthdate']));
}
else if(existingEmail($conn,$data['email'])){
    header('location:userregister.php?msg=emailfailed'. 
    "&firstname=" . urlencode($data['firstname']) . 
    "&lastName=" . urlencode($data['lastName']) . 
    "&number=" . urlencode($data['mobilenumber']) . 
    "&email=" . urlencode($data['email']) . 
    "&city=" . urlencode($data['city']) . 
    "&address=" . urlencode($data['useraddress']) . 
    "&birthdate=" . urlencode($data['birthdate']));
}
else
{
    addUser($conn,$data);
    header('location:../verification.php?email=' . urlencode($data['email']));

} 

// Close the database connection
$conn->close();
?>