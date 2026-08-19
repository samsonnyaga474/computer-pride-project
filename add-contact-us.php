<?php

$conn = mysqli_connect("localhost", "root", "", "computerpride project");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

function show_message($title, $text, $isError = false) {
    $color = $isError ? "text-danger" : "text-primary";
    echo '<!doctype html><html lang="en"><head><meta charset="utf-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">';
    echo '<link rel="stylesheet" href="style.css"></head>';
    echo '<body class="bg-black text-white text-center py-5">';
    echo '<div class="container py-5"><div class="card bg-dark text-white p-5 mx-auto border-secondary rounded-4" style="max-width: 600px;">';
    echo '<h1 class="' . $color . ' mb-3">' . $title . '</h1>';
    echo '<p class="lead">' . $text . '</p>';
    echo '<a href="contact-us.html" class="btn btn-primary mt-3 px-4">Back to Contact Us</a>';
    echo '</div></div></body></html>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = trim($_POST['firstname'] ?? '');
    $lastname  = trim($_POST['lastname'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $phone     = trim($_POST['phone'] ?? '');
    $message   = trim($_POST['message'] ?? '');

    // Check required fields (matches the "required" fields in the form)
    if (empty($firstname) || empty($lastname) || empty($email) || empty($message)) {
        show_message(
            "Missing Information",
            "Please go back and fill in your first name, last name, email and message before sending.",
            true
        );
        mysqli_close($conn);
        exit;
    }

    // Check the email looks valid before saving it
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        show_message(
            "Invalid Email",
            "That email address doesn't look right. Please go back and check it.",
            true
        );
        mysqli_close($conn);
        exit;
    }

    $firstname = mysqli_real_escape_string($conn, $firstname);
    $lastname  = mysqli_real_escape_string($conn, $lastname);
    $email     = mysqli_real_escape_string($conn, $email);
    $phone     = mysqli_real_escape_string($conn, $phone);
    $message   = mysqli_real_escape_string($conn, $message);

    $sql = "INSERT INTO contact_us (firstname, lastname, email, phone, message)
            VALUES ('$firstname', '$lastname', '$email', '$phone', '$message')";

    if (mysqli_query($conn, $sql)) {
        show_message(
            "Message Sent!",
            "Thank you, <strong>" . htmlspecialchars($firstname) . "</strong>. Your message has been sent successfully. We'll get back to you soon.",
            false
        );
    } else {
        show_message(
            "Something Went Wrong",
            "Sorry, your message could not be sent. Please try again in a moment.",
            true
        );
    }
}

mysqli_close($conn);

?>