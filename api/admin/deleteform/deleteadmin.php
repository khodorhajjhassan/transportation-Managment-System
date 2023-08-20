<?php

require_once('../../../config.php');
require('../adminfunctions.php');

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $adminId = isset($_POST["userid"]) ? $_POST["userid"] : '';


        // Prepare and execute the delete query
        $stmt = $conn->prepare("UPDATE users SET role = 0,emailapproved=1 WHERE userid = ?");
        $stmt->bind_param('i', $adminId);
        $stmt->execute();

        // Check if the delete query was successful
        if ($stmt->affected_rows > 0) {
            echo "Admin deleted successfully.";
        } else {
            echo "Admin Cannot be deleted";
            
        }
    }
} catch (Exception $e) {
    // Handle the exception here
    echo 'Admin Cannot be deleted';
}
?>
