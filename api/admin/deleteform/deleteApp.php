<?php
require('../../../sendmail.php');
require('../../../config.php');

if (isset($_POST['driverid'])) {
    $userId = $_POST['driverid'];
    $email = $_POST['email'];
    $subject = "Application Status Notification";
    $cc = "teamesamailer@gmail.com";
    $message = "<p style='font-size: 16px; color: #333;'><strong>Dear Applicant,</strong></p>
<p style='font-size: 14px; color: #555;'>We regret to inform you that your application has been <span style='font-weight: bold; color: red;'>rejected</span>.</p>
<p style='font-size: 14px; color: #555;'>We appreciate your interest and effort in applying to our service. Although your application was not successful at this time, we encourage you to consider registering as a user on our website. As a registered user, you can still benefit from our services and stay connected with us.</p>
<p style='font-size: 14px; color: #555;'>Thank you for your understanding.</p>
<p style='font-size: 14px; color: #555; margin-top: 20px;'>Regards,</p>
    <p style='font-size: 14px; color: #555;'>Team Skyline</p>";

    $sql = "DELETE FROM driver WHERE driverid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);

    $response = array();

    if ($stmt->execute()) {
        
        $sql = "UPDATE users SET role = 0 WHERE userid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $userId);
        
        if ($stmt->execute()) {
            $response['success'] = true;
            sendEmailWithCC($email, $cc, $subject, $message);
            $response['message'] = 'Driver rejected successfully.';
        } else {
            $response['success'] = false;
            $response['message'] = 'Failed to update user role.';
        }
    } else {
        $response['success'] = false;
        $response['message'] = 'Failed to delete driver entry.';
    }

    $stmt->close();
    $conn->close();
} else {
    $response = array('success' => false, 'message' => 'Missing driverid parameter.');
}

header('Content-Type: application/json');
echo json_encode($response);
?>
