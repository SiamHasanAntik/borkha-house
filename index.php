<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
</head>
<body>

    <form action="insert_order.php" method="POST">
        <label for="customer_name">Name:</label>
        <input type="text" id="customer_name" name="customer_name" required><br>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br>

        <label for="product">Product:</label>
        <input type="text" id="product" name="product" value="880.00" required><br>

        <label for="subtotal">Subtotal:</label>
        <input type="text" id="subtotal" name="subtotal" value="880.00" required><br>

        <label for="shipping">Shipping:</label>
        <input type="text" id="shipping" name="shipping" value="70.00" required><br>

        <label for="total">Total:</label>
        <input type="text" id="total" name="total" value="950.00" required><br>

        <button type="submit">Place Order</button>
    </form>

</body>
</html>