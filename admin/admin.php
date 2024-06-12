<?php
require_once __DIR__ . "/../inc/all.php";

if (isset($login)) {
  if (!$login->logged_in) {
    header("Location: /login/login.php");
  }
}
if (isset($pdo)) {
  $products = new ProductListCaller($pdo);
}

renderAdmin(__DIR__ . "/views/admin.view.php", [
  "products" => $products->fetchALl(),
]);