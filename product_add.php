<?php
include "../database.php";

$cats = $connection->query("SELECT * FROM categories");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name  = $connection->real_escape_string($_POST['name']);
    $price = floatval($_POST['price']);
    $desc  = $connection->real_escape_string($_POST['description']);
    $cat   = intval($_POST['category_id']);
    $image = $connection->real_escape_string($_POST['image']);
    $stock = intval($_POST['stock']);

    $connection->query("
        INSERT INTO products (name, price, description, category_id, image, stock)
        VALUES ('$name', $price, '$desc', $cat, '$image', $stock)
    ");

    header("Location: products.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">

    <?php include "nav.php"; ?>

    <h2>Add Product</h2>

    <form method="POST">

        <input name="name" placeholder="Product name" required><br><br>

        <input name="price" placeholder="Price" required><br><br>

        <textarea name="description" placeholder="Description"></textarea><br><br>

        <select name="category_id" required>
            <?php while ($c = $cats->fetch_assoc()): ?>
                <option value="<?= $c['id'] ?>">
                    <?= htmlspecialchars($c['name']) ?>
                </option>
            <?php endwhile; ?>
        </select><br><br>

        <input name="image" placeholder="Image filename (e.g., fresh.jpg)"><br><br>

        <input name="stock" placeholder="Stock" value="20"><br><br>

        <button type="submit">Save</button>

    </form>

</div>
</body>
</html>
