<?php
include_once('../../config.php');
include_once('../main/functions.php');
$sql='select * from rate';
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

$rate=$row['rate'];

$origin;
$destination;
$currency;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currency = $_POST['currency'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    
    if(isset($_POST['origin']) && isset($_POST['destination']) && isset($_POST['triptime']) && isset($_POST['tripdate']))
    {
        $triptime = $_POST['triptime'];
        $tripdate = $_POST['tripdate'];
        $data[] = array(
            'origin' => $origin,
            'destination' => $destination,
            'triptime' => $triptime,
            'tripdate' => $tripdate,
        );
        $searchResults = getTrips($conn,'All',$data);
    }

    else if(isset($_POST['origin']) && isset($_POST['destination']) && isset($_POST['triptime']))
    {
        $triptime = $_POST['triptime'];
        $data[] = array(
            'origin' => $origin,
            'destination' => $destination,
            'triptime' => $triptime
        );
        $searchResults = getTrips($conn,'triptime',$data);
    }
    else if( isset($_POST['origin']) && isset($_POST['destination']) && isset($_POST['tripdate']))
    {
        $tripdate = $_POST['tripdate'];
        $data[] = array(
            'origin' => $origin,
            'destination' => $destination,
            'tripdate' => $tripdate
        );
        $searchResults = getTrips($conn,'tripdate',$data);
    }
    
    else if($_POST['origin'] && $_POST['destination'] ){
        
      
        $data[] = array(
            'origin' => $origin,
            'destination' => $destination,
        );
        $searchResults = getTrips($conn,'validated',$data);
    }
    
    if (empty($origin)) {
        echo "currency not found";
    } else {
        //print($currency);
    }
}


    mysqli_close($conn);

?>

<?php
if($searchResults){
foreach ($searchResults as $item) {
    $price = $currency === 'USD' ?'$' . number_format((int)$item['ticketprice'] / $rate,2 ): $item['ticketprice']. ' L.L';
    ?>
    <div class="box">
        <div class="leftsection">
            <div class="firstrow">
                <i class="fa-solid fa-location-dot fa-xs" id="uppericon"></i>
                <h5 class="from"><?php echo $item['movetime']; ?></h5>
                <h5 class="origin"><?php echo $item['origin'].', '.$item['originlocation']; ?></h5>
            </div>
            <div class="secondrow">
                <i class="fa-solid fa-location-dot fa-xs" id="bottomicon"></i>
                <h5 class="to"><?php echo $item['arrivetime']; ?></h5>
                <h5 class="destination"><?php echo $item['destination'].', '.$item['destinationlocation']; ?></h5>
            </div>
            <div class="thirdrow">
                <i class="fa-sharp fa-solid fa-bus fa-sm"></i>
                <h5 class="totaltime"><?php echo $item['time_difference']; ?></h5>
            </div>
        </div>
        <div class="rightsection">
            <h5><?php echo $price ?></h5>
            <a class="selectnone" href="#">
                Book
            </a>
            <a class="shownone" href="#"><i class="fa-solid fa-arrow-right"></i></a>
        </div>
        
    </div>
    <span value="<?php echo count($searchResults); ?>"></span>
    <?php
}}
else
{ ?>
<span value="<?php echo 0; ?>"></span>
    <h1 class="text-center mt-5">No Data Found</h1>
<?php } 
?>
