<?php
include 'header.php';
?>
<h1>Book a Room</h1>
<form action="booking_confirm.php" method="POST">
    <label for="room_id">Room:</label>
    <select name="room_id" id="room_id">
        <?php
        include 'db.php';
        $stmt = $pdo->query('SELECT * FROM rooms');
        $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rooms as $room) {
            echo '<option value="' . $room['id'] . '">' . htmlspecialchars($room['room_name']) . '</option>';
        }
        ?>
    </select>
    <label for="check_in_date">Check-in Date:</label>
    <input type="date" name="check_in_date" id="check_in_date" required>
    <label for="check_out_date">Check-out Date:</label>
    <input type="date" name="check_out_date" id="check_out_date" required>
    <button type="submit">Book Now</button>
</form>
<?php include 'footer.php'; ?>
