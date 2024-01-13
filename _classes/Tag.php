<?php

class Tag
{
    private $id;
    private $name;

    public function __construct($id) {
        global $db;
        $sql = "SELECT * FROM tags WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $tag = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $tag['id'];
        $this->name = $tag['name'];
    }

    static public function ajouter_tag($titre){
        global $db;
            $sql = "INSERT INTO tags(name) VALUES (:titre)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
            $stmt->execute();

    }

    static public function getAll_tag()
    {
        global $db;

        $sql = "SELECT * FROM tags";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $tags;
    }
    static public function get_tag($id)
    {
        global $db;

        $sql = "SELECT * FROM tags WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $tag = $stmt->fetch(PDO::FETCH_ASSOC);

        return $tag;
    }

    static public function update_tag($id, $newName)
    {
        global $db;

        $sql = "UPDATE tags SET name = :newName WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':newName', $newName, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    static public function delete_tag($id)
    {
        global $db;

        $sql = "DELETE FROM tags WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    static public function getNombreTags()
    {
        global $db;

        $sql = "SELECT COUNT(*) as count FROM tags";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['count'];
    }





}
