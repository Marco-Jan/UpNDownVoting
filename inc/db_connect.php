<?php
try {
    $dsn = 'mysql:host=localhost;dbname=up_down_voting';
    $user_name = 'up_down_voting';
    $password = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    $pdo = new PDO($dsn, $user_name, $password, $options);

} catch (PDOException $e) {
    echo 'Datenbank Verbindung gescheitert: ' . $e->getMessage();
}


// edvgraz_gallery
// up_down_voting