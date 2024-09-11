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

// Query to get orders
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Address</th><th>Phone</th><th>Product</th><th>Subtotal</th><th>Shipping</th><th>Total</th></tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['customer_name']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<td>".$row['phone']."</td>";
        echo "<td>".$row['product']."</td>";
        echo "<td>".$row['subtotal']."</td>";
        echo "<td>".$row['shipping']."</td>";
        echo "<td>".$row['total']."</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No orders found!";
}

$conn->close();
?>
