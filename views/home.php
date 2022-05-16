<?php declare(strict_types=1);

$game = new Game();
if (isset($_POST['word'])) {
    $game->send($_POST['word']);
}
?>


<?php echo $game->state; ?>
<?php foreach ($game->trials as $letters) { ?>
  <div style="display:flex;flex-direction:row;padding:3px">
    <?php foreach ($letters as $letter) { ?>
      <div style="border: 1px solid black;padding:2px;width:14px;text-align:center;background-color: <?php echo $letter->color; ?>"><?php echo $letter->letter; ?></div>
    <?php } ?>
  </div>
<?php } ?>
<?php if (!isset($_POST['word'])) { ?>
  <div style="display:flex;flex-direction:row;padding:3px">
    <?php foreach (str_split($game->word) as $letter) { ?>
      <div style="border: 1px solid black;padding:2px;width:14px;height:20px;text-align:center"></div>
    <?php } ?>
  </div>
<?php } ?>

<?php if ('IN PROGRESS' === $game->state) { ?>
  <form action="/" method="post">
    <input onkeydown="return /[a-z]/i.test(event.key)" name="word" type="text" required minlength="<?php echo strlen($game->word); ?>" maxlength="<?php echo strlen($game->word); ?>">
  </form>
<?php } ?>
<?php if ('LOSE' === $game->state || 'WIN' === $game->state) { ?>
  <form action="/" method="post">
    <button name="newgame" type="submit">New game</button>
  </form>
<?php } ?>