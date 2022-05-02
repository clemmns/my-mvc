<?php
require_once '../core/Manager.php';

class CommentManager extends Manager
{
    public int $id;
    public string $content;
    public string $author;
    public $created_at;
    public int $article_id;
    
    public function getAll()
    {
        $sql = "SELECT * FROM comment";
        $resultats = $this->getPdo()->query($sql);
        $comments = $resultats->fetchAll();
        return $comments;
    }

    public function getCommentById(int $id)
    {
        $sql = "SELECT * FROM comment WHERE id = :id";
        $query = $this->getPdo()->prepare($sql);
        $query->execute([
            'id' => $id
        ]);
        $comments = $query->fetch();
        return $comments;
    }

    public function getAllCommentsFromArticle(int $article_id)
    {
        $sql = "SELECT * FROM comment WHERE article_id = :article_id";
        $query = $this->getPdo()->prepare($sql);
        $query->execute(['article_id' => $article_id]);
        return $query->fetchAll();
    }

    public function insertComment(string $content, string $author, int $article_id )
    {
        // les requetes ne marchent pas avec les simple quote classique
        $sql = "INSERT INTO comment (content, author, created_at, article_id) VALUES (:content, :author, NOW(), :article_id)";
        $req = $this->getPdo()->prepare($sql);
        $req->execute([
            'content' => $content,
            'author' => $author,
            'article_id' => $article_id,
        ]);
    }
        
    public function updateComment(int $id,string $content, string $author) : void
    {
        $sql = "UPDATE comment SET content = :content, author = :author WHERE id = :id";
        $req = $this->getPdo()->prepare($sql);
        $req->execute([
            'id' => $id,
            'content' => $content,
            'author' => $author,
        ]);
    }

    function deleteComment(int $id) : void 
    {
        $sql = "DELETE FROM comment WHERE id = :id";
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