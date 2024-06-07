<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = 1; // Example user ID, in a real application this would come from the logged-in user session
    $room_id = $_POST['room_id'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];

    $stmt = $pdo->prepare('INSERT INTO bookings (user_id, room_id, check_in_date, check_out_date, status) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$user_id, $room_id, $check_in_date, $check_out_date, 'Pending']);

    echo 'Booking confirmed!';
}
?>
