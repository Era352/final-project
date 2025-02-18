<?php 
require 'db_hotel_management.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Hotel System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ContactUs.php</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Booking.php</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Aboutus.php</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Payments.php</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login.php</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Review.php</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Roomdetails.php</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Roomlisting.php</a>
        </li>
      </ul>
    </div>

    <section class="bg-light text-center py-5">
        <div class="container">
            <h1 class="display-4">Welcome to our hotel</h1>
            <p class="lead">Do the best desicion to book our hotel.</p>
            <a href="rooms.php" class="btn btn-primary btn-lg">View Rooms</a>
        </div>
    </section>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="" class="card-img-top" alt="Room 100">
                <div class="card-body">
                <h5 class="card-title">Deluxe Rooms</h5>
                <p class="card-text">Spacious and luxurious with a mesmerizing view of the mountains</p>
                <a href="booking.php" class="btn btn-primary">Book Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="" class="card-img-top" alt="Room 200">
                <div class="card-body">
                <h5 class="card-title">Deluxe Rooms</h5>
                <p class="card-text">Spacious and luxurious with a mesmerizing view of the mountains</p>
                <a href="booking.php" class="btn btn-primary">Book Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="" class="card-img-top" alt="Room 300">
                <div class="card-body">
                <h5 class="card-title">Deluxe Rooms</h5>
                <p class="card-text">Spacious and luxurious with a mesmerizing view of the mountains</p>
                <a href="booking.php" class="btn btn-primary">Book Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="" class="card-img-top" alt="Room 400">
                <div class="card-body">
                <h5 class="card-title">Deluxe Rooms</h5>
                <p class="card-text">Spacious and luxurious with a mesmerizing view of the mountains</p>
                <a href="booking.php" class="btn btn-primary">Book Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="" class="card-img-top" alt="Room 500">
                <div class="card-body">
                <h5 class="card-title">Deluxe Rooms</h5>
                <p class="card-text">Spacious and luxurious with a mesmerizing view of the mountains</p>
                <a href="booking.php" class="btn btn-primary">Book Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="" class="card-img-top" alt="Room 600">
                <div class="card-body">
                <h5 class="card-title">Deluxe Rooms</h5>
                <p class="card-text">Spacious and luxurious with a mesmerizing view of the mountains</p>
                <a href="booking.php" class="btn btn-primary">Book Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="" class="card-img-top" alt="Room 700">
                <div class="card-body">
                <h5 class="card-title">Deluxe Rooms</h5>
                <p class="card-text">Spacious and luxurious with a mesmerizing view of the mountains</p>
                <a href="booking.php" class="btn btn-primary">Book Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="" class="card-img-top" alt="Room 800">
                <div class="card-body">
                <h5 class="card-title">Deluxe Rooms</h5>
                <p class="card-text">Spacious and luxurious with a mesmerizing view of the mountains</p>
                <a href="booking.php" class="btn btn-primary">Book Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="booking.php" method="POST" class="container mt-4">
    <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Check-in Date</label>
        <input type="date" name="checkin" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Check-out Date</label>
        <input type="date" name="checkout" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Book Now</button>
</form>

<form action="login.php" method="POST" class="container mt-4">
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type ="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>

</body>
</html>