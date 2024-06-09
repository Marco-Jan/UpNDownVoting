<section>
    <h3>Produkttitel bearbeiten</h3>
    <form action="edit.php" method="post">
      <?php if (isset($product) && isset($id)): ?>
          <label for="new_title">New Title</label>
          <input type="text" name="new_title" value="<?= e($product->title) ?>">
          <input type="hidden" name="id" value="<?= e($id) ?>">
      <?php endif; ?>

        <input type="submit" value="Speichern">
    </form>
</section>