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

        $stmt->execute();
            return $db->lastInsertId();
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

        $sql = "SELECT articles.*,users.*
                FROM articles 
                JOIN users ON articles.id_user = users.id
                WHERE articles.id = :id";

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
    static public function getAllWiki_archive()
    {
        global $db;

        $sql = "SELECT articles.*, users.first_name, users.last_name,users.email
            FROM articles 
            JOIN users ON articles.id_user = users.id
            WHERE articles.status = 'archived'";

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

    public static function addLineBreaks($content)
    {
        $contentWithBreaks = wordwrap($content, 50, "<br>\n", true);
        return $contentWithBreaks;
    }

    static public function deracheve_Wki($id){
        global $db;
        $Sql = "UPDATE articles SET status = 'published' WHERE id = :wikiId";
        $updateStmt = $db->prepare($Sql);
        $updateStmt->bindParam(':wikiId', $id, PDO::PARAM_INT);
        $updateStmt->execute();
    }


    static public function getCategoryDetails($idArticle)
    {
        global $db;

        $sql = "SELECT categories.name AS category_name
                FROM articles
                JOIN categories ON articles.id_category = categories.id
                WHERE articles.id = :idArticle";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idArticle', $idArticle, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['category_name'];
    }

    static public function getTagsDetails($idArticle)
    {
        global $db;

        $sql = "SELECT tags.name AS tag_name
                FROM articles_tags
                JOIN tags ON articles_tags.id_tag = tags.id
                WHERE articles_tags.id_article = :idArticle";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idArticle', $idArticle, PDO::PARAM_INT);
        $stmt->execute();

        $tags = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $tags[] = $row['tag_name'];
        }

        return $tags;
    }


    static public function getWik_User($id_user)
    {
        global $db;

        $sql = "SELECT articles.*, users.first_name, users.last_name, users.email
            FROM articles 
            JOIN users ON articles.id_user = users.id
            WHERE articles.id_user = :id_user
              AND articles.status = 'published'";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->execute();

        $wikis = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $wikis;
    }










}





