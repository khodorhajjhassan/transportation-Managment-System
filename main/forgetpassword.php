<?php
include('../path.php');
include('../config.php');
function sendVerificationEmail($email, $newPassword) {
  // Include the sendmail.php file
  require('../sendmail.php');

  // Prepare the email content
  $to = $email;
  $cc = "cc@example.com";
  $subject = "Forget Password";
  $message = "
  <div style='width: 100%; background-color:#E5F6FF;padding:10px;border-radius:5px;'>
      <h3 style='color: #0A3B5F;text-align: center;'>Password Reset:</h2>
      <h1 style='color: black;text-align: center;'>" . $newPassword . "</h1>
      <h4 style='color: #0A3B5F; text-align: center;'>There is your new Password use this password and for more secure change it in your mange profiel.</h4>
  </div>
  ";

  // Send the email
  sendEmailWithCC($to, $cc, $subject, $message);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="../css/login.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
    />
    <title>Forgot Password</title>
  </head>
  <body>
  <?php 
  include('../include/header.html')?>
  <?php
if (isset($_GET['msg']) && ($_GET['msg'] == "err-email")) {
  $errorMessage = "Email NOT Found!";
 }
function generatePassword() {
  $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $password = '';
  $length = 8;

  for ($i = 0; $i < $length; $i++) {
      $index = random_int(0, strlen($characters) - 1);
      $password .= $characters[$index];
  }
  return $password;
}
// Function to hash the password
function hashPassword($password) {
  return password_hash($password, PASSWORD_DEFAULT);
}
if (isset($_POST['forget_password'])) {
  $email = $_POST['email'];

  $query = "SELECT * FROM users WHERE email = ?";
  $stmtCheckEmail = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmtCheckEmail, 's', $email);
  mysqli_stmt_execute($stmtCheckEmail);
  $result = mysqli_stmt_get_result($stmtCheckEmail);

  if (mysqli_num_rows($result) > 0) {
    
      $newPassword = generatePassword();
      $hashedPassword = hashPassword($newPassword);

      $sql = "UPDATE users SET password = ? WHERE email = ?";
      $stmt = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($stmt, 'ss', $hashedPassword, $email);

      if (mysqli_stmt_execute($stmt)) {
          sendVerificationEmail($email, $newPassword);
          header('Location: Login.php?forget_success');
      } else {
          echo "<script>alert('Error: " . mysqli_stmt_error($stmt) . "');</script>";
      }
      mysqli_stmt_close($stmt);
  } else {
      header('Location: forgetpassword.php?msg=err-email');
  }

  mysqli_stmt_close($stmtCheckEmail);
}

  ?>
    <section class="login">
      <div class="container">
        <div class="login-content">
          <h2>Forgot Password</h2>
          <p>PLEASE ENTER YOUR EMAIL ADDRESS TO RESET YOUR PASSWORD.</p>
          <form id="forgetform" method='Post'>
          
            <input oninput='handleEmailInput()' id='email' type="email" name="email"  placeholder="Email address" />
            <div class="error text-danger" id="email-error"></div>
            <button  name="forget_password" id='submit' class="btn-blue" >Reset Password</button>
            <div class="mt-2 mb-2 text-center">
            <span class="text-danger text-center" id="err"><?php echo isset($errorMessage) ? $errorMessage : ''; ?></span>
            </div>
            <p class="dont">
              Remembered your password? <a href="./login.php">Login</a>
            </p>
          </form>
        </div>
      </div>
    </section>
    <?php include('../include/footer.html') ?>
    <script src="js/validation.js"></script>
    <script>
      err=document.getElementById("err");
      setTimeout(function() {
        document.getElementById("err").style.display = "none";
      }, 4000);
    </script>
  </body>
</html>
