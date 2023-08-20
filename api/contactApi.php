<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require('../sendmail.php')  
     
    ?>
    <?php
    //sendEmailWithCC('to','cc',subject,body)

    $to = "teamesamailer@gmail.com";
$cc = "cc@example.com";
$subject = "Contact-Us-Email";
$message = "
<div style='width: 100%; background-color:#E5F6FF;padding:10px;border-radius:5px;'>
  <h2 style='color: #0A3B5F;'>You Got a New Message From:</h2>
  <h2 style='color: black;'>" . $_POST['name'] . "</h3>
  <h3 style='color: black;' >Email: <span style='color: #0A3B5F;'>" . $_POST['email'] . "</span></h3>
  <h3 style='color: black;' >Phone Number: <span style='color: #0A3B5F;'>" . $_POST['phone'] . "</span></h3>
  <h3 style='color: black;' >Message: <span style='color: #0A3B5F;'>" . $_POST['text'] . "</span></h3>
</div>
";
    sendEmailWithCC($to, $cc, $subject, $message);
    
    ?>
</body>
</html>