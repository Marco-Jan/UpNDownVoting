<?php
require_once __DIR__ . "/../inc/all.php";

if (isset($login)) {
  if (!$login->logged_in) {
    header("Location: /php_start_projects/up_down_voting/login/login.php");
  }
}
if (isset($pdo)) {
  $products = new ProductListCaller($pdo);
}

renderAdmin(__DIR__ . "/views/admin.view.php", [
  "products" => $products->fetchALl(),
]);