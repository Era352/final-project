<?php
// review.php - Review Page
require 'db_hotel_management.php'; // Include your database connection

if (isset($_POST['submit_review'])) {
    $user_id = 1; // Replace with session user ID
    $room_id = $_POST['room_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    
    $stmt = $conn->prepare("INSERT INTO reviews (user_id, room_id, rating, comment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiis", $user_id, $room_id, $rating, $comment);
    if ($stmt->execute()) {
        echo "<script>alert('Review submitted successfully!'); window.location='rooms.php';</script>";
    } else {
        echo "<script>alert('Failed to submit review. Try again.');</script>";
    }
    $stmt->close();
}
$rooms = $conn->query("SELECT id, room_number FROM rooms");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave a Review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Leave a Review</h2>
        <form method="POST" class="mt-4">
            <div class="mb-3">
                <label class="form-label">Select Room</label>
                <select name="room_id" class="form-control" required>
                    <option value="">Select a Room</option>
                    <?php while ($room = $rooms->fetch_assoc()): ?>
                        <option value="<?php echo $room['id']; ?>"><?php echo $room['room_number']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Rating (1-5)</label>
                <input type="number" name="rating" class="form-control" min="1" max="5" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Comment</label>
                <textarea name="comment" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" name="submit_review" class="btn btn-primary">Submit Review</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
