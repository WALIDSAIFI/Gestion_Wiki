<?php

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
$db = new PDO($dsn, DB_USER, DB_PASS);