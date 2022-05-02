<?php
require_once '../core/Manager.php';

class ArticleManager extends Manager
{
    public $id;
    public $title;
    public $content;
    public $created_at;
    
    public function getAll()
    {
        $sql = "SELECT * from article";
        $resultats = $this->getPdo()->query($sql);
        $articles = $resultats->fetchAll();
        return $articles;
    }

    public function getAllArticleById(int $id)
    {
        $sql = "SELECT * from article WHERE id = :id";
        $query = $this->getPdo()->prepare($sql);
        $query->execute([
            'id' => $id
        ]);
        return $query->fetch();
    }

    public function insertArticle(string $title, string $content) : void
    {
        // les requetes ne marchent pas avec les simple quote classique
        $sql = "INSERT INTO article (title, content, created_at) VALUES (:title, :content, NOW())";
        $req = $this->getPdo()->prepare($sql);
        $req->execute([
            'title' => $title,
            'content' => $content,
        ]);
    }
        
    public function updateArticle(int $id,string $title, string $content) : void
    {
        $sql = "UPDATE article SET title = :title, content = :content WHERE id = :id";
        $req = $this->getPdo()->prepare($sql);
        $req->execute([
            'id' => $id,
            'title' => $title,
            'content' => $content,
        ]);
    }

    function deleteArticle(int $id) : void 
    {
        $sql = "DELETE FROM article WHERE id = :id";
        $req = $this->getPdo()->prepare($sql);
        $req->execute(['id' => $id]);
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }
}