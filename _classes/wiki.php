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
    static public function getAllWiki()
    {
        global $db;

        $sql = "SELECT * FROM articles";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }
    static public function get_Wiki($id)
    {
        global $db;

        $sql = "SELECT * FROM articles WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        return $article;
    }





}





