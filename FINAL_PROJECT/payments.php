<?php
// payment.php - Payment Page
require 'db_connect.php'; // Include your database connection

if (isset($_POST['pay'])) {
    $user_id = 1; // Replace with session user ID
    $booking_id = $_POST['booking_id'];
    $amount = $_POST['amount'];
    $transaction_id = uniqid('txn_'); // Generate a unique transaction ID

    $stmt = $conn->prepare("INSERT INTO payments (user_id, booking_id, amount, payment_status, transaction_id) VALUES (?, ?, ?, 'pending', ?)");
    $stmt->bind_param("iids", $user_id, $booking_id, $amount, $transaction_id);
    if ($stmt->execute()) {
        echo "<script>alert('Payment successful!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Payment failed. Try again.');</script>";
    }
    $stmt->close();
}

$booking = [];
if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];
    $result = $conn->query("SELECT * FROM bookings WHERE id = $booking_id");
    $booking = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Payment</h2>
        <?php if (!empty($booking)): ?>
        <form method="POST" class="mt-4">
            <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="text" name="amount" class="form-control" value="<?php echo $booking['total_price']; ?>" readonly>
            </div>
            <button type="submit" name="pay" class="btn btn-primary">Confirm Payment</button>
        </form>
        <?php else: ?>
        <p class="text-danger text-center">Invalid Booking</p>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
