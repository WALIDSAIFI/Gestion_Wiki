<?php

if (empty($_SESSION)) {
    header("Location: index.php?page=home");
    exit();
}