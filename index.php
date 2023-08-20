<?php
include('path.php');
include_once('config.php');
$host = $_SERVER['HTTP_HOST'];
$apiUrl = "http://$host/transportation/api/admin/dropdown.php";
$data = file_get_contents($apiUrl);
$dropdown = json_decode($data, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">   
<link rel="icon" type="image/x-icon" href="./img/favicon.jpg">
<title>Skyline</title>
<style>
  .color{
    border:1px solid red;
  }
</style>
</head>
<body>
  <script src="js/wow.min.js">;
  </script>
  <script>
  new WOW().init();
  </script>
  <script src="./main/js/mainsearch.js"></script>

   
    <section class="top-nav">
        <div class="logo wow slideInRight" data-wow-duration="2s" data-wow-delay="" >
            <a href="index.php"><img src="./img/Transportation_Logo.png" alt=""></a>
        </div>
        <input id="menu-toggle" type="checkbox" />
        <label class='menu-button-container' for="menu-toggle">
        <div class='menu-button'></div>
      </label>
        <ul class="menu">
            <li><a class="line" href="#about-us">About</a></li>
            <li><a class="line" href="#footer">Services</a></li>
            <li><a class="line" href="./main/ContactUs.php">Contact</a></li>
            <li><a class="login" href="./main/login.php">Login</a></li>
            <li><a class="signup" href="./main/signup.php">Sign up</a></li>
          
      </section>
      <section class="background">
        <div class="container main">
            <div class="title">
                <h2 class="wow swing" data-wow-delay="1.8s">
                Interested in finding 
                low-cost travel options
                for your next adventure?
            </h2>
            <p class="wow swing" data-wow-delay="1.8s">Easily compare and book your next trip with Skyline</p>
            </div>
        </div>
      </section >
      <section class="filter">
        <div class="filter-contant container">
            <form class="form" action="#">
                <div class="form1" id="validateform">
                <div  class="origin">
                    <label for="from">From</label>
                    <select  class="select" name="" id="origin">
                      <option selected value="">Leaving From</option>
                      <?php foreach ($dropdown['station'] as $station) {
                                $stationname = $station['stationname'];
                                $provincename = $station['provincename'];
                                echo '<option value="' . $provincename . '">' . $provincename.', ' . $stationname . '</option>';
                            } ?>
                    </select>
                </div>
                <div class="switch">
                    <button onclick="toggleLocation(event)"><i class="fa-solid fa-arrows-rotate"></i></button>
                </div>
                
                <div class="origin">
                    <label for="from">Destination</label>
                    <select class="select" name="" id="destination">
                      <option selected value="">Going To</option>
                      <?php foreach ($dropdown['station'] as $station) {
                                $stationname = $station['stationname'];
                                $provincename = $station['provincename'];
                                echo '<option value="' . $provincename . '">' . $provincename.', ' . $stationname . '</option>';
                            } ?>
                    </select>
                </div>
            </div>
            <div class="form1 form22">
                <div class="origin custom-date-input">
                    <label for="from">Date</label>
                    <input id="tripdate" type="date" placeholder="Choose Date">
                </div>
              
                <div class="origin dest">
                    <label for="from">Time</label>
                    <input id="triptime" type="time" placeholder="Select Time">
                </div>
            </div>
            <div class="form2">
                <button class="IndexSearch"  id="validatesearch" >Search<i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </div>
            </form>
        </div>
        <div class="service flexSb container">
            <div class="s1 wow " data-wow-duration="1s">
                <h5>fast booking</h5>
                <p>save time by comparing all your bus travel options in one place</p>
            </div>
            <div class="s1 wow " data-wow-duration="1s">
                <h5>24/7 support</h5>
                <p>got questions? we've got answers.our customer service team is standing by</p>
            </div>
            <div class="s1 wow " data-wow-duration="1s">
                <h5>Reward program</h5>
                <p>save money on your tickets every time you travel with Skyline !</p>
            </div>
        </div>
      </section>
<!-- about-us -->
      <section>
        <div id="about-us" class="about-us">
          <div class="container marginTop">
            <div  class="busimg ">
              <img src="https://i.ibb.co/HCzS3bq/bus.png" alt="">
            </div >
            <h2 class="mb-5">About us</h2>
            <div class="gridT2">
              <div class="about-inf mt-5">
              <ul>
                <li><span>Welcome to Skyline</span> , your go-to platform for convenient and reliable bus transportation services. Whether you're commuting, planning a weekend getaway, or visiting loved ones, we provide a seamless travel experience.

                  Passengers can easily register on our website to book trips between stations. Browse available routes, select your preferred departure time, and conveniently pay online. We prioritize your comfort and strive to make your journey enjoyable.
                  
                  For drivers seeking new opportunities, join our team of skilled professionals. Enjoy flexible working hours and access to a wide range of trips. We prioritize safety and customer satisfaction, providing ongoing support and training.</li>
                  <li>
                    We are here to assist you every step of the way. If you have any questions, comments, or suggestions, please feel free to reach out to us. Our dedicated customer support team is available to provide prompt assistance.

You can contact us via email or give us a call at Phone Number. We strive to respond to all inquiries within 24 hours.

Thank you for choosing Skyline. We look forward to serving you and providing you with a reliable and convenient bus transportation experience.
                  </li> 
                  <li><a href="./main/ContactUs.php">Contact us</a></li>
                </ul>
              </div>
            
            <div class="about-img">
              <img src="./img/about-us.jpg" alt="">
             
            </div>
            </div>
          </div>
        </div>


      </section>

      <section class="whySkyline">
     
        <div class="container why-content">
            <div class="why-left why wow slideInLeft" data-wow-duration="1s" data-wow-delay="">
                <h3>why join Skyline?</h3>
                <h5>Faster booking and checkout</h5>
                <ul>
                    <li>Manage and cancel your trips with ease</li>
                    <li>Save your payment method and billing information</li>
                    <li>Save up to 5 passengers to your account!</li>
                </ul>
                <h5>Save money on your tickets</h5>
                <ul>
                    <li>Earn up to 6% of the value of your ticket in credits</li>
                    <li>Get access to all your transactions and credits history</li>
                    <li>Redeem your GO credits anytime during checkout!</li>
                    <a class="mt-4" href="./main/registration/userregister.php">Create an account</a>
                </ul>
            </div>
            <div class="why-right wow slideInRight" data-wow-duration="1s">
                <img src="https://i.ibb.co/W2HHKpr/bag.png" alt="">
            </div>

        </div>
      </section>

      <section class="ticket">
        <div class="container">
            <div class="busimg">
                <img src="https://i.ibb.co/HCzS3bq/bus.png" alt="">
            </div>
            <h3>You Can Know Buy Our Ticket From Near Partner Market</h3>
            <div class="flexSb omt">
            <img class="img1 wow bounceInUp" src="https://i.ibb.co/Lv4mCpM/bob.png" alt="Bob Finance" onclick="window.open('https://www.bob-finance.com/', '_blank')">
            <img class="img2 wow bounceInUp" src="https://i.ibb.co/f0XsB1J/wish.png" alt="WHISH" onclick="window.open('https://whish.money/', '_blank')">
            <img class="img3 wow bounceInUp" src="https://i.ibb.co/FKP9Jfx/omt.png" alt="OMT" onclick="window.open('https://www.omt.com.lb/en', '_blank')">

            </div>
        </div>
      </section>

      <section class="whySkyline">
        <div class="container why-content why-driver ">
          
            <div class="why-left wow slideInLeft" data-wow-duration="1s">
                <h3>Driver Skyline?</h3>
                <h5>Faster booking and checkout</h5>
                <ul>
                    <li>Opportunities for Growth: Mention any advancement opportunities within your organization, such as the possibility of becoming a lead driver, supervisor, or participating in specialized driving programs. This demonstrates that you value and promote career progression for your drivers.</li>
                    <li>Benefits and Perks: Outline any additional benefits and perks your company offers to drivers, such as health insurance, retirement plans, paid time off, or employee discounts. These can be valuable incentives for attracting and retaining talented drivers.</li>
                    <li>Job Stability: Mention the stability of your transport bus company, showcasing its track record and reputation as a reliable and established service provider. Assure drivers that they can rely on consistent work and job security.</li>
                    <li>Highlight the safety measures and training programs implemented to ensure the well-being of your drivers and passengers. This includes regular maintenance and inspection of vehicles, adherence to traffic regulations, and ongoing safety education for drivers. Emphasizing your commitment to safety will demonstrate your dedication to providing a secure and reliable working environment for your drivers.</li>
                    <a class="mt-2" href="./main/registration/driverregister.php">Create an account</a>
                  </ul>
              
            </div>
            <div class="why-right wow slideInRight" data-wow-duration="1s">
                <img class="imgbus2" src="./img/busback.png" alt="">
            </div>

        </div>
      </section>

      <section class="top-travel .marginT">
        <div class="container">
            <h2>Top Travelled bus routes</h2>
            <div class="top-content gridT3 padding20">
                <div class="top-img">
                    <img src="https://i.ibb.co/RpmJQhY/beirut.jpg" alt="">
                    <h5>buses from beirut city</h5>
                </div>
                <div class="top-img">
                    <img src="https://i.ibb.co/17HYrR4/saida.jpg" alt="">
                    <h5>buses from Saida city</h5>
                </div>
                <div class="top-img">
                    <img src="https://i.ibb.co/2WPB97r/aley.jpg" alt="">
                    <h5>buses from Aley city</h5>
                </div>
                <div class="top-img">
                    <img src="https://i.ibb.co/M1SbccG/tyre.jpg" alt="">
                    <h5>buses from Tyre city</h5>
                </div>
                <div class="top-img">
                    <img src="https://i.ibb.co/TmqLrr2/baalbek.jpg" alt="">
                    <h5>buses from Baalbek city</h5>
                </div>
                <div class="top-img">
                    <img src="https://i.ibb.co/PCKKWhR/byblos.jpg" alt="">
                    <h5>buses from Byblos city</h5>
                </div>
            </div>
        </div>
      </section>

 
 
      <!-- Footer -->

<?php 
include('include/footer.html')
?>

  <!-- Footer -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/indexsearch.js"></script>

</body>
</html>