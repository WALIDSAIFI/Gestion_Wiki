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
}
