<?php
include 'db.php';

$room_id = $_GET['room_id'];

$stmt = $pdo->prepare('SELECT * FROM rooms WHERE id = ?');
$stmt->execute([$room_id]);
$room = $stmt->fetch(PDO::FETCH_ASSOC);

$reviews_stmt = $pdo->prepare('SELECT r.rating, r.comment, u.username, r.created_at FROM reviews r JOIN users u ON r.user_id = u.id WHERE r.room_id = ?');
$reviews_stmt->execute([$room_id]);
$reviews = $reviews_stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Room Details</title>
</head>
<body>
    <h1><?php echo htmlspecialchars($room['room_name']); ?></h1>
    <p><?php echo htmlspecialchars($room['description']); ?></p>
    <p>Price: $<?php echo htmlspecialchars($room['price']); ?></p>
    <img src="<?php echo htmlspecialchars($room['image_url']); ?>" alt="Room Image">
    
    <h2>Reviews</h2>
    <?php foreach ($reviews as $review): ?>
        <div class="review">
            <p><strong><?php echo htmlspecialchars($review['username']); ?></strong> rated it <?php echo htmlspecialchars($review['rating']); ?>/5</p>
            <p><?php echo htmlspecialchars($review['comment']); ?></p>
            <p><?php echo htmlspecialchars($review['created_at']); ?></p>
        </div>
    <?php endforeach; ?>

    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="add_review.php?room_id=<?php echo $room_id; ?>">Add a Review</a>
    <?php else: ?>
        <p><a href="login.php">Log in</a> to add a review.</p>
    <?php endif; ?>
</body>
</html>
