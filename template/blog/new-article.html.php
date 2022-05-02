<?php include '../template/partials/_top.html.php' ?>

<h1>Ajout d'un article</h1>
<div class="d-flex justify-content-evenly">
    <form action="/?controller=blog&action=nouveau" method="POST">
        <div>
            <label class="form-label" for="title">Titre :</label>
            <input class="form-control" rows="3" type="text" id="title" name="title">
        </div>
        <div>
            <label class="form-label" for="content">Contenu :</label>
            <textarea class="form-control" rows="7" id="content" name="content" placeholder="Ecrivez votre article"></textarea>
        </div>
        

    <div class="button">
        <button class="btn btn-primary" type="submit">Envoyer l'article</button>
    </div>
    </form>
</div>

<?php include '../template/partials/_bottom.html.php' ?>