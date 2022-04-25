<?php include 'view/partials/_top.html.php' ?>

<h1> Articleuh </h1>

<p><?= $article['id'] ?></p>
<h2><?= $article['title'] ?></h2>
<small>Ecrit le <?= $article['created_at'] ?></small>
<p><?= $article['content'] ?></p>









<?php include 'view/partials/_bottom.html.php' ?>