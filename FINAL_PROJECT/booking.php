<?php
// booking.php - Booking Page
require 'db_hotel_management.php'; // Include your database connection

if (isset($_POST['book'])) {
    $user_id = 1; // Replace with session user ID
    $room_id = $_POST['room_id'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $total_price = $_POST['total_price'];
    
    $stmt = $conn->prepare("INSERT INTO bookings (user_id, room_id, check_in, check_out, total_price, status) VALUES (?, ?, ?, ?, ?, 'pending')");
    $stmt->bind_param("iissd", $user_id, $room_id, $check_in, $check_out, $total_price);
    if ($stmt->execute()) {
        echo "<script>alert('Booking successful!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Booking failed. Try again.');</script>";
    }
    $stmt->close();
}

$room = [];
if (isset($_GET['room_id'])) {
    $room_id = $_GET['room_id'];
    $result = $conn->query("SELECT * FROM rooms WHERE id = $room_id");
    $room = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Hotel System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="rooms.php">Rooms</a></li>
                    <li class="nav-item"><a class="nav-link" href="booking.php">Booking</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2 class="text-center">Book Your Room</h2>
        <?php if (!empty($room)): ?>
        <form method="POST" class="mt-4">
            <input type="hidden" name="room_id" value="<?php echo $room['id']; ?>">
            <div class="mb-3">
                <label class="form-label">Room Number</label>
                <input type="text" class="form-control" value="<?php echo $room['room_number']; ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Check-in Date</label>
                <input type="date" name="check_in" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Check-out Date</label>
                <input type="date" name="check_out" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Total Price</label>
                <input type="text" name="total_price" class="form-control" value="<?php echo $room['price']; ?>" readonly>
            </div>
            <button type="submit" name="book" class="btn btn-success">Confirm Booking</button>
        </form>
        <?php else: ?>
        <p class="text-danger text-center">Invalid Room Selection</p>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
