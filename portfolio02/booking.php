<?php
include 'header.php';
include 'db.php';

$room_id = isset($_GET['room_id']) ? $_GET['room_id'] : null;
$rooms_stmt = $pdo->query('SELECT * FROM rooms');
$rooms = $rooms_stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container mt-5">
    <h1 class="text-center">Book a Room</h1>
    <form action="booking_confirm.php" method="POST" class="mt-3">
        <div class="form-group">
            <label for="room_id">Room:</label>
            <select name="room_id" id="room_id" class="form-control" required onchange="showRoomDetails(this.value)">
                <option value="">Select a room</option>
                <?php foreach ($rooms as $room): ?>
                    <option value="<?php echo $room['id']; ?>" <?php echo $room_id == $room['id'] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($room['room_name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div id="room-details" class="mt-4">
            <?php if ($room_id): ?>
                <?php
                $stmt = $pdo->prepare('SELECT * FROM rooms WHERE id = ?');
                $stmt->execute([$room_id]);
                $selected_room = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($selected_room): ?>
                    <div class="card mb-4">
                        <img src="<?php echo htmlspecialchars($selected_room['image_url']); ?>" class="card-img-top" alt="Room Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($selected_room['room_name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($selected_room['description']); ?></p>
                            <p class="card-text">Price: $<?php echo htmlspecialchars($selected_room['price']); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="number_of_guests">Number of Guests:</label>
            <input type="number" name="number_of_guests" id="number_of_guests" class="form-control" required min="1" max="10">
        </div>
        <div class="form-group">
            <label for="check_in_date">Check-in Date:</label>
            <input type="date" name="check_in_date" id="check_in_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="check_out_date">Check-out Date:</label>
            <input type="date" name="check_out_date" id="check_out_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Proceed to Confirmation</button>
    </form>
</div>
<script>
function showRoomDetails(roomId) {
    if (roomId == "") {
        document.getElementById("room-details").innerHTML = "";
        return;
    }
    fetch(`room_details_ajax.php?room_id=${roomId}`)
        .then(response => response.text())
        .then(data => document.getElementById("room-details").innerHTML = data);
}
</script>
<?php include 'footer.php'; ?>
