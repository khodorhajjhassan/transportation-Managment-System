<?php
// include('../path.php');
include_once('../config.php');
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
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/searchresult.css">
    <link rel="stylesheet" href="../css/currency.css" />
    <title>Skyline Main Search Page</title>
</head>
  <body>
    <?php
  if (isset($_GET['origin']) && isset($_GET['destination'])){
  $originindex= $_GET['origin'];
  $destinationindex= $_GET['destination'];
  }
    ?>
     <?php  include('../include/mainheader.html')?>
     <span class="originindex" value="<?php if(isset($_GET['origin'])) { echo $_GET['origin']; } ?>"></span>
     <span class="destinationindex" value="<?php if(isset($_GET['destination'])) { echo $_GET['destination']; } ?>"></span>

    <section class="filter" style='padding-top:60px'>
    <div class="filter-contant container">
        <form id="mainform" class="form" action="#">
          <div class="form1" id="validateform">
            <div class="origin">
              <label for="origin">From</label>
              <select class="select" name="" id="origin">
               <option selected value="">Leaving From</option>
               <?php foreach ($dropdown['station'] as $station) {
                $stationname = $station['stationname'];
                $provincename = $station['provincename'];
                $selected = ($provincename == $_GET['origin']) ? 'selected' : '';
                echo '<option value="' . $provincename . '" ' . $selected . '>' . $provincename . ', ' . $stationname . '</option>';
              } ?>
             </select>
            </div>
            <div class="switch">
            <button onclick="toggleLocation(event)"><i class="fa-solid fa-arrows-rotate"></i></button>
            </div>
            <div class="origin">
              <label for="destination">Destination</label>
              <select class="select" name="" id="destination">
           <option selected value="">Going To</option>
           <?php foreach ($dropdown['station'] as $station) {
           $stationname = $station['stationname'];
             $provincename = $station['provincename'];
           $selected = ($provincename == $_GET['destination']) ? 'selected' : '';
          echo '<option value="' . $provincename . '" ' . $selected . '>' . $provincename . ', ' . $stationname . '</option>';
           } ?>
          </select>
            </div>
          </div>
          <div class="form1 form22">
            <div class="origin custom-date-input">
              <label for="tripdate">Date</label>
              <input id="tripdate" type="date" placeholder="Choose Date" value="<?php if(isset($_GET['tripdate'])) { echo $_GET['tripdate']; } ?>" />
            </div>

            <div class="origin dest">
              <label for="triptime">Time</label>
              <input id="triptime" type="time" placeholder="Select Time" value="<?php if(isset($_GET['triptime'])) { echo $_GET['triptime']; } ?>"/>
            </div>
          </div>
          <div class="form2">
            <button  onclick="calculateDistance();userSearchValidation(event);SearchInMain();" id="validatesearch">
              Search<i class="fa-sharp fa-solid fa-magnifying-glass"></i>
            </button>
          </div>
        </form>
      </div>
    </section>

    <div class="container mt-4 mb-4">
        <div class="row flex-column-reverse-sm">
        <div class="col-md-6 mt-1">
            <h5 class="card-title mb-2 mt-lg-0 mt-sm-4">Result: <span id="result-count">&nbspChoose places to view</span></h5>
            
                <div class="card mt-lg-0 mt-sm-4 resultborder">
                    <div class="card-body scrollable-container" >
                        <div id="result-container" >
                            
                           <h1 class="text-center mt-5">No Data was Requested Yet</h1> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="map" class="card"></div>
            </div>
        </div>
    </div>

    <?php include('../include/footer.html'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="js/mainsearch.js"></script>
    <script src="js/validation.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
            const originValue = document.querySelector('.originindex').getAttribute('value');
            const destinationValue = document.querySelector('.destinationindex').getAttribute('value');
            
            if (originValue && destinationValue) {
              SearchInMain();
            }
        });

   </script>
    
</body>
</html>
