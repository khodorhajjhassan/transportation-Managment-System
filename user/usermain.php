<?php

// include('../path.php');
include_once('../config.php');
$host = $_SERVER['HTTP_HOST'];
$apiUrl = "http://$host/transportation/api/admin/dropdown.php";
$data = file_get_contents($apiUrl);
$dropdown = json_decode($data, true);

 
include_once('../config.php');
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
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/searchresult.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css"
    />
    
    <title>Skyline User Page</title>
  </head>
  
  <body>
    <?php   
   include('../include/userheader.php');
    ?>
    <div id="usermain" class="usermain">
    <section class="filter" style='padding-top:100px'>
    <div class="filter-contant container">
        <form class="form" action="#">
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
              <label  for="tripdate">Date</label>
              <input id="tripdate" type="date" placeholder="Choose Date" />
            </div>

            <div class="origin dest">
              <label for="triptime">Time</label>
              <input id="triptime" type="time" placeholder="Select Time" />
            </div>
          </div>
          <div class="form2">
            <button onclick="calculateDistance(); userSearchValidation(event);SearchInMain();" id="validatesearch">
              Search<i class="fa-sharp fa-solid fa-magnifying-glass"></i>
            </button>
          </div>
        </form>
      </div>
    </section>
  
    <div class="container mt-4">
        <div class="row flex-column-reverse-sm">
            
            <div class="col-md-6">
            <h5 class="card-title mb-2 mt-lg-0 mt-sm-4">Result: <span id="result-count">&nbspChoose places to view</span></h5>
                <div class="card mt-lg-0 mt-sm-4 resultborder">
                    <div class="card-body scrollable-container " >
                      <div id="mydiv"></div>
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
      
        <div class="row d-flex justify-content-center align-items-center">
  <div class="col-md-6 mt-sm-2">
    <div class="card mb-3 border-0">
    <div class="card shadow-lg rounded-lg">
        <div class="card-body text-center ">
          <p class="card-text h3">Wherever you need to go, we'll take you there in comfort and style. Whether it's a business trip, vacation, or a special occasion, our experienced drivers will get you to your destination safely and on time. Book your ride today and experience the ultimate in luxury transportation.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card mb-3 border-0">
      <img src="https://i.ibb.co/v4m0Wzb/bus-on-bus-stop-public-urban-transport-of-cityscape-vector.jpg" alt="" class="card-img-top">
    </div>
  </div>
</div>
      </div>
    </div>
    <?php   
   include('../include/footer.html');
    ?>
    </div>
   <script src='./js/usermain.js'></script>
   
   <script src="./js/header.js"></script>
   <script>
    function SearchInMain()
     {
       const xhr = new XMLHttpRequest();
             const url = "../api/user/userstationsearch.php";
             let origin = document.getElementById('origin').value;
             let destination = document.getElementById('destination').value;
             let tripdate = document.getElementById('tripdate').value;
             let triptime = document.getElementById('triptime').value;
     
     
             let resultcount = document.getElementById('result-count');
             let spanValue;
            console.log(tripdate)
             xhr.open("POST", url, true);
             xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
           
             xhr.onreadystatechange = function() {
               if (xhr.readyState === 4 && xhr.status === 200) {
                 const res = this.responseText;
                 const parser = new DOMParser();
                 const htmlDoc = parser.parseFromString(res, 'text/html');
                 spanValue = htmlDoc.querySelector('span').getAttribute('value');
                 result_container.innerHTML=res;
                 resultcount.innerHTML=spanValue;
                 document.getElementById("currency").textContent = 'Lira';
                 if(parseInt(spanValue)<4)
             {
               document.querySelector('.resultborder').style.border = 0;
             }else
             {
               document.querySelector('.resultborder').style.border = '1px solid #cacaca';
             }
               }
             };
             let requestBody="origin=" + encodeURIComponent(origin) + "&destination=" + encodeURIComponent(destination); 
             if(triptime && tripdate)
             {
             requestBody +="&triptime=" + encodeURIComponent(triptime) + "&tripdate=" + encodeURIComponent(tripdate);
             }
             else if(triptime){
             requestBody +="&triptime=" + encodeURIComponent(triptime);
             }
             else if(tripdate)
             {
               requestBody +="&tripdate=" + encodeURIComponent(tripdate);
             }
       
            xhr.send(requestBody);
     }
   </script>
  </body>
</html>
