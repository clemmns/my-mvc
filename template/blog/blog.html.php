<?php include '../template/partials/_top.html.php' ?>

<h1> BLOGUI BLOUGA </h1>
<form action="/?controller=blog&action=showForm" method="post">
<input type="submit" value="Nouvel article" name="submit" onclick="return window.confirm(`Ecrire un nouvel article?`)">
</form>
    <table class= "table table-bordered mt-5">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Plus</th>
                <th>Créé le</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($articles as $article): ?>
            <tr>
                <td><?= $article["id"] ?></td>
                <td><?= $article["title"] ?></td>
                <td><a href="/?controller=blog&action=article&id=<?= $article["id"] ?>">Voir l'article</a></td>
                <td><?= $article["created_at"] ?></td>
                <td>
                    <a href="/?controller=blog&action=update&id=<?= $article["id"] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir modifier cet article ?!`)"><i class="bi bi-pencil-square"></i> Modifier</a>
                    <a href="/?controller=blog&action=delete&id=<?= $article["id"] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)"><i class="bi bi-trash3"></i> Supprimer </a>
                </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>






<?php include '../template/partials/_bottom.html.php' ?>