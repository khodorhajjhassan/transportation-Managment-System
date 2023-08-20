<?php
include('../path.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"> 
    <title>Document</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
     <?php include('../include/header.html')   ?>
    <section class="sign-up">
        <div class="sign-content flex">
            <div class="user-signup ltr-effect">
                <h3>User register</h3>
                <div class="img-content">
                    <img src="https://i.ibb.co/svt2bGX/log1-1.jpg" alt="">
                </div>
                <p>"Wherever you need to be, we'll take you there with utmost care. Trust us to make your journey unforgettable, whether you're embarking on a solo adventure or traveling with loved ones."
                  </p>
                    <a href="./registration/userregister.php">User register</a>
            </div>
            
            <div class="user-signup ltr-effect">
                <h3>Driver Register</h3>
                <div class="img-content">
                    <img src="https://i.ibb.co/F4zDgMt/log2.jpg" alt="">
                </div>
                <p>"Join our team and drive your career forward. Experience the satisfaction of transporting people safely and be a part of a company that values professionalism, growth, and rewards your dedication."</p>
                    <a href="./registration/driverregister.php">Driver register</a>

            </div>
        </div>

    </section>
             <!-- Footer -->
 <?php include('../include/footer.html')   ?>
  <!-- Footer -->
    
</body>
</html>