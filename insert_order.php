<?php
// Step 1: Database connection
$servername = "localhost";
$username = "root";  // XAMPP default
$password = "";      // XAMPP default
$dbname = "mysql";   // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Get form data
$customer_name = $_POST['customer_name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$product = $_POST['product'];
$subtotal = $_POST['subtotal'];
$shipping = $_POST['shipping'];
$total = $_POST['total'];

// Step 3: Insert data into database
$sql = "INSERT INTO orders (customer_name, address, phone, product, subtotal, shipping, total)
        VALUES ('$customer_name', '$address', '$phone', '$product', '$subtotal', '$shipping', '$total')";

if ($conn->query($sql) === TRUE) {
    echo "Order placed successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
