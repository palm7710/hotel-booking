<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1; // Example user ID, replace with actual logged in user ID
    $room_id = $_POST['room_id'];
    $number_of_guests = $_POST['number_of_guests'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];

    $stmt = $pdo->prepare('INSERT INTO bookings (user_id, room_id, number_of_guests, check_in_date, check_out_date, status) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$user_id, $room_id, $number_of_guests, $check_in_date, $check_out_date, 'Pending']);

    echo 'Booking confirmed!';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Booking Confirmation</h1>
    <p class="text-center">Your booking has been successfully made!</p>
    <a href="index.php" class="btn btn-primary btn-block">Go to Home</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
