<?php
include "gods-data.php";

$key = $_GET['god'] ?? null;

if (!$key || !isset($gods[$key])) {
  die("God not found.");
}

$god = $gods[$key];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $god['name'] ?> — <?= $god['title'] ?></title>
  <link rel="stylesheet" href="../assets/css/gods.css">
</head>
<body style="--god-color: <?= $god['color'] ?>">

<div class="god-page">

  <header class="god-header">
    <img src="../assets/images/gods/<?= $god['image'] ?>" alt="<?= $god['name'] ?>">
    <h1><?= $god['name'] ?></h1>
    <h2><?= $god['title'] ?></h2>
  </header>

  <section class="god-info">
    <p class="description"><?= $god['description'] ?></p>

    <div class="info-grid">
      <div><strong>Alignment:</strong> <?= $god['alignment'] ?></div>
      <div><strong>Symbol:</strong> <?= $god['symbol'] ?></div>
      <div><strong>Domains:</strong> <?= implode(", ", $god['domains']) ?></div>
      <div><strong>Worshippers:</strong> <?= $god['worshippers'] ?></div>
    </div>
  </section>

  <section class="god-tenets">
    <h3>Divine Tenets</h3>
    <ul>
      <?php foreach ($god['tenets'] as $tenet): ?>
        <li><?= $tenet ?></li>
      <?php endforeach; ?>
    </ul>
  </section>

</div>

<script src="../assets/js/gods.js"></script>
</body>
</html>
