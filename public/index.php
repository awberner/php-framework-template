<?php
    require '../app/autoload.php';

    use app\core\App;
    use app\config\Config;

    if(Config::DEBUG_MODE) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title><?= CONFIG::SITE_NAME ?>></title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/styles.css?v=<?= Config::VERSION ?>">
        <link rel="stylesheet" href="assets/css/home.styles.css?v=<?= Config::VERSION ?>">
    </head>
    <body>

        <?php $app = new App(); ?>

        <script src="assets/js/jquery.slim.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
