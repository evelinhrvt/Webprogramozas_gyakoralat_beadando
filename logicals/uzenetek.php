<?php
if (!isset($_SESSION['login'])) {
    header("Location: ?");
    exit;
}

try {
    require_once('./includes/db.inc.php');

    $sql = "SELECT * FROM uzenetek ORDER BY idopont DESC";
    $stmt = $dbh->query($sql);
    $osszes_uzenet = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $hiba = "Adatbázis hiba: " . $e->getMessage();
}
?>
