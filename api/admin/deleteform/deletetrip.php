<?php

require_once('../../../config.php');
require('../adminfunctions.php');

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tripid = isset($_POST["tripid"]) ? $_POST["tripid"] : '';


        // Prepare and execute the delete query
        $stmt = $conn->prepare("DELETE FROM trips WHERE tripid = ?");
        $stmt->bind_param('i', $tripid);
        $stmt->execute();

        // Check if the delete query was successful
        if ($stmt->affected_rows > 0) {
            echo "Trip deleted successfully.";
        } else {
            echo "Trip Cannot be deleted";
            
        }
    }
} catch (Exception $e) {
    // Handle the exception here
    echo 'Trip Cannot be deleted';
}
?>
