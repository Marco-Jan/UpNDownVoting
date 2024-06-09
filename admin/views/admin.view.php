<section>
    <h2>Produkte bearbeiten oder löschen</h2>
  <?php if (isset($products)): ?>
      <table>
          <thead>
          <tr>
              <th>Bild</th>
              <th>Titel</th>
              <th>Aktionen</th>
          </tr>
          </thead>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><img src="../uploads/product_images/<?= e($product->file_name) ?>" alt="<?= e($product->title) ?>"
                         width="150rem">
                </td>
                <td><?= e($product->title) ?></td>
                <td>
                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?= e($product->id) ?>">
                        <button style="margin: 10px; padding: 5px">Löschen</button>
                        <span style="color:red;"><?= $delete_error ?? "" ?></span>
                    </form>
                    <form action="edit.php" method="post">
                        <input type="hidden" name="id" value="<?= e($product->id) ?>">
                        <button style="margin: 10px; padding: 5px">Bearbeiten</button>
                        <span style="color:red;"><?= $edit_error ?? "" ?></span>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
      </table>
  <?php else: ?>
      <p>Es wurden bisher noch keine Produkte erfasst.</p>
  <?php endif; ?>
</section>

<!-- Bilder hinzufügen -->

<section>
    <h2>Produkte hinzufügen</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="image">Bild hochladen</label>
      <?php if ($error ?? null): ?>
          <div style="background-color: lightcoral; padding: 5px"><?= $error ?></div>
      <?php endif; ?>
        <input type="file" name="image" id="image" accept="image/jpeg, image/png">
        <label for="alt">Titel</label>
        <input type="text" name="title" id="title">
        <input type="submit" value="Hochladen">
    </form>
</section>