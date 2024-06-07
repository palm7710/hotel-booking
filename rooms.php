<?php
include 'db.php';
include 'header.php';

$stmt = $pdo->query('SELECT * FROM rooms');
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h1>Available Rooms</h1>
<?php foreach ($rooms as $room): ?>
    <div class="room">
        <h2><?php echo htmlspecialchars($room['room_name']); ?></h2>
        <p><?php echo htmlspecialchars($room['description']); ?></p>
        <p>Price: $<?php echo htmlspecialchars($room['price']); ?></p>
        <img src="<?php echo htmlspecialchars($room['image_url']); ?>" alt="Room Image">
    </div>
<?php endforeach; ?>
<?php include 'footer.php'; ?>
