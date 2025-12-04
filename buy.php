<?php
include "database.php";
if (!isset($_POST['id']) || !isset($_POST['quantity'])) {
    die("Invalid request.");
}
$id = intval($_POST['id']);
$qty = intval($_POST['quantity']);
$product = $connection->query("SELECT * FROM products WHERE id=$id");
if ($product->num_rows == 0) die("Product not found.");
$p = $product->fetch_assoc();
if ($qty > $p['stock']) die("Not enough stock.");
$subtotal = $p['price'] * $qty;
// create guest customer
$connection->query("INSERT INTO customers(fullname,email,phone) VALUES('Guest','guest@example.com','000')");
$customer_id = $connection->insert_id;
// create order
$connection->query("INSERT INTO orders(customer_id) VALUES($customer_id)");
$order_id = $connection->insert_id;
// insert order item
$connection->query("INSERT INTO order_items(order_id, product_id, quantity, subtotal) VALUES($order_id, $id, $qty, $subtotal)");
// reduce stock
$newStock = $p['stock'] - $qty;
$connection->query("UPDATE products SET stock=$newStock WHERE id=$id");
?>
<!DOCTYPE html>
<html>
<head><title>Order Complete</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
    <div class="card">
        <h2>Order Successful!</h2>
        <p>You bought <?= $qty ?> × <?= htmlspecialchars($p['name']) ?></p>
        <p><a href="index.php">Return to shop</a> | <a href="admin/orders.php">View Orders (admin)</a></p>
    </div>
</div>
</body>
</html>