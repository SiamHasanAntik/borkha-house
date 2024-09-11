<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $product = $_POST['product'];
    $subtotal = $_POST['subtotal'];
    $shipping = $_POST['shipping'];
    $total = $_POST['total'];

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO orders (customer_name, address, phone, product, subtotal, shipping, total) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssddd", $name, $address, $phone, $product, $subtotal, $shipping, $total);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
