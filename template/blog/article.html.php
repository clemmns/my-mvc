<?php include '../template/partials/_top.html.php' ?>

<h1> Articleuh </h1>


<h2>Titre : <?= $article['title'] ?></h2>
<p>Numero de l'article : <?= $article['id'] ?></p>
<small>Ecrit le : <?= $article['created_at'] ?></small>
<p><?= $article['content'] ?></p>

<!-- <?php var_dump($comments)?> -->
<form action="/?controller=blog&action=newcom" method="POST">
    <h3>Ecrivez votre commentaire</h3>
    <input type="text" name="author" placeholder="Votre pseudo"></input></br>
    <textarea name="content" id="" cols="30" rows="10" placeholder="Votre commentaire ..."></textarea></br>
    <input type="hidden" name="article_id" value="<?= $article["id"] ?>">
    <button type="submit" name="submit"><i class="bi bi-chat-text"></i> Commenter</button>
</form>
<!-- <?php 
// echo '<pre>';
// print_r($_GET); // Affiche tout le contenu de la variable $_GET
// echo '</pre>'; ?> -->

<?php if (count($comments) === 0) : ?>
    <h2>Il n'y a pas encore de commentaires pour cet article</h2>
<?php else : ?>
    <h2>Il y a déjà <?= count($comments) ?> réactions : </h2>
    <?php foreach ($comments as $comment) : ?>
        <h3>Commentaire de <?= $comment['author'] ?></h3>
        <small>Le <?= $comment['created_at'] ?></small>
        <blockquote>
            <em><?= $comment['content'] ?></em>
        </blockquote>
        <form action="/?controller=blog&action=deletecom" method="post">
            <input type="hidden" name="article_id" value="<?= $article["id"] ?>">
            <input type="hidden" name="id" value="<?= $comment['id'] ?>">
            <div>
            <input type="submit" value="Supprimer" name="submit" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?`)">
            </div>
        </form>
    <?php endforeach ?>
<?php endif ?>











<?php include '../template/partials/_bottom.html.php' ?>