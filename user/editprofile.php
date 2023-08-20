<?php
include_once('../config.php');
include('../path.php');
// include('../path.php');

session_start();

$id = $_SESSION['id'];
if(isset($_SESSION['id'])&& ($_SESSION['type']==0))
{
    $query = "select * from users WHERE userid = $id";
    $result = mysqli_query($conn, $query) or die("Selecting user profile failed");
    $row = mysqli_fetch_array($result);
    $_SESSION['username']=$row['firstname'];
    $_SESSION['user_id']=$row['userid'];
}
else
{
  header('location:../main/login.php?msg=please_login');
    mysqli_close($conn);
}

if (isset($_GET['msg']) && ($_GET['msg'] == "Mobilefailed")) {
    $errorMessage = "Register Failed: Mobile Number Already Exists";
   }
   else if(isset($_GET['msg']) && ($_GET['msg'] == "edit_success"))
   {
    $errorMessage = "Success Edit Profiel";
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

<?php include('../include/userheader.php'); ?>
      <section class="Profile" >
        <div class="container">
            <div class="login-content">
                <h2>Edit your profile</h2>
                <p>PLEASE ENTER YOUR NEW INFORMATION</p>
                <form id="editform" action="edit.php" method='POST' onsubmit="return validation(event)">
                    <div class="flexSb gap-2">
                        <input type="text" name="firstname" placeholder="Name" id="name" value='<?php echo $row['firstname'] ?>'>
                        <input type="text" name="lastName" placeholder="Last Name" id="lastname" value='<?php echo $row['lastname'] ?>'>
                    </div>
                    <div class="flexSb gap-2">
                      <h6 class="text-danger ml-2" id="vname"></h6>
                      <h6 class="text-danger" id="vlastName"></h6>
                    </div>

                    <input type="number" name="number"  placeholder="Your Phone Number" value='<?php echo $row['mobilenumber'] ?>' id="number">
                    <h6 class="text-danger" id="vnumber"></h6>

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
                    <div class="text-center mt-2">
                        <span id='err' class="text-danger"><?php echo isset($errorMessage) ? $errorMessage :'' ?></span>

                    </div>
                    
                </form>
            </div>
        </div>
        </section>
      <?php include('../include/footer.html')   ?>
     
      <script src="js/editprofile.js"></script>
      <script>
   window.addEventListener('DOMContentLoaded', (event) => {
    var err = document.getElementById("err");
    if (err !== null) {
        setTimeout(function() {
            err.style.display = "none";
        }, 4000);
    }
});

    </script>
</body>
</html>