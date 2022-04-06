<?php


$game = new Game();
if (isset($_POST['word'])) {
  $game->submit($_POST['word']);
}
?>


<?= $game->state ?>
<?php foreach ($game->trials as $letters) : ?>
  <p>
    <?php foreach ($letters as $letter) : ?>
      <span style="background-color: <?= $letter->color ?>"><?= $letter->letter ?></span>
    <?php endforeach; ?>
  </p>
<?php endforeach; ?>
<?php if ($game->state === 'in_progress') : ?>
  <form action="/" method="post">
    <input name="word" type="text" minlength="<?= strlen($game->word) ?>" maxlength="<?= strlen($game->word) ?>">
  </form>
<?php endif; ?>
<?php if ($game->state === 'lost' or $game->state === 'win') : ?>
  <form action="/" method="post">
    <button type="submit">New game</button>
  </form>
<?php endif; ?>