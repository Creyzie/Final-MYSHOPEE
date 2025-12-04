<?php
include "../database.php";
include "nav.php";

$sql = "SELECT orders.*, customers.fullname 
        FROM orders 
        LEFT JOIN customers ON customers.id = orders.customer_id 
        ORDER BY orders.id DESC";

$res = $connection->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">

    <?php include "nav.php"; ?>

    <h2>Orders</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Date</th>
            <th>View</th>
        </tr>

        <?php while ($r = $res->fetch_assoc()): ?>
        <tr>
            <td><?= $r['id'] ?></td>
            <td><?= htmlspecialchars($r['fullname']) ?></td>
            <td><?= $r['order_date'] ?></td>
            <td><a href="order_view.php?id=<?= $r['id'] ?>">Details</a></td>
        </tr>
        <?php endwhile; ?>

    </table>

</div>
</body>
</html>
