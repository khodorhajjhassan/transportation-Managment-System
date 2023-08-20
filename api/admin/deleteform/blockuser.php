<?php
require('../../../config.php');

if (isset($_POST['userid'])) {
    $userId = $_POST['userid'];

    $sql = "UPDATE users SET isblocked = 1 WHERE userid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);

    $response = array();

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'User blocked successfully.';
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
