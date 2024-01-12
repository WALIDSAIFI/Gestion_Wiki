<?php

class Validation
{

    static function validateUsername($nomUtilisateur)
    {
        if (empty($nomUtilisateur)) {
            return "Le nom d'utilisateur est requis.";
        } elseif (!preg_match('/^[a-zA-Z0-9]{3,}$/', $nomUtilisateur)) {
            return "Nom d'utilisateur invalide. Le nom d'utilisateur doit comporter au moins 3 caractères.";
        }
        return false;
    }

    static function validateTag($tag)
    {
        if (empty($tag)) {
            return "Le tag est requis.";
        } elseif (!preg_match('/^[a-zA-Z0-9]{3,}$/', $tag)) {
            return "Tag invalide. Le tag doit comporter au moins 3 caractères.";
        }
        return false;
    }

    static function validateCategories($categories)
    {
        if (empty($categories)) {
            return "Les catégories sont requises.";
        } elseif (!preg_match('/^[a-zA-Z0-9]{3,}$/', $categories)) {
            return "Catégories invalides. Les catégories doivent comporter au moins 3 caractères.";
        }
        return false;
    }

    static function userChecker($email, $db)
    {
        if (user::user_checker($email, $db)) {
            return "L'utilisateur existe déjà.";
        }
        return false;
    }

    static function validateEmail($email)
    {
        if (empty($email)) {
            return "L'adresse e-mail est requise.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Format d'adresse e-mail invalide.";
        }
        return false;
    }

    static function validatePassword($motDePasse)
    {
        if (empty($motDePasse)) {
            return "Le mot de passe est requis.";
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $motDePasse)) {
            return "Mot de passe invalide. Le mot de passe doit comporter au moins 8 caractères, dont une lettre majuscule, une lettre minuscule et un chiffre.";
        }
        return false;
    }


    static function validatetitre($titre)
    {
        if (empty($titre)) {
            return "Le titre sont requises.";
        } elseif (!preg_match('/^[a-zA-Z0-9]{3,}$/', $titre)) {
            return "titre invalides. Les titres doivent comporter au moins 3 caractères.";
        }
        return false;
    }
    static function validateContent($content)
    {
        if (empty($content)) {
            return "Le contenu est requis.";
        } elseif (strlen($content) < 20) {
            return "Contenu invalide. Le contenu doit comporter au moins 20 caractères.";
        }
        return false;
    }

}
