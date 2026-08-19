<?php

$conn = mysqli_connect("localhost", "root", "", "computerpride project");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname       = mysqli_real_escape_string($conn, $_POST['fullname'] ?? '');
    $email          = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
    $phone          = mysqli_real_escape_string($conn, $_POST['phone'] ?? '');
    $course         = mysqli_real_escape_string($conn, $_POST['course'] ?? '');
    $preferred_date = mysqli_real_escape_string($conn, $_POST['preferred_date'] ?? '');
    $preferred_time = mysqli_real_escape_string($conn, $_POST['preferred_time'] ?? '');

    if (!empty($fullname) && !empty($email) && !empty($course)) {

        $sql = "INSERT INTO bookings (fullname, email, phone, course, preferred_date, preferred_time)
                VALUES ('$fullname', '$email', '$phone', '$course', '$preferred_date', '$preferred_time')";

        if (mysqli_query($conn, $sql)) {
            echo '<!doctype html><html lang="en"><head><meta charset="utf-8">';
            echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">';
            echo '<link rel="stylesheet" href="style.css"></head>';
            echo '<body class="bg-black text-white text-center py-5">';
            echo '<div class="container py-5"><div class="card bg-dark text-white p-5 mx-auto border-secondary rounded-4" style="max-width: 600px;">';
            echo '<h1 class="text-primary mb-3">Booking Confirmed!</h1>';
            echo '<p class="lead">Thank you, <strong>' . htmlspecialchars($fullname) . '</strong>. Your session request for <strong>' . htmlspecialchars($course) . '</strong> on <strong>' . htmlspecialchars($preferred_date) . '</strong> has been received.</p>';
            echo '<a href="index.html" class="btn btn-primary mt-3 px-4">Back to Home</a>';
            echo '</div></div></body></html>';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Please fill in all required fields.";
    }
}

mysqli_close($conn);

?>