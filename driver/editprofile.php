<?php
include_once('../config.php');
include('../path.php');
include('../include/driverheader.php'); 
// include('../path.php');



if (isset($_GET['msg']) && ($_GET['msg'] == "change_success")) {
    $errorMessage = "Change Password Success !";
   }
   else if(isset($_GET['msg']) && ($_GET['msg'] == "change_failed"))
   {
    $errorMessage = "Failed Change Password!";
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"> 
    <title>login</title>
</head>
<body>

      <section class="Profile" >
        <div class="container">
            <div class="login-content">
                <h2>Edit your Password</h2>
                <p>PLEASE ENTER YOUR NEW PASSWORD</p>
                <form id="editform" action="edit.php" method='POST' onsubmit="return validation(event)">
                    
                    <div class="flexSb password">
                        <input type="password" name="password"  placeholder="password" id="password">
                        <i class="fa-solid fa-eye" onclick="showpassword(event)"></i>
                    </div>
                    <h6 class="text-danger" id="vpassword"></h6>
                    <div class="flexSb password">
                        <input type="password" name="cpassword"  placeholder="confirm password" id="cpassword">
                        <i class="fa-solid confirmpass fa-eye" onclick="showcpassword(event)"></i>
                    </div>
                    <h6 class="text-danger" id="vcpassword"></h6>

                    <div class="flexSb ">
                        <div class="check">
                            <input type="checkbox">
                            <p>I agree to change my personal information</p>
                        </div>
                    </div>
                    <button class="btn-blue" type="submit">Save</button>
                    <div class="text-center" style="height:30px">
                <span class="fs-4 text-success text-center" id="err"><?php echo isset($errorMessage) ? $errorMessage : ''; ?></span>
            </div>
                    
                </form>
            </div>
        </div>
        </section>
      <?php include('../include/footer.html')   ?>
     
      <script src="js/editprofile.js"></script>
      <script>
      err=document.getElementById("err");
      setTimeout(function() {
        document.getElementById("err").style.display = "none";
      }, 4000);
    </script>
</body>
</html>