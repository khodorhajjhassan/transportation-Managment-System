<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="../css/contactstyle.css" />
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.jpg">
    
  </head>
  
  <body>
    <?php include('../include/header.html'); ?>
    <div class="Contact">
      <div class="image">
        <img
        src="https://i.ibb.co/nRGYVyM/email-support-outsourcing-service-in-australia-v3os-australia-Copy.png"
          alt="ContactUs illustration" />
        </div>
        <div class="con2">
        <h2>Contact us</h2>
        <!-- action="../api/contactApi.php" method="POST" -->
        <form  id="contact" class="contact-input">
          <input type="text" id="fullName" name="name" placeholder="Full Name" />
          <input type="text" id="email" name="email" placeholder="Email" />
          <input type="text" id="phoneNumber" name="phone" placeholder="Phone Number" />
          <textarea
          name="text"
          placeholder="message..."
          id="message"
          cols="30"
          rows="10"></textarea>
          <button type="submit" id="submit-btn" name="send">Submit</button>
          <div class="p-1 text-center w-100" id="success"></div>
        </form>
      </div>
    </div>
    <?php include('../include/footer.html'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/ContactUs.js"></script>
  </body>

</html>
