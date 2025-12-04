<?php
include "../database.php";
include "nav.php";
$categories = $connection->query("SELECT COUNT(*) AS total FROM categories")->fetch_assoc()['total'];
$products   = $connection->query("SELECT COUNT(*) AS total FROM products")->fetch_assoc()['total'];
$customers  = $connection->query("SELECT COUNT(*) AS total FROM customers")->fetch_assoc()['total'];
$orders     = $connection->query("SELECT COUNT(*) AS total FROM orders")->fetch_assoc()['total'];
$lowStock   = $connection->query("SELECT COUNT(*) AS total FROM products WHERE stock < 5")->fetch_assoc()['total'];
?>
<!DOCTYPE html>
<html>
<head><title>Admin Dashboard - MYSHOPEE</title><link rel="stylesheet" href="../style.css"></head>
<body>
<div class="container">
    <?php include 'nav.php'; ?>
    <h1>Admin Dashboard</h1>
    <div class="cards" style="margin-top:16px;">
        <div class="card">Categories <span style="font-size:28px;display:block;margin-top:6px;"><?= $categories ?></span></div>
        <div class="card">Products <span style="font-size:28px;display:block;margin-top:6px;"><?= $products ?></span></div>
        <div class="card">Customers <span style="font-size:28px;display:block;margin-top:6px;"><?= $customers ?></span></div>
        <div class="card">Orders <span style="font-size:28px;display:block;margin-top:6px;"><?= $orders ?></span></div>
        <div class="card">Low Stock <span style="font-size:28px;display:block;margin-top:6px;"><?= $lowStock ?></span></div>
    </div>
</div>
</body>
</html>