<?php
require_once __DIR__ . "/../inc/all.php";

if (isset($pdo)) {
  $product_list_caller = new ProductListCaller($pdo);
}

const MAX_FILE_SIZE = 1024 * 1024 * 4;
$allowed_types = ["image/jpeg", "image/png"];
$allowed_extensions = ["jpeg", "jpg", "png"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Auslesen des Bildes
  $image = $_FILES["image"] ?? null;
  // Kontrolle, ob Bild zu groß ist
  $error = $image["error"] === 1 ? "Image is too big" : "";

  if ($image["error"] === UPLOAD_ERR_OK) {
    $error = $image["size"] > MAX_FILE_SIZE ? "File is too big" : "";

    // Kontrolle, ob der MIME-Type des Bildes erlaubt ist
    $typ = mime_content_type($image["tmp_name"]);
    $error .= in_array($typ, $allowed_types, true) ? "" : "File type not allowed";

    // Kontrolle, ob die Dateierweiterung erlaubt ist
    $extension = pathinfo(strtolower($image["name"]), PATHINFO_EXTENSION);
    $error .= in_array($extension, $allowed_extensions, true) ? "" : "File extension not allowed";

    // Verschieben des Bildes in den Upload Ordner
    if (!$error) {
      $product_list_caller->handleUpload($image["name"], $_POST["title"], $image["tmp_name"]);
    }
  } else {
    $error .= "Sorry, there was an Error: " . $image["error"];
  }
  renderAdmin(__DIR__ . "/views/admin.view.php", [
    "products" => $product_list_caller->fetchALl(),
    "error" => $error
  ]);
}