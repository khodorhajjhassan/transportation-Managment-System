<?php

require('../../../config.php')
?>
<?php
// Fetch data from MySQL table
$sql = "SELECT vacation_request.*, users.firstname, users.lastname 
        FROM vacation_request
        INNER JOIN users ON vacation_request.driverid = users.userid
        WHERE users.role = 1";
$result = $conn->query($sql);

$vacation = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $vacation[] = $row;
    }
}



$conn->close();

header('Content-Type: application/json');
echo json_encode($vacation);
?>