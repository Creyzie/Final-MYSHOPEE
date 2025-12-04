<?php
include "../database.php";
include "nav.php";

$id = intval($_GET['id']);

$sql = "SELECT order_items.*, products.name, products.price 
        FROM order_items 
        LEFT JOIN products ON products.id = order_items.product_id 
        WHERE order_items.order_id = $id";

$res = $connection->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">

    <?php include "nav.php"; ?>

    <h2>Order Details - #<?= $id ?></h2>

    <table>
        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>

        <?php while ($r = $res->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($r['name']) ?></td>
            <td><?= $r['quantity'] ?></td>
            <td>₱<?= $r['price'] ?></td>
            <td>₱<?= $r['subtotal'] ?></td>
        </tr>
        <?php endwhile; ?>

    </table>

</div>
</body>
</html>
