
<?php
// Connect to MySQL database
require('../../../config.php')
?>
<?php
// Fetch data from MySQL table
$sql = "SELECT * FROM station";
$result = $conn->query($sql);

$stations = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $stations[] = $row;
    }
}

// Close the database connection
$conn->close();
// Return the users as JSON
header('Content-Type: application/json');
echo json_encode($stations);
?>