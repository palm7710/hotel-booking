<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $room_id = $_POST['room_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $stmt = $pdo->prepare('INSERT INTO reviews (user_id, room_id, rating, comment) VALUES (?, ?, ?, ?)');
    $stmt->execute([$user_id, $room_id, $rating, $comment]);

    header('Location: room_details.php?room_id=' . $room_id);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Review</title>
</head>
<body>
    <h1>Add Review</h1>
    <form action="add_review.php" method="POST">
        <input type="hidden" name="room_id" value="<?php echo $_GET['room_id']; ?>">
        <label for="rating">Rating:</label>
        <select name="rating" id="rating" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br>
        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment"></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
