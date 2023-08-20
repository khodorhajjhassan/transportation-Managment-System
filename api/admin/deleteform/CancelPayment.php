<?php
require('../../../config.php');

if (isset($_POST['canceledid'])) {
    $canceledid = $_POST['canceledid'];

    $sql = "UPDATE user_canceled_trips SET refunded = 1 WHERE canceledid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $canceledid);

    $response = array();

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'Payment canceled successfully.';
    } else {
        $response['success'] = false;
        $response['message'] = 'Failed to refund the payment.';
    }

    $stmt->close();
    $conn->close();
} else {
    $response = array('success' => false, 'message' => 'Invalid request.');
}

header('Content-Type: application/json');
echo json_encode($response);
?>
