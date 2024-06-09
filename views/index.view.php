<section class="gallery grid">
  <?php if (isset($products)) : ?>
    <?php foreach ($products as $product): ?>
          <article class="gallery item" style="width: 400px; margin: 0">
              <img src="<?= e($product->getSrc()) ?>" alt="<?= e($product->title) ?>">
              <h4><?= e($product->title) ?></h4>
              <p>Voting: <?= $product->getUpvotes() - $product->getDownvotes() ?></p>
          </article>
    <?php endforeach ?>
  <?php else: ?>
      <p>Es wurden bisher keine Produkte erfasst</p>
  <?php endif; ?>
</section>