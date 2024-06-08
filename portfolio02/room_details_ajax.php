<?php
include 'db.php';

if (isset($_GET['room_id'])) {
    $room_id = $_GET['room_id'];
    $stmt = $pdo->prepare('SELECT * FROM rooms WHERE id = ?');
    $stmt->execute([$room_id]);
    $room = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($room): ?>
        <div class="card mb-4">
            <img src="<?php echo htmlspecialchars($room['image_url']); ?>" class="card-img-top" alt="Room Image">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($room['room_name']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($room['description']); ?></p>
                <p class="card-text">Price: $<?php echo htmlspecialchars($room['price']); ?></p>
            </div>
        </div>
    <?php endif;
}
?>
