<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the inputs.
    $name    = htmlspecialchars(strip_tags($_POST["name"]));
    $email   = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(strip_tags($_POST["message"]));

    // Your email address where you want to receive the form submissions.
    $to = "your-email@yourdomain.com";  // Replace with your actual email address.

    // Email subject.
    $subject = "New Contact Form Submission";

    // Build the email content.
    $email_content  = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Build the email headers.
    // It's a good idea to use a From address that belongs to your domain to reduce the chances of the email being marked as spam.
    $headers  = "From: no-reply@yourdomain.com\r\n";  // Replace with an email from your domain.
    $headers .= "Reply-To: $email\r\n";

    // Send the email.
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Thank you for contacting us!";
    } else {
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }
} else {
    // If the form wasn't submitted, you can redirect or display an error.
    echo "There was a problem with your submission, please try again.";
}
?>
