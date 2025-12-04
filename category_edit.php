<?php
include "../database.php";

$id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $connection->real_escape_string($_POST['name']);
    $connection->query("UPDATE categories SET name='$name' WHERE id=$id");
    header('Location: categories.php');
    exit;
}

$row = $connection->query("SELECT * FROM categories WHERE id=$id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">
    <?php include "nav.php"; ?>

    <h2>Edit Category</h2>

    <form method="POST">
        <input name="name" value="<?= htmlspecialchars($row['name']) ?>" required>
        <button type="submit">Update</button>
    </form>

</div>
</body>
</html>
