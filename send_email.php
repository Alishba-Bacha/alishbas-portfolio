<?php
header('Content-Type: application/json');

// Get form data
$name = strip_tags(trim($_POST['name']));
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$phone = strip_tags(trim($_POST['phone']));
$subject = strip_tags(trim($_POST['subject']));
$message = strip_tags(trim($_POST['message']));

// Set recipient email (change to your email)
$recipient = "alishbabacha@gmail.com";

// Set email subject
$email_subject = "New contact from $name: $subject";

// Build email content
$email_content = "Name: $name\n";
$email_content .= "Email: $email\n";
$email_content .= "Phone: $phone\n\n";
$email_content .= "Message:\n$message\n";

// Build email headers
$email_headers = "From: $name <$email>";

// Send email
if (mail($recipient, $email_subject, $email_content, $email_headers)) {
    echo json_encode(array('success' => true));
} else {
    echo json_encode(array('success' => false));
}
?>