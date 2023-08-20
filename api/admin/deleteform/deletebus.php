<?php

require_once('../../../config.php');
require('../adminfunctions.php');

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tripid = isset($_POST["busid"]) ? $_POST["busid"] : '';


        // Prepare and execute the delete query
        $stmt = $conn->prepare("DELETE FROM bus WHERE busid = ?");
        $stmt->bind_param('i', $tripid);
        $stmt->execute();

        // Check if the delete query was successful
        if ($stmt->affected_rows > 0) {
            echo "Bus deleted successfully.";
        } else {
            echo "Bus Cannot be deleted";
            
        }
    }
} catch (Exception $e) {
    // Handle the exception here
    echo 'Bus Cannot be deleted';
}
?>