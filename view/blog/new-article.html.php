<?php include 'view/partials/_top.html.php' ?>

<h1>Ajout d'un article</h1>
<form action="/?controller=blog&action=nouveau" method="POST">
    <div>
        <label class="form-label" for="title">Titre :</label>
        <input class="form-control" type="text" id="title" name="title">
    </div>
    <div>
        <label class="form-label" for="content">Contenu :</label>
        <textarea class="form-control" id="content" name="content" placeholder="Ecrivez votre article"></textarea>
    </div>
    

<div class="button">
    <button class="btn btn-primary" type="submit">Envoyer l'article</button>
</div>
</form>

<?php include 'view/partials/_bottom.html.php' ?>