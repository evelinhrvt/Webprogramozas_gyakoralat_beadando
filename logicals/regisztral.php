<?php
if(isset($_POST['felhasznalo']) && isset($_POST['jelszo']) && isset($_POST['vezeteknev']) && isset($_POST['utonev'])) {
    try {
        require_once('./includes/db.inc.php');

        $email = trim($_POST['felhasznalo']);

        $sqlSelect = "SELECT id FROM felhasznalok WHERE email = :email";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':email' => $email));
        if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $uzenet = "Ezzel az e-mail címmel már van regisztrált felhasználó.";
            $ujra = true;
        }
        else {
            $sqlInsert = "INSERT INTO felhasznalok
                          (vezeteknev, keresztnev, email, jelszo_hash, jogosultsag, regisztracio_ideje)
                          VALUES (:vezeteknev, :keresztnev, :email, :jelszo_hash, 'vasarlo', NOW())";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(
                ':vezeteknev' => $_POST['vezeteknev'],
                ':keresztnev' => $_POST['utonev'],
                ':email' => $email,
                ':jelszo_hash' => sha1($_POST['jelszo'])
            ));
            if($count = $stmt->rowCount()) {
                $newid = $dbh->lastInsertId();
                $uzenet = "A regisztráció sikeres. Azonosító: {$newid}";
                $ujra = false;
            }
            else {
                $uzenet = "A regisztráció nem sikerült.";
                $ujra = true;
            }
        }
    }
    catch (PDOException $e) {
        $uzenet = "Hiba: ".$e->getMessage();
        $ujra = true;
    }
}
else {
    header("Location: .");
}
?>
