<!-- on require  ArticleManager pour utiliser ces fonctions -->
<?php Require '../src/manager/ArticleManager.php' ?>
<?php Require '../src/manager/CommentManager.php' ?>
<?php

class BlogController
{
    private ArticleManager $articleManager;
    private CommentManager $commentManager;

    public function __construct()
    {
        $this->articleManager = new ArticleManager();
        $this->commentManager = new CommentManager();
    }
    public function index()
    {
        
        // on peut utiliser les fonctions d'ArticleManager
        $articles = $this->articleManager->getAll();
        $comments = $this->commentManager->getAll();
        require '../template/blog/blog.html.php';
    }

    public function article()
    {
        
        // on utilise le getAllById
        $article = $this->articleManager->getAllArticleById($_GET['id']);
        // $comment = $this->commentManager->getCommentById($_GET['id']);
        $comments = $this->commentManager->getAllCommentsFromArticle($_GET['id']);
        require '../template/blog/article.html.php';
    }

    public function nouveau()
    {
        $article = $this->articleManager->insertArticle($_POST['title'], $_POST['content']);
        header('Location: /?controller=blog');
    }

    public function showForm()
    {
        require '..template/blog/new-article.html.php';
    }

    public function update()
    {
        $article = $this->articleManager->getAllArticleById($_GET['id']);
        require '../template/blog/update-article.html.php';
    }

    public function modifier()
    {
        $article = $this->articleManager->updateArticle($_POST['id'],$_POST['title'], $_POST['content']);
        header('Location: /?controller=blog');
    }

    public function delete()
    {
        $article = $this->articleManager->deleteArticle($_GET['id']);
        header('Location: /?controller=blog');
    }

    public function newcom()
    {
        $comment = $this->commentManager->insertComment($_POST['content'],$_POST['author'],$_POST['article_id']);
        // pour verifier ce qui est envoyé ds le post ou ds le get
        // var_dump($_POST); exit;
        header('Location: /?controller=blog&action=article&id=' . $_POST['article_id']);
    }

    public function deletecom()
    {
        if ($_POST['submit']) {
            $comment = $this->commentManager->deleteComment($_POST['id']);
            
            header('Location: /?controller=blog&action=article&id=' . $_POST['article_id']);
        } else {
            header('Location: /?controller=blog');
        }
    }
}