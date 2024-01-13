<?php

class wiki
{

    public $title;
    public $content;
    public $createdAt;
    public $editAt;
    public $status;
    public $idUser;
    public $idCategory;


    public function __construct($id)
    {
        global $db;

        $sql = "SELECT * FROM articles WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $article = $stmt->fetch(PDO::FETCH_ASSOC);


        $this->title = $article['title'];
        $this->content = $article['content'];
        $this->createdAt = $article['create_at'];
        $this->editAt = $article['edit_at'];
        $this->status = $article['status'];
        $this->idUser = $article['id_user'];
        $this->idCategory = $article['id_category'];
    }

    static public function ajouterArticle($title, $content, $idUser, $idCategory)
    {
        global $db;

        $sql = "INSERT INTO articles (title, content, create_at, id_user, id_category, status) 
            VALUES (:title, :content, NOW(), :idUser, :idCategory, 'published')";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $stmt->bindParam(':idCategory', $idCategory, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return $db->lastInsertId();
        } else {
            return false;
        }
    }

    static public function getNombreWiki()
    {
        global $db;

        $sql = "SELECT COUNT(*) as count FROM articles";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['count'];
    }

    static public function get_Wiki($id)
    {
        global $db;

        $sql = "SELECT articles.*, users.first_name, users.last_name 
            FROM articles 
            JOIN users ON articles.id_user = users.id
            WHERE articles.id_user = :id AND articles.status = 'published'";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }


    static public function getAllWiki()
    {
        global $db;

        $sql = "SELECT articles.*, users.first_name, users.last_name,users.email
            FROM articles 
            JOIN users ON articles.id_user = users.id
            WHERE articles.status = 'published'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }

    static public function softDeleteArticle($id)
    {
        global $db;
        $stmt = $db->prepare("UPDATE articles SET status = 'archived' WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    static function getTheLatestWiki()
    {
        global $db;

        $result = $db->query("SELECT articles.*, users.first_name, categories.*,articles.id as id_article
FROM articles
JOIN users ON articles.id_user = users.id
JOIN categories ON articles.id_category = categories.id
WHERE articles.status = 'published'
ORDER BY articles.create_at DESC
LIMIT 5;

        ");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }


 





}





