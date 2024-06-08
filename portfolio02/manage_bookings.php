<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare('SELECT b.*, r.room_name FROM bookings b JOIN rooms r ON b.room_id = r.id WHERE b.user_id = ?');
$stmt->execute([$user_id]);
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Bookings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Manage Bookings</h1>
    <?php foreach ($bookings as $booking): ?>
        <div class="booking">
            <h2><?php echo htmlspecialchars($booking['room_name']); ?></h2>
            <p>Check-in: <?php echo htmlspecialchars($booking['check_in_date']); ?></p>
            <p>Check-out: <?php echo htmlspecialchars($booking['check_out_date']); ?></p>
            <p>Number of Guests: <?php echo htmlspecialchars($booking['number_of_guests']); ?></p>
            <p>Status: <?php echo htmlspecialchars($booking['status']); ?></p>
        </div>
    <?php endforeach; ?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
