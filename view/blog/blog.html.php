<?php include 'view/partials/_top.html.php' ?>

<h1> BLOGUI BLOUGA </h1>
<a href="/?controller=blog&action=showForm">Nouvel article</a>
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
                    <a href="/?controller=blog&action=update&id=<?= $article["id"] ?>">Modifier</a>
                    <a href="/?controller=blog&action=delete&id=<?= $article["id"] ?>">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>






<?php include 'view/partials/_bottom.html.php' ?>