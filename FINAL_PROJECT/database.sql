CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,  -- Password should be hashed
    phone VARCHAR(20),
    role ENUM('admin', 'guest') DEFAULT 'guest',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE room_types (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(50) UNIQUE NOT NULL,
    description TEXT
);

CREATE TABLE room_status (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    status_name VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE rooms (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(20) UNIQUE NOT NULL,
    room_type_id INT UNSIGNED,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    status_id INT UNSIGNED,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (room_type_id) REFERENCES room_types(id) ON DELETE SET NULL,
    FOREIGN KEY (status_id) REFERENCES room_status(id) ON DELETE SET NULL
);
CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    room_id INT NOT NULL,
    check_in DATE NOT NULL,
    check_out DATE NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    status VARCHAR(20) DEFAULT 'pending',  -- Changed ENUM to VARCHAR
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX (user_id),  -- Ensures foreign key compatibility
    INDEX (room_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE
) 

CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    booking_id INT,
    amount DECIMAL(10,2) NOT NULL,
    payment_status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
    transaction_id VARCHAR(100) UNIQUE,
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE CASCADE
);

CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    room_id INT NOT NULL,
    rating TINYINT NOT NULL,  -- Used TINYINT (1 to 5)
    comment TEXT,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX (user_id),  -- Ensures proper indexing for foreign keys
    INDEX (room_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE
)

-- Insert users
INSERT INTO users (name, email, password, role) 
VALUES 
('Admin User', 'admin@example.com', 'hashed_password_here', 'admin'),
('John Doe', 'john@example.com', 'hashed_password_here', 'guest');

-- Insert room types
INSERT INTO room_types (type_name, description) 
VALUES 
('single', 'A small room for one person'),
('double', 'A room for two people'),
('suite', 'A luxurious suite with extra amenities');

-- Insert room statuses
INSERT INTO room_status (status_name) 
VALUES 
('available'),
('booked'),
('maintenance');

-- Insert rooms (Make sure room_type_id and status_id exist)
INSERT INTO rooms (room_number, room_type_id, description, price, status_id) 
VALUES 
('101', 1, 'A cozy single room with a city view.', 50.00, 1),
('102', 2, 'Spacious double room with modern amenities.', 80.00, 1),
('201', 3, 'Luxury suite with ocean view and premium services.', 150.00, 1);

-- Insert bookings (Ensure user_id and room_id exist)
INSERT INTO bookings (user_id, room_id, check_in, check_out, total_price, status) 
VALUES 
(2, 1, '2024-06-10', '2024-06-15', 250.00, 'confirmed'),
(2, 3, '2024-07-01', '2024-07-05', 600.00, 'pending');
