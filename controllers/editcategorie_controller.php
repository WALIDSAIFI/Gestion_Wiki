<?php

if (empty($_SESSION) || (isset($_SESSION['role']) && $_SESSION['role'] == 'author')) {
    header("Location: index.php?page=home");
    exit();
}