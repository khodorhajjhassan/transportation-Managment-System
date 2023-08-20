<?php
// include('../../path.php')
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/verification.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
  </head>
  <body>
  <?php   
   include('../include/header.html');
   include_once("../config.php");

   if(isset($_POST["verify_email"])){

    $email=$_POST["email"];
    $verification_code=$_POST["verification_code"];

    $query="UPDATE users Set createAt=NOW(),emailapproved=1 where email='".$email."' AND verification_code='".$verification_code."'";
    $result=mysqli_query($conn,$query);

    if (mysqli_affected_rows($conn)==0){
      echo"<script>alert('Verification code error')</script>";
    }
    else{
      header('location:login.php?msg=verification_success');
      exit();
    }

   }
   else if(isset($_GET["v"]))
   {
    $verification_code=$_GET["v"];
    $query="UPDATE users Set createAt=NOW(),emailapproved=1 where  verification_code='".$verification_code."'";
    $result=mysqli_query($conn,$query);

    if (mysqli_affected_rows($conn)==0){
      echo"<script>alert('Verification code error')</script>";
    }
    else{
      header('location:login.php?msg=verification_success');
      exit();
    }
   }





    ?>
  <div class="container">
    <div class="card" style="width: 35rem;">
      <img
        src="https://i.ibb.co/3YpB4pH/veri.jpg"
        class="card-img-top"
        alt="..."
      />
      <div class="card-body">
        <h5 class="card-title text-center">Verify your email address</h5>
        <p class="card-text mt-4 ms-3">
          We have sent to you an email to verify your email adress and activate
          your account.the link in the email will expire in 24 hours.
        </p>
        <form method="POST">
          <input type="hidden" name="email" value='<?php echo $_GET['email'];?>' required/>
          <input type="text" name="verification_code" placeholder="Enter verification code"class="form-control" required />
          <div class="text-center">
          <input type="submit" class="btn btn-primary mt-2 m-auto" name="verify_email" value="Verify Email">
</div>
        </form>
      </div>
    </div>
  </div>
    <?php include('../include/footer.html'); ?>
  </body>
</html>
