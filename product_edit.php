<?php
include "../database.php";

$id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name  = $connection->real_escape_string($_POST['name']);
    $price = floatval($_POST['price']);
    $desc  = $connection->real_escape_string($_POST['description']);
    $cat   = intval($_POST['category_id']);
    $image = $connection->real_escape_string($_POST['image']);
    $stock = intval($_POST['stock']);

    $connection->query("
        UPDATE products 
        SET name='$name', price=$price, description='$desc', 
            category_id=$cat, image='$image', stock=$stock 
        WHERE id=$id
    ");

    header("Location: products.php");
    exit;
}

$row  = $connection->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
$cats = $connection->query("SELECT * FROM categories");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">

    <?php include "nav.php"; ?>

    <h2>Edit Product</h2>

    <form method="POST">

        <input name="name" value="<?= htmlspecialchars($row['name']) ?>" required><br><br>

        <input name="price" value="<?= $row['price'] ?>" required><br><br>

        <textarea name="description"><?= htmlspecialchars($row['description']) ?></textarea><br><br>

        <select name="category_id" required>
            <?php while ($c = $cats->fetch_assoc()): ?>
                <option value="<?= $c['id'] ?>" <?= ($c['id'] == $row['category_id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($c['name']) ?>
                </option>
            <?php endwhile; ?>
        </select><br><br>

        <input name="image" value="<?= htmlspecialchars($row['image']) ?>"><br><br>

        <input name="stock" value="<?= $row['stock'] ?>"><br><br>

        <button type="submit">Update</button>

    </form>

</div>
</body>
</html>
