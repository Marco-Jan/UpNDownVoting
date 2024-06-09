<?php
require_once __DIR__ . "/inc/all.php";

if (isset($pdo)) {
  $products = new ProductListCaller($pdo);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["upvote"])) {
  $products->addUpvote($_POST["id"]);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["downvote"])) {
  $products->addDownvote($_POST["id"]);
}

render(__DIR__ . "/views/user_index.view.php", [
  "products" => $products->fetchALl(),
]);