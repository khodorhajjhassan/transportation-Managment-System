<?php

require_once('../../../config.php');
require('../adminfunctions.php');

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $stationid = isset($_POST["stationid"]) ? $_POST["stationid"] : '';


        // Prepare and execute the delete query
        $stmt = $conn->prepare("DELETE FROM station WHERE stationid = ?");
        $stmt->bind_param('i', $stationid);
        $stmt->execute();

        // Check if the delete query was successful
        if ($stmt->affected_rows > 0) {
            echo "Station deleted successfully.";
        } else {
            echo "Station Cannot be deleted";
            
        }
    }
} catch (Exception $e) {
    // Handle the exception here
    echo 'Bus Cannot be deleted';
}
?>