<?php
include('../../path.php')
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/login.css" />
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
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
    <title>DriverInfo page</title>
  </head>
  <body>
    <?php
  if(isset($_GET['msg']) && ($_GET['msg'] == "Mobilefailed"))
     {
        $errorMessage = "Register Failed: Email Already Exists";
     }
     ?>
    <section class="register">
      <div class="container">
        <div class="login-content">
          <h2>Driver Information</h2>
          <p>
            Please fill all the requerments information, we will contact with
            you after 48h.
          </p>
    
          <form id='registerBus' method="POST" enctype="multipart/form-data" action="registerdriver.php" onsubmit="return driverInfovalidation(event)">
            <div class="flexSb gap-2">
              <input type="text" name="city" placeholder="City" id="city" />
              <input type="text" name="address" placeholder="Address" id="address" />
            </div>
            <div class="flexSb gap-2">
              <h6 class="text-danger ml-2" id="vcity"></h6>
              <h6 class="text-danger" id="vaddress"></h6>
            </div>
            <input
              type="number"
              name="mobilenumber"
              placeholder="Phone number"
              id="mobilenumber"
            />
            <h6 class="text-danger" id="vnumber"></h6>

            <label for="date"
              >Date of birthday <span class="text-danger">*</span></label
            >
            <div class="flexSb password">
              <input id="birthdate" name="birthdate" type="date"  id="date" />
            </div>
            <h6 class="text-danger" id="vdate"></h6>

            <label for="license"
              >License Expiry <span class="text-danger">*</span></label
            >
            <div class="flexSb gap-2">
            
              <input
                type="date"
                name="licensedate"
                placeholder="Expiry Date"
                id="licensedate"
              />
            </div>
            <div class="flexSb gap-2">
              <h6 class="text-danger ml-2" id="vlnum"></h6>
              <h6 class="text-danger" id="vledate"></h6>
            </div>

            <div class="flexSb">
              <input
                id="file"
                class="custom-file-input"
                placeholder=""
                name="file"
                type="file"
              />
            </div>
            <h6 class="text-danger" id="vfile"></h6>

            <textarea
              placeholder="About Your Self..."
              name="about"
              id="about"
              rows="5"
              class="w-100"
            ></textarea>
            <h6 class="text-danger" id="vinfo"></h6>
            <input type="hidden" name="name" value="<?php echo isset($_POST['name'])?$_POST['name']:''; ?>">
            <input type="hidden" name="email" value="<?php echo isset($_POST['email'])?$_POST['email']:''; ?>">
            <input type="hidden" name="lastName" value="<?php echo isset($_POST['lastName'])?$_POST['lastName']:''; ?>">
            <input type="hidden" name="password" value="<?php echo isset($_POST['password'])?$_POST['password']:''; ?>">
            <button type="submit" class="btn-blue" style="display: block; text-align: center; line-height: 50px">Submit</button>
            <div class='text-center'>
            <span class="text-danger text-center h4" id="err"><?php echo isset($errorMessage) ? $errorMessage : ''; ?></span>
    </div>
          </form>
        </div>
      </div>
    </section>
    <!-- Footer -->
    <?php include('../../include/footer.html') ?>
    <!-- Footer -->

    <script src="../js/validation.js"></script>
  </body>
</html>
