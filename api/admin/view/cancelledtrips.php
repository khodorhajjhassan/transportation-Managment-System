
<?php
// Connect to MySQL database
require('../../../config.php')
?>
<?php
// Fetch data from MySQL table
$sql = "SELECT *
FROM user_canceled_trips
WHERE DATE(createdAt) >= CURDATE() - INTERVAL 10 DAY
  AND DATE(createdAt) <= CURDATE()";
$result = $conn->query($sql);

$users = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

// Close the database connection
$conn->close();
// Return the users as JSON
header('Content-Type: application/json');
echo json_encode($users);
?>