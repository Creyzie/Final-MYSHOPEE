<?php
include "../database.php";
include "nav.php";
$res = $connection->query("SELECT * FROM categories ORDER BY id ASC");
?>
<!DOCTYPE html>
<html>
<head><title>Categories - Admin</title><link rel="stylesheet" href="../style.css"></head>
<body>
<div class="container">
    <?php include 'nav.php'; ?>
    <h2>Categories <a style="float:right" href="category_add.php">Add</a></h2>
    <table>
    <tr><th>ID</th><th>Name</th><th>Actions</th></tr>
    <?php while($r = $res->fetch_assoc()): ?>
        <tr>
            <td><?= $r['id'] ?></td>
            <td><?= htmlspecialchars($r['name']) ?></td>
            <td><a href="category_edit.php?id=<?= $r['id'] ?>">Edit</a> | <a href="category_delete.php?id=<?= $r['id'] ?>" onclick="return confirm('Delete?')">Delete</a></td>
        </tr>
    <?php endwhile; ?>
    </table>
</div>
</body>
</html>