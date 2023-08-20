<?php
include('../../config.php');
require('../../controller_login/user_functions.php');

require_once '../../env.php';

$envFilePath = dirname(dirname(__DIR__)) . '/.env';
loadEnv($envFilePath);

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = [
            'firstname' => mysqli_real_escape_string($conn, $_POST['name']),
            'lastName' => mysqli_real_escape_string($conn, $_POST['lastName']),
            'email' => mysqli_real_escape_string($conn, stripcslashes($_POST['email'])),
            'hashedPassword' => password_hash(mysqli_real_escape_string($conn, stripcslashes($_POST['password'])), PASSWORD_DEFAULT),
            'city' => mysqli_real_escape_string($conn, $_POST['city']),
            'useraddress' => mysqli_real_escape_string($conn, $_POST['address']),
            'mobilenumber' => mysqli_real_escape_string($conn, $_POST['mobilenumber']),
            'birthdate' => mysqli_real_escape_string($conn, $_POST['birthdate']),
            'licensedate' => mysqli_real_escape_string($conn, $_POST['licensedate']),
            'about' => mysqli_real_escape_string($conn, $_POST['about']),
            'role' => 1,
            'generatedID' => generateId(1),
        ];

        $file = $_FILES['file'];
        $cloudName = $_ENV['cloudName'];
        $apiKey = $_ENV['cloudapiKey'];
        $apiSecret = $_ENV['cloudapiSecret'];

        // Call the uploadFileToCloudinary function
        if(existingEmail($conn,$data['email']) && existingMobile($conn,$data['mobilenumber'])){

        header('location:driverregister.php?msg=failed'.
        "&name=" . urlencode($data['firstname']) . 
        "&lastName=" . urlencode($data['lastName']) . 
        "&email=" . urlencode($data['email']));

        }
        else if(existingMobile($conn,$data['mobilenumber'])){
            header('location:driverregister.php?msg=Mobilefailed'.
            "&name=" . urlencode($data['firstname']) . 
            "&lastName=" . urlencode($data['lastName']) . 
            "&email=" . urlencode($data['email']));
        }
        else if(existingEmail($conn,$data['email'])){
            header('location:driverregister.php?msg=emailfailed'.
            "&name=" . urlencode($data['firstname']) . 
            "&lastName=" . urlencode($data['lastName']) . 
            "&email=" . urlencode($data['email']));

        }
        $response = uploadFileToCloudinary($cloudName, $apiKey, $apiSecret, $file);

        // Handle the response
        $responseData = json_decode($response, true);

        if (isset($responseData['secure_url'])) {
            $secureUrl = $responseData['secure_url'];

            // Output the secure URL
            echo "Uploaded file URL: " . $secureUrl;
        } else {
            echo "Upload failed. Response: " . $response;
        }

        $data['licenseUrl'] = $responseData['secure_url'];
        addUser($conn, $data);
        header('location:driverwaiting.php');
    }
} catch (Exception $e) {
    // Handle the exception
    echo "An error occurred: " . $e->getMessage();
}
?>
