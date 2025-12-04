<?php
include "../database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $connection->real_escape_string($_POST['name']);
    $connection->query("INSERT INTO categories(name) VALUES('$name')");
    header('Location: categories.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">
    <?php include "nav.php"; ?>

    <h2>Add Category</h2>

    <form method="POST">
        <input name="name" placeholder="Category name" required>
        <button type="submit">Save</button>
    </form>

</div>
</body>
</html>
