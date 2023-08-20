<?php
include('../path.php')
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Day Off Form</title>
    <link rel="stylesheet" href="../css/DayOff.css">
    <link rel="stylesheet" href="../css/driver.css">

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"> 
  </head>
  <body>

  <?php include('../include/driverheader.php')  ?>
  <?php     
  
  
  if(isset($_SESSION['id']) && ($_SESSION['type']==1)){
    $name=$_SESSION['name'];
    $email=$_SESSION['email'];
    $mobilenumber=$_SESSION['mobile'];
  }
  
  
  ?>
    <div class="DayOff">
      <h1>Day Off Request Form</h1>
      <form action="vacation.php" method="post" class="Input">
        <div class="flex-input">
          <label for="name">Full Name:</label>
          <input type="text" id="name" value="<?php echo $name?>" disabled/>
        </div>
        <div class="flex-input">
          <label for="email">Email Address:</label>
          <input type="text" id="email" value="<?php echo $email?>" disabled />
        </div>
        <div class="flex-input">
          <label for="phoneNumber">Phone Number:</label>
          <input type="text" id="phoneNumber" value="<?php echo $mobilenumber?>" disabled />
        </div>
        <div class="flex gap-2" style="display: flex; align-items: center;">

          <div class="flex-input w-100">
            <label for="startDate">Start Date:</label>
            <input class="w-100" type="date" id="startDate" name="startdate"/>
          </div>
          <div class="flex-input w-100">
            <label for="endDate">End Date:</label >
            <input type="date" id="endDate" name="enddate"/>
          </div>
        </div>
        <div class="flex-input">
          <label for="reason">Reason for Day Off:</label>
          <textarea id="reason" rows="5" name="reason"></textarea>
        </div>
        <button type="submit">Submit</button>
      </form>
    </div>
  
    <?php 
    include('../include/footer.html');
    ?>
  </body>
  <script src='js/dayofvalidation.js'></script>
</html>
