<?php

class ProductListCaller
{
  public function __construct(
    private PDO    $pdo,
    private string $upload_dir = "/uploads/img/"
  )
  {
  }

  public function fetchALl(): array
  {
    $stmt = $this->pdo->prepare("SELECT * FROM products ORDER BY up_vote - down_vote DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_CLASS, Product::class);
  }

  public function handleUpload(string $filename, string $title, string $tmp_path): void
  {
    $path = get_file_path($filename, $this->upload_dir);
    $final_filename = pathinfo($path, PATHINFO_BASENAME);
    scale_and_copy($tmp_path, $path);
    $stmt = $this->pdo->prepare("INSERT INTO products (file_name, title, up_vote, down_vote) VALUES (:filename, :title, :up_vote, :down_vote)");
    $stmt->execute([
      "fil_ename" => $final_filename,
      "title" => $title,
      "up_vote" => 0,
      "down_vote" => 0
    ]);
  }

  public function deleteProduct(string $id): void
  {
    // Holt den Dateinamen des Bildes mit der ID, die Eigenschaft file_name wird sofort aufgerufen
    $file_name = $this->fetchProductById($id)->file_name;

    // Löscht Bild aus Datenbank
    $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = :id");

    $stmt->execute(["id" => $id]);

    if ($file_name) {
      unlink(dirname(__DIR__) . $this->upload_dir . $file_name);
    }
  }

  public function fetchProductById(string $id): Product|bool
  {
    // Datenbankabfrage nach Bild mit der ID
    $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = :id");

    if (!$stmt) {
      return false;
    }
    $stmt->execute(["id" => $id]);

    return $stmt->fetchObject(Product::class);
  }

  public function editProductTitle(string $id, string $title): void
  {
    $stmt = $this->pdo->prepare("UPDATE products SET title = :title WHERE id = :id");

    $stmt->execute(["title" => $title, "id" => $id]);
  }

  public function addUpvote(string $id): void
  {
    $stmt = $this->pdo->prepare("UPDATE products SET up_vote = up_vote + 1 WHERE id = :id");
    $stmt->execute(["id" => $id]);
  }

  public function addDownvote(string $id): void
  {
    $stmt = $this->pdo->prepare("UPDATE products SET down_vote = down_vote + 1 WHERE id = :id");
    $stmt->execute(["id" => $id]);
  }
}