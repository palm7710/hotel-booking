<?php
include 'db.php';
include 'header.php';

$stmt = $pdo->query('SELECT * FROM rooms');
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container mt-5">
    <h1 class="text-center">Available Rooms</h1>
    <div class="row mt-3">
        <?php foreach ($rooms as $room): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?php echo htmlspecialchars($room['image_url']); ?>" class="card-img-top" alt="Room Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($room['room_name']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($room['description']); ?></p>
                        <p class="card-text">Price: $<?php echo htmlspecialchars($room['price']); ?></p>
                        <a href="booking.php?room_id=<?php echo $room['id']; ?>" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include 'footer.php'; ?>
