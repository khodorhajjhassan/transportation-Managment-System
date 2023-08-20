<?php
require('../../../sendmail.php');
require('../../../config.php');

if (isset($_POST['driverid'])) {
    $userId = $_POST['driverid'];
    $email = $_POST['email'];
    $subject = "Application Status Notification";
    $cc = "teamesamailer@gmail.com";
    $message = "<p style='font-size: 16px; color: #333;'><strong>Dear Applicant,</strong></p>
    <p style='font-size: 14px; color: #555;'>Congratulations! We are pleased to inform you that your application has been <span style='font-weight: bold; color: green;'>accepted</span>.</p>
    <p style='font-size: 14px; color: #555;'>We appreciate your interest and enthusiasm in joining our team. We will soon be contacting you with further details, including the assigned bus and any additional information you may need.</p>
    <p style='font-size: 14px; color: #555;'>Thank you for your patience, and we look forward to welcoming you onboard.</p>
    <p style='font-size: 14px; color: #555; margin-top: 20px;'>Regards,</p>
    <p style='font-size: 14px; color: #555;'>Team Skyline</p>";
    
    $sql = "UPDATE driver SET accepted = 1 WHERE driverid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);


    if ($stmt->execute()) {
        sendEmailWithCC($email, $cc, $subject, $message);
      
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
echo json_last_error_msg(); 
?>
