<?php
// admin.php - Simple Admin Panel
session_start();
require 'db_connect.php'; // Database connection

// Check if the user is an admin (Modify according to your session system)
$user_role = 'admin'; // Replace with session role check
if ($user_role !== 'admin') {
    die("Access denied. Admins only.");
}

// Handle booking status updates
if (isset($_POST['update_booking'])) {
    $booking_id = $_POST['booking_id'];
    $status = $_POST['status'];
    $stmt = $conn->prepare("UPDATE bookings SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $booking_id);
    if ($stmt->execute()) {
        echo "<script>alert('Booking updated successfully.');</script>";
    }
    $stmt->close();
}

// Fetch all bookings
$bookings = $conn->query("SELECT bookings.id, users.name, rooms.room_number, bookings.check_in, bookings.check_out, bookings.total_price, bookings.status FROM bookings JOIN users ON bookings.user_id = users.id JOIN rooms ON bookings.room_id = rooms.id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark p-3">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <a class="btn btn-light" href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Manage Bookings</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>User</th>
                    <th>Room</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $bookings->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['room_number'] ?></td>
                    <td><?= $row['check_in'] ?></td>
                    <td><?= $row['check_out'] ?></td>
                    <td>$<?= $row['total_price'] ?></td>
                    <td><?= ucfirst($row['status']) ?></td>
                    <td>
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="booking_id" value="<?= $row['id'] ?>">
                            <select name="status" class="form-select d-inline w-auto">
                                <option value="pending" <?= ($row['status'] == 'pending') ? 'selected' : '' ?>>Pending</option>
                                <option value="confirmed" <?= ($row['status'] == 'confirmed') ? 'selected' : '' ?>>Confirmed</option>
                                <option value="canceled" <?= ($row['status'] == 'canceled') ? 'selected' : '' ?>>Canceled</option>
                            </select>
                            <button type="submit" name="update_booking" class="btn btn-primary btn-sm">Update</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
