<?php
include "../database.php";
include "nav.php";

$sql = "SELECT products.*, categories.name AS cat_name 
        FROM products 
        LEFT JOIN categories ON products.category_id = categories.id";

$res = $connection->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Products - Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">

    <?php include "nav.php"; ?>

    <h2>Products 
        <a style="float:right" href="product_add.php">Add</a>
    </h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>

        <?php while ($r = $res->fetch_assoc()): ?>
        <tr>
            <td><?= $r['id'] ?></td>
            <td><?= htmlspecialchars($r['name']) ?></td>
            <td>₱<?= $r['price'] ?></td>
            <td><?= htmlspecialchars($r['cat_name']) ?></td>
            <td><?= $r['stock'] ?></td>
            <td>
                <a href="product_edit.php?id=<?= $r['id'] ?>">Edit</a> | 
                <a href="product_delete.php?id=<?= $r['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>

    </table>

</div>
</body>
</html>
