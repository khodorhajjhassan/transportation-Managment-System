<?php
// Connect to MySQL database
require('../../config.php')
?>
<?php
// Fetch data from MySQL table
$stations = "SELECT * FROM station";
$drivers = "SELECT driverid as driverid,CONCAT(users.firstname,' ',users.lastname) as Drivers FROM driver 
join users on users.userid=driver.driverid;";
$busses = "SELECT bus.busid,station.provincename AS buslocation FROM skyline.bus join skyline.station on (bus.stationid=station.stationid)";

$resultstation = $conn->query($stations);
$resultdriver = $conn->query($drivers);
$resultbus = $conn->query($busses);


$station = array();
$driver = array();
$bus = array();


if ($resultstation->num_rows > 0) {
    while ($row = $resultstation->fetch_assoc()) {
        $station[] = $row;
    }
}

if ($resultdriver->num_rows > 0) {
    while ($row = $resultdriver->fetch_assoc()) {
        $driver[] = $row;
    }
}

if ($resultbus->num_rows > 0) {
    while ($row = $resultbus->fetch_assoc()) {
        $bus[] = $row;
    }
}

$data =array();

$data['station'] = $station;
$data['driver'] = $driver;
$data['bus'] = $bus;
// Close the database connection
$conn->close();
// Return the users as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>