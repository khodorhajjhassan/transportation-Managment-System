<?php
include('../path.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="searchresult.css">
  <title>Document</title>
</head>
<body>
  <div class="resultcontainer">
    <?php
    
    $data = json_decode(file_get_contents("user.json"), true);

    
    foreach ($data as $item) {
    ?>
    <div class="box">
      <div class="leftsection">
        <div class="firstrow">
          <i class="fa-solid fa-location-dot fa-xs" id="uppericon"></i>
          <h5 class="from"><?php echo $item['from']; ?></h5>
          <h5 class="origin"><?php echo $item['origin']; ?></h5>
        </div>
        <div class="secondrow">
          <i class="fa-solid fa-location-dot fa-xs" id="bottomicon"></i>
          <h5 class="to"><?php echo $item['to']; ?></h5>
          <h5 class="destination"><?php echo $item['destination']; ?></h5>
        </div>
        <div class="thirdrow">
          <i class="fa-sharp fa-solid fa-bus fa-sm"></i>
          <h5 class="totaltime"><?php echo $item['totaltime']; ?></h5>
        </div>
      </div>
      <div class="rightsection">
            <h5><?php echo $price; ?></h5>
            <a href="#">
                Select
            </a>
            <a><i class="fa-duotone fa-arrow-right fa-2xs"></i></a>
        </div>
    </div>
    <?php
    }
    ?>
  </div>
  <script src="https://kit.fontawesome.com/c2e9579f75.js" crossorigin="anonymous"></script>
</body>
</html>
