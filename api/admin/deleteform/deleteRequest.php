<?php
require('../../../config.php');

if (isset($_POST['vacationid'])) {
    $vacationid = $_POST['vacationid'];

    $sql = "UPDATE vacation_request SET vacation_approved = 1 WHERE vacationid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $vacationid);

    $response = array();

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'Request rejected successfully.';
    } else {
        $response['success'] = false;
        $response['message'] = 'Failed to reject the request.';
    }

    $stmt->close();
    $conn->close();
} else {
    $response = array('success' => false, 'message' => 'Invalid request.');
}

header('Content-Type: application/json');
echo json_encode($response);
?>
