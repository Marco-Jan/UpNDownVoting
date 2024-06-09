<?php
require_once __DIR__ . "/../inc/all.php";

if (isset($pdo)) {
  $product_list_caller = new ProductListCaller($pdo);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST["new_title"])) {
  renderAdmin(__DIR__ . "/views/edit.view.php", [
    "product" => $product_list_caller->fetchProductById($_POST["id"]),
    "id" => $_POST["id"]
  ]);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["new_title"])) {
  $id = $_POST["id"];
  $new_title = $_POST["new_title"];

  if ($id) {
    $product_list_caller->editProductTitle($id, $new_title);
  } else {
    $edit_error = "Es gab einen Fehler beim Bearbeiten.";
  }


  renderAdmin(__DIR__ . "/views/admin.view.php", [
    "products" => $product_list_caller->fetchALl(),
    "edit_error" => $edit_error ?? ""
  ]);
}