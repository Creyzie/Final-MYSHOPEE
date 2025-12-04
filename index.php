<?php
include "database.php";
$category = isset($_GET['category']) ? intval($_GET['category']) : 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>MYSHOPEE - Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1 class="title">Welcome to MYSHOPEE</h1>

    <form method="GET" style="text-align:center; margin-bottom:20px;">
        <select name="category">
            <option value="0">All Products</option>
            <?php
            $c = $connection->query("SELECT * FROM categories");
            while ($r = $c->fetch_assoc()) {
                $sel = ($category == $r['id']) ? 'selected' : '';
                echo "<option value='{$r['id']}' $sel>{$r['name']}</option>";
            }
            ?>
        </select>
        <button type="submit">Filter</button>
    </form>

    <section class="products">
    <?php
    $sql = "SELECT * FROM products";
    if ($category) $sql .= " WHERE category_id = $category";
    $result = $connection->query($sql);
    echo "<div class='product-container'>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='product'>
                <img class='product-img' src='Image/{$row['image']}' alt='{$row['name']}'>
                <h3>{$row['name']}</h3>
                <p style='margin:6px 0'>Price: ₱{$row['price']}</p>
                <p style='margin:6px 0'>Stock: {$row['stock']}</p>
                <form action='buy.php' method='POST'>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <input type='number' name='quantity' value='1' min='1' max='{$row['stock']}'>
                    <button type='submit'>Buy</button>
                </form>
            </div>";
        }
    } else {
        echo "<p>No products found.</p>";
    }
    echo "</div>";
    ?>
    </section>
</div>


</body>
</html>