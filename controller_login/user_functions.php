<?php
function sendVerificationEmail($email, $verificationCode) {
    // Include the sendmail.php file
    require('../../sendmail.php');

    // Prepare the email content
    $verificationLink = "http://localhost/transportation/main/verification.php?v=" . $verificationCode;
    $to = $email;
    $cc = "cc@example.com";
    $subject = "Skyline Email Verification";
    $message = "
    <div style='width: 100%; background-color:#E5F6FF;padding:10px;border-radius:5px;'>
        <h3 style='color: #0A3B5F;text-align: center;'>Here is the confirmation code to join Skyline:</h3>
        <h1 style='color: black;text-align: center;'>" . $verificationCode . "</h1>
        <h4 style='color: #0A3B5F; text-align: center;'>All you have to do is copy the confirmation code and paste it into your form to complete the email verification process.</h4>
        <h4 style='color: #0A3B5F; text-align: center;'>Or</h4>
        <div style='text-align: center;'>
            <a href='" . $verificationLink . "' style='color: #0A3B5F;'>Click here to verify your email</a>
        </div>
    </div>
    ";

    // Send the email
    sendEmailWithCC($to, $cc, $subject, $message);
}


//generates Random ID for the role
function generateId($role) {
     $prefix='';
     $randomDigits='';
    
    if ($role === 0) {
      $prefix = '1';
    } else if ($role === 1) {
      $prefix = '2';
    } else if ($role === 2) {
      $prefix = '3';
    } else {
      return "Invalid role";
    }
  
    $randomDigits = strval(mt_rand(10000000, 99999999));
    return $prefix . $randomDigits;
  }

//Check if MobileNb exists

function existingMobile($conn, $mobileNb)
{
    $query = "SELECT * FROM users WHERE mobilenumber=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $mobileNb);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if ($row) {
        return true;
    } else {
        return false;
    }
}

  
//Check if Email exists

function existingEmail($conn, $email)
{
    $query = "SELECT * FROM users WHERE email=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if ($row) {
        return true;
    } else {
        return false;
    }
}


//add user according to rule

function addUser($conn, $data)
{
    $generatedId = $data['generatedID'];
        $firstname = $data['firstname'];
        $lastname = $data['lastName'];
        $mobilenumber = $data['mobilenumber'];
        $email = $data['email'];
        $city = $data['city'];
        $useraddress = $data['useraddress'];
        $birthdate = $data['birthdate'];
        $hashedPassword = $data['hashedPassword'];
        $verefication_code= substr(number_format(time() * rand(),0,'',''), 0, 6);

    if ($data['role'] == 0) {

        $sql = "INSERT INTO users (userid, firstname, lastname, mobilenumber, email, city, address, birthdate, password, verification_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssssss", $generatedId, $firstname, $lastname, $mobilenumber, $email, $city, $useraddress, $birthdate, $hashedPassword, $verefication_code);

       if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('User added successfully.');</script>";
    sendVerificationEmail($email, $verefication_code);
    header('Location: ../main/verification.php');
} else {
    echo "<script>alert('Error: " . mysqli_stmt_error($stmt) . "');</script>";
}

        
        mysqli_stmt_close($stmt);
    }
    else if($data['role'] == 1)
    {
        $licensedate = $data['licensedate'];
        $licenseUrl = $data['licenseUrl'];
        $about = $data['about'];
        $role = $data['role'];
       // User insertion
       $sqlUser = "INSERT INTO users (userid, firstname, lastname, mobilenumber, email, city, address, birthdate, password,role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
       $stmtUser = mysqli_prepare($conn, $sqlUser);
       mysqli_stmt_bind_param($stmtUser, "ssssssssss", $generatedId, $firstname, $lastname, $mobilenumber, $email, $city, $useraddress, $birthdate, $hashedPassword,$role);

       if (mysqli_stmt_execute($stmtUser)) {
        echo "User added successfully.";
       } else {
        echo "Error: " . mysqli_stmt_error($stmtUser);
      }

       mysqli_stmt_close($stmtUser);

      // Driver insertion
      $sqlDriver = "INSERT INTO driver (driverid, licensedate, LicenseUrl, about) VALUES (?, ?, ?, ?)";
      $stmtDriver = mysqli_prepare($conn, $sqlDriver);
      mysqli_stmt_bind_param($stmtDriver, "isss", $generatedId, $licensedate, $licenseUrl, $about);

      if (mysqli_stmt_execute($stmtDriver)) {
      echo "Driver added successfully.";
      } else {
       echo "Error: " . mysqli_stmt_error($stmtDriver);
      }

      mysqli_stmt_close($stmtDriver);

    }
    else if($data['role']==2){
        $role = $data['role'];
        
        // Admin insertion
        $sqlAdmin = "INSERT INTO users (userid, firstname, lastname, mobilenumber, email, city, address, birthdate, password,role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
        $stmtAdmin = mysqli_prepare($conn, $sqlAdmin);
        mysqli_stmt_bind_param($stmtAdmin, "isssssssss", $generatedId, $firstname, $lastname, $mobilenumber, $email, $city, $useraddress, $birthdate, $hashedPassword,$role);
 
        if (mysqli_stmt_execute($stmtAdmin)) {
         echo "Admin added successfully.";
        } else {
         echo "Error: " . mysqli_stmt_error($stmtAdmin);
       }
 
       mysqli_stmt_close($stmtAdmin);
     }
}


function editprofile($conn, $data) {
    session_start();
    $id = $_SESSION['id'];

    $firstname = $data['firstname'];
    $lastname = $data['lastName'];
    $mobilenumber = $data['mobilenumber'];
    $hashedPassword = $data['hashedPassword'];

    $sql = "UPDATE users SET firstname=?, lastname=?, mobilenumber=?, password=? WHERE userid=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $firstname, $lastname, $mobilenumber, $hashedPassword, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Update Success";
        header('Location: ../user/editprofile.php?msg=edit_success');
    } else {
        echo "<script>alert('Error: " . mysqli_stmt_error($stmt) . "');</script>";
    }
    mysqli_stmt_close($stmt);
}





//Uploads to cloud
function uploadFileToCloudinary($cloudName, $apiKey, $apiSecret, $file)
{
    $uploadUrl = 'https://api.cloudinary.com/v1_1/' . $cloudName . '/image/upload';
    $timestamp = time();
    $signature = sha1('timestamp=' . $timestamp . $apiSecret);

    $postData = array(
        'file' => curl_file_create($file['tmp_name']),
        'api_key' => $apiKey,
        'timestamp' => $timestamp,
        'signature' => $signature
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $uploadUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

//Converts pdf to image +Uploads
function uploadimageFileToCloudinary($cloudName, $apiKey, $apiSecret,$file)
{

    $uploadUrl = 'https://api.cloudinary.com/v1_1/' . $cloudName . '/auto/upload';
    $timestamp = time();
    $stringToSign = 'format=png&timestamp=' . $timestamp . $apiSecret;
    $signature = sha1($stringToSign);

    $postData = array(
        'file' => new \CURLFile($file['tmp_name']),
        'api_key' => $apiKey,
        'timestamp' => $timestamp,
        'signature' => $signature,
        'pages' => '1', // Convert only the first page to an image
        'format' => 'png', // Output format (e.g., png, jpg)
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $uploadUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}



function isOnline($conn,$isOnline,$id){

    $sql = "UPDATE driver SET isOnline=? WHERE driverid=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $isOnline, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Update Success";
    } else {
        echo "<script>alert('Error: " . mysqli_stmt_error($stmt) . "');</script>";
    }
    mysqli_stmt_close($stmt);

}



?>

  


