<!-- on require  ArticleManager pour utiliser ces fonctions -->
<?php Require 'model/ArticleManager.php' ?>
<?php

function index()
{
    // on peut utiliser les fonctions d'ArticleManager
    $articles = getAll();
    require 'view/blog/blog.html.php';
}

function article()
{
    // on utilise le getAllById
    $article = getAllArticleById($_GET['id']);
    require 'view/blog/article.html.php';
}

function nouveau()
{
    $article = insertArticle($_POST['title'], $_POST['content']);
    header('Location: /?controller=blog');
}

function showForm()
{
    require 'view/blog/new-article.html.php';
}

function update()
{
    $article = getAllArticleById($_GET['id']);
    require 'view/blog/update-article.html.php';
}

function modifier()
{
    $article = updateArticle($_POST['id'],$_POST['title'], $_POST['content']);
    header('Location: /?controller=blog');
}

function delete()
{
    $article = deleteArticle($_GET['id']);
    header('Location: /?controller=blog');
}