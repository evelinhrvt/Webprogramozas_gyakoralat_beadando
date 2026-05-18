<?php
try {
    // Helyi XAMPP/phpMyAdmin adatbázis a képeken látható séma alapján.
    // Tárhelyre feltöltéskor csak ezeket az adatokat kell átírni.
    $host = 'localhost';
    $dbname = 'note';
    $user = 'root';
    $pass = '';

    $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
}
catch (PDOException $e) {
    die("Adatbázis csatlakozási hiba: " . $e->getMessage());
}
?>
