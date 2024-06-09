<?php
require_once __DIR__ . "/../inc/all.php";

if (isset($pdo)) {
  $product_list_caller = new ProductListCaller($pdo);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'] ?? null;

  if ($id) {
    $product_list_caller->deleteProduct($id);
  } else {
    $delete_error = "Es gab einen Fehler beim Löschen.";
  }

  renderAdmin(__DIR__ . "/views/admin.view.php", [
    "products" => $product_list_caller->fetchALl(),
    "delete_error" => $delete_error ?? ""
  ]);
}