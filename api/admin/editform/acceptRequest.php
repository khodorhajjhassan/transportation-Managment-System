<?php

require('../../../config.php');
if (isset($_POST['vacationid'])) {
    $userId = $_POST['vacationid'];
    
    $sql = "UPDATE vacation_request SET vacation_approved = 2 WHERE vacationid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);

    $response = array();

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'Request accepted successfully.';
    } else {
        $response['success'] = false;
    }

    $stmt->close();
    $conn->close();
} else {
    $response = array('success' => false);
}

header('Content-Type: application/json');
echo json_encode($response);
?>
