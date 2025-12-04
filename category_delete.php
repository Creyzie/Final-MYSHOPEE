<?php
include "../database.php";

$id = intval($_GET['id']);

$connection->query("DELETE FROM categories WHERE id=$id");

header('Location: categories.php');
exit;
?>
