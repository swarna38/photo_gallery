<?php 
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "photo_gallery";

    try {
        $pdo = ("mysql:host=$db_host;dbname=$db_name;charset=utf8");
        $pdo = new PDO($pdo, $db_user, $db_password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "success";
    } catch(PDOException $e) {
        // PDOException use for pdo error handel
        die("database connection failed" . $e->getMessage());
    }
?>