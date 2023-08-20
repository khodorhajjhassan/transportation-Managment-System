<?php
include_once('../../config.php');
include_once('../main/functions.php');
session_start();
$sql='select * from rate';
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

$rate=$row['rate'];

$id=$_SESSION['id'];
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
            'userid' => $id
        );
        $searchResults = getTripsLogged($conn,'triptime',$data);
    }

    else if(isset($_POST['origin']) && isset($_POST['destination']) && isset($_POST['triptime']))
    {
        $triptime = $_POST['triptime'];
        $data[] = array(
            'origin' => $origin,
            'destination' => $destination,
            'triptime' => $triptime,
            'userid' => $id
        );
        $searchResults = getTripsLogged($conn,'triptime',$data);
    }
    else if( isset($_POST['origin']) && isset($_POST['destination']) && isset($_POST['tripdate']))
    {
        $tripdate = $_POST['tripdate'];
        $data[] = array(
            'origin' => $origin,
            'destination' => $destination,
            'tripdate' => $tripdate,
            'userid' => $id
        );
        $searchResults = getTripsLogged($conn,'tripdate',$data);
    }
    
    else if($_POST['origin'] && $_POST['destination'] ){
        
      
        $data[] = array(
            'origin' => $origin,
            'destination' => $destination,
            'userid' => $id
        );
        $searchResults = getTripsLogged($conn,'validated',$data);
    }
    
    if (empty($origin)) {
       
    } else {
        //print($currency);
    }
}


    mysqli_close($conn);

?>

<?php
if(!empty($origin) && !empty($destination)) {
if($searchResults){
foreach ($searchResults as $item) {
    $price = $currency === 'USD' ?'$' . number_format((int)$item['ticketprice'] / $rate,2 ): $item['ticketprice']. ' L.L';
    ?>
    <?php $price   ?>
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
                <h5 class="totaltime"><?php echo $item['schedule'] ?><span1 class="text-danger m-3"><?php echo $item['seats']?> Seats</span1></h5>
            </div>
        </div>
        <div class="rightsection">
            <h5><?php echo $price ?></h5>
            <a class="selectnone" href="./payment.php?t=<?php echo $item['tripid'] ?>&u=<?php echo $id ?>&p=<?php echo $price ?>">
    Book
</a>
<a class="shownone" href="./payment.php?t=<?php echo $item['tripid'] ?>&u=<?php echo $id ?>&p=<?php echo $price ?>"><i class="fa-solid fa-arrow-right"></i></a>

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
}
else
{ 
   ?>
<span value="<?php echo 'Not Data'; ?>"></span>
   <h1 class="text-center mt-5">Please Choose Origin and Destination</h1>
<?php
   
} 
?>
