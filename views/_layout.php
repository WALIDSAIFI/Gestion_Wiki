<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/image/Wiki.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" integrity="sha384-QV8+oaDlJKJwQ/Scnkxm5oWfsR5Zgqn1ZlW4FL4jK71ftjF8VcOGUE3NIn1QFZDv" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= PATH ?>assets/css/style.css">


    <title><?= ucfirst($page) ?></title>

</head>
<body>
    <!--<h1><?= ucfirst($page) ?> View</h1>-->

    <main>
        <?php include_once 'views/' . $page . '_views.php'; ?>
    </main>

    <footer></footer>

    <script src="<?= PATH ?>assets/js/main.js"></script>
    <script src="<?= PATH ?>assets/js/sinup.js"></script>
    <script src="<?= PATH ?>assets/js/login.js"></script>
    <script src="<?= PATH ?>assets/js/tags.js"></script>
    <script src="<?= PATH ?>assets/js/categories.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-yNeBV5I5IjOBObIFW8awM6gTPQ3JC3Y3C1g9M+K3JBWc7pc/Bp1UcF7BDmNfNdf1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" integrity="sha384-zw0fAZjxu9EO5GQoXp5r1UtsxFI9Y5KA5z8ivV0Q7QlCcFLaT7lqWZqkuk6X65ZV" crossorigin="anonymous"></script>

</body>
</html>