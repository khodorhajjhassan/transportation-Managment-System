
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/login.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"> 
    
    <title>login</title>
</head>
<body>
<?php 
     if (isset($_GET['msg']) && ($_GET['msg'] == "Mobilefailed")) {
      $errorMessage = "Register Failed: Mobile Number Already Exists";
     }
     else if(isset($_GET['msg']) && ($_GET['msg'] == "emailfailed"))
     {
        $errorMessage = "Register Failed: Email Already Exists";
     }
     else if(isset($_GET['msg']) && ($_GET['msg'] == "failed"))
     {
        $errorMessage = "Register Failed:Mobile and Email Already Exist";
     }

    ?>
      <section class="register ">
        <div class="container">
            <div class="login-content">
                <h2>User Sign up</h2>
                <p>PLEASE ENTER YOUR LOGIN TO SIGN UP.</p>
                <form id="loginform" action="registeruser.php" method='POST' onsubmit="return UserRegValid(event)">
                    <div class="flexSb gap-2">
                        <input type="text" name="firstname" placeholder="First Name" id="name" value="<?php echo isset($_GET['firstname']) ? $_GET['firstname'] : ''; ?>">
                        <input type="text" name="lastName" placeholder="Last Name" id="lastName" value="<?php echo isset($_GET['lastName']) ? $_GET['lastName'] : ''; ?>">
                      
                    </div>
                    <div class="flexSb gap-2">
                      <h6 class="text-danger ml-2" id="vname"></h6>
                      <h6 class="text-danger" id="vlastName"></h6>
                    </div>
                    <div class="flexSb gap-2">
                        <input type="number" name='number'  placeholder="Your Phone Number" id="number" value="<?php echo isset($_GET['number']) ? $_GET['number'] : ''; ?>">
                        <input type="date" name="birthdate"   id="birthdate" value="<?php echo isset($_GET['birthdate']) ? $_GET['birthdate'] : ''; ?>">
                    </div>       
                      <div class="flexSb gap-2">
                        <h6 class="text-danger" id="vnumber"></h6>
                        <h6 class="text-danger" id="vbirthdate"></h6>
                        </div>

                        <div class="flexSb gap-2">
                            <input type="text" name="city"  placeholder="city" id="city" value="<?php echo isset($_GET['city']) ? $_GET['city'] : ''; ?>">
                            <input type="text" name="address"  placeholder="address" id="address" value="<?php echo isset($_GET['address']) ? $_GET['address'] : ''; ?>">
                            
                        </div>
                        <div class="flexSb gap-2">
                            <h6 class="text-danger" id="vcity"></h6>
                            <h6 class="text-danger" id="vaddress"></h6>
                        </div>
                        
                        
                        
                        <input type="email" name="email"  placeholder="Email Adress" id="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
                        <h6 class="text-danger" id="vemail"></h6>
                    <div class="flexSb password">
                        <input type="password" name="password"  placeholder="password" id="password">
                         <i class="fa-solid fa-eye" onclick="showpassword(event)"></i>
                    </div>
                    <h6 class="text-danger" id="vpassword"></h6>

                    <div class="flexSb password">
                        <input type="password"  placeholder="confirm password" id="cpassword">
                        <i class="fa-solid confirmpass fa-eye" onclick="showcpassword(event)"></i>
                      </div>
                      <h6 class="text-danger" id="vcpassword"></h6>

                    <div class="flexSb ">
                        <div class="check">
                            <input type="checkbox">
                            <p>I agree to the terms of service and privacy policy</p>
                        </div>
                    </div>
                    <button class="btn-blue"  type="submit">Sign up</button>
                    <p class="dont">Already a member? <a href="../login.php">Login</a></p>
                    <div class='text-center'>
                    <span class="text-danger text-center h4" id="err"><?php echo isset($errorMessage) ? $errorMessage : ''; ?></span>
                    </div>
                </form>
            </div>
        </div>
      </div>

      </section>
      <?php include('../../include/footer.html'); ?>
      <script src="../js/validation.js"></script>
      <script>
      err=document.getElementById("err");
      setTimeout(function() {
        document.getElementById("err").style.display = "none";
      }, 4000);
    </script>
</body>
</html>