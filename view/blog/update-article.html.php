<?php include 'view/partials/_top.html.php' ?>

<h1>Modifier l'article</h1>
<form action="/?controller=blog&action=modifier" method="POST">
    <div>
        <label for="content">Titre</label>
        <textarea id="content" name="title"><?= htmlspecialchars($article['title'])?></textarea>
    </div>
    <div>
        <label for="content">Contenu</label>
        <textarea id="content" name="content"><?= htmlspecialchars($article['content']) ?></textarea>
    </div>
    <input type="hidden" name="id" value="<?= $article['id'] ?>"/>

<div class="button">
    <button type="submit">Enregistrez les modifications</button>
</div>
</form>

<?php include 'view/partials/_bottom.html.php' ?>