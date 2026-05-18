<?php
if(isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
    try {
        require_once('./includes/db.inc.php');

        $sqlSelect = "SELECT id, vezeteknev, keresztnev
                      FROM felhasznalok
                      WHERE email = :email
                      AND (jelszo_hash = sha1(:jelszo) OR jelszo_hash = :jelszo_nyers)";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(
            ':email' => $_POST['felhasznalo'],
            ':jelszo' => $_POST['jelszo'],
            ':jelszo_nyers' => $_POST['jelszo']
        ));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $_SESSION['csn'] = $row['vezeteknev'];
            $_SESSION['un'] = $row['keresztnev'];
            $_SESSION['login'] = $_POST['felhasznalo'];
        }
    }
    catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
    }
}
else {
    header("Location: .");
}
?>
