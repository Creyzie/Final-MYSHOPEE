<?php
include "../database.php";

$id = intval($_GET['id']);

$connection->query("DELETE FROM products WHERE id=$id");

header('Location: products.php');
exit;
?>
