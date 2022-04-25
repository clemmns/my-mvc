<?php

class Article extends Manager
{

}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=mvc-blog', 'root', '');

    }
    catch (PDOException $e) 
    {
    echo 'ERROR: ' . $e->getMessage();
    die();
    }


function getAll()
{
    // on recupere pdo a l'exterieur de la fonction avec $GLOBALS
    $pdo = $GLOBALS['pdo'];
    // requete sql
    $sql = "SELECT * from article";
    //retour pdo
    $req = $pdo->query($sql);
    // on recupere les resultats ds un tableau assoc $articles
    $articles = $req->fetchAll(PDO::FETCH_ASSOC);
    // on retourne le resultat pour que la requete retourne qqch
    // on retourne le tableau $articles qui comprend tous les articles
    return $articles;
}

function getAllArticleById(int $id)
{
    $pdo = $GLOBALS['pdo'];
    $sql = "SELECT * from article WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->execute([
        'id' => $id
    ]);
    

    return $query->fetch();
}

function insertArticle(string $title, string $content) : void
{
    $pdo = $GLOBALS['pdo'];
    // les requetes ne marchent pas avec les simple quote classique
    $sql = "INSERT INTO article (title, content, created_at) VALUES (:title, :content, NOW())";
    $req = $pdo->prepare($sql);
    $req->execute([
        'title' => $title,
        'content' => $content,
    ]);
}
    
function updateArticle(int $id,string $title, string $content) : void
{
    $pdo = $GLOBALS['pdo'];
    $sql = "UPDATE article SET title = :title, content = :content WHERE id = :id";
    $req = $pdo->prepare($sql);
    $req->execute([
        'id' => $id,
        'title' => $title,
        'content' => $content,
    ]);
}

function deleteArticle(int $id) : void 
{
    $pdo = $GLOBALS['pdo'];
    $sql = "DELETE FROM article WHERE id = :id";
    $req = $pdo->prepare($sql);
    $req->execute(['id' => $id]);
}