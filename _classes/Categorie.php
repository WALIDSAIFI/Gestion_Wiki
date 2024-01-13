<?php

class Categorie
{
    private $id;
    private $nom;

    public function __construct($id) {
        global $db;
        $sql = "SELECT * FROM categories WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $categorie = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $categorie['id'];
        $this->nom = $categorie['nom'];
    }

    static public function ajouterCategorie($nom){
        global $db;
        $sql = "INSERT INTO categories(name) VALUES (:nom)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->execute();
    }


    static public function getAll_categorie()
    {
        global $db;

        $sql = "SELECT * FROM categories";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }

    static public function get_categorie($id)
    {
        global $db;

        $sql = "SELECT * FROM categories WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $categorie = $stmt->fetch(PDO::FETCH_ASSOC);

        return $categorie;
    }



    static public function update_catigo($id, $newName)
    {
        global $db;

        $sql = "UPDATE categories SET name = :newName, edit_at = NOW() WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':newName', $newName, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }


    static public function deletcatgo($id)
    {
        global $db;

        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
    static public function getNombreCategories()
    {
        global $db;

        $sql = "SELECT COUNT(*) as count FROM categories";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['count'];
    }


}
