<?php
include 'db.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $room_id = $_POST['room_id'];
    $number_of_guests = $_POST['number_of_guests'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];

    $stmt = $pdo->prepare('SELECT * FROM rooms WHERE id = ?');
    $stmt->execute([$room_id]);
    $room = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<div class="container mt-5">
    <h1 class="text-center">Booking Confirmation</h1>
    <form action="booking_process.php" method="POST" class="mt-3">
        <div class="card mb-4">
            <img src="<?php echo htmlspecialchars($room['image_url']); ?>" class="card-img-top" alt="Room Image">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($room['room_name']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($room['description']); ?></p>
                <p class="card-text">Price: $<?php echo htmlspecialchars($room['price']); ?></p>
                <p class="card-text">Number of Guests: <?php echo htmlspecialchars($number_of_guests); ?></p>
                <p class="card-text">Check-in Date: <?php echo htmlspecialchars($check_in_date); ?></p>
                <p class="card-text">Check-out Date: <?php echo htmlspecialchars($check_out_date); ?></p>
                <input type="hidden" name="room_id" value="<?php echo htmlspecialchars($room_id); ?>">
                <input type="hidden" name="number_of_guests" value="<?php echo htmlspecialchars($number_of_guests); ?>">
                <input type="hidden" name="check_in_date" value="<?php echo htmlspecialchars($check_in_date); ?>">
                <input type="hidden" name="check_out_date" value="<?php echo htmlspecialchars($check_out_date); ?>">
                <button type="submit" class="btn btn-primary btn-block">Confirm Booking</button>
            </div>
        </div>
    </form>
</div>
<?php include 'footer.php'; ?>
