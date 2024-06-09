<section class="gallery grid">
  <?php if (isset($products)) : ?>
    <?php foreach ($products as $product): ?>
          <article class="gallery item" style="width: 400px; margin: 0">
              <img src="<?= e($product->getSrc()) ?>" alt="<?= e($product->title) ?>">
              <h4><?= e($product->title) ?></h4>
              <p>Voting: <?= $product->getUpvotes() - $product->getDownvotes() ?></p>
              <form action="user_index.php" method="post">
                  <input type="hidden" name="upvote" id="upvote">
                  <input type="hidden" name="id" value="<?= e($product->id) ?>">
                  <button type="submit">Upvotes: <?= $product->getUpvotes() ?></button>
              </form>
              <form action="user_index.php" method="post">
                  <input type="hidden" name="downvote" id="downvote">
                  <input type="hidden" name="id" value="<?= e($product->id) ?>">
                  <button>Downvotes: <?= $product->getDownvotes() ?></button>
              </form>
          </article>
    <?php endforeach ?>
  <?php else: ?>
      <p>Es wurden bisher keine Produkte erfasst</p>
  <?php endif; ?>
</section>