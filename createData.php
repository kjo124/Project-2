<?php
include 'inc/support.php';
include 'inc/control.php';

$db = new Database();
$db->createTableIngredients();
$arr = readIngredients();
foreach ($arr as $index => $item) {
  $db->addIngredient($item->name, $item->description, $item->image);
}
$db->createTableComments();

include 'inc/header.php';

header('Location: index.php');
exit;
?>
