<?php

class Validation
{

    static function validateUsername($lastName)
    {
        if (empty($lastName)) {
            return "Username is required";
        } elseif (!preg_match('/^[a-zA-Z0-9]{3,}$/', $lastName)) {
            return "Invalid username. Username should be at least 3 characters long.";
        }
        return false;
    }

    static function userChecker($email, $db)
    {
        if (user::user_checker($email, $db)) {
            return "User already exists";
        }
    }


    static function validateEmail($email)
    {
        if (empty($email)) {
            return "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format.";
        }
        return false;
    }

    static function validatePassword($password)
    {
        if (empty($password)) {
            return "Password is required";
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password)) {
            return "Invalid password. Password should have at least 8 characters, including one uppercase letter, one lowercase letter, and one number.";
        }
        return false;
    }

}