<?php include '../template/partials/_top.html.php' ?>

<h1>Modifier l'article</h1>
<div class="d-flex justify-content-evenly">
    <form action="/?controller=blog&action=modifier" method="POST">
        <div class="my-5">
            <label for="content" class="form-label">Titre</label>
            <textarea id="content" class="form-control" rows="2" name="title"><?= htmlspecialchars($article['title'])?></textarea>
        </div>
        <div class="my-5>
            <label for="content" class="form-label">Contenu</label>
            <textarea id="content" class="form-control" rows="5" name="content"><?= htmlspecialchars($article['content']) ?></textarea>
        </div>
        <input type="hidden" name="id" class="form-check-input" value="<?= $article['id'] ?>"/>

    <div class="button">
        <button type="submit">Enregistrez les modifications</button>
    </div>
    </form>
</div>

<?php include '../template/partials/_bottom.html.php' ?>