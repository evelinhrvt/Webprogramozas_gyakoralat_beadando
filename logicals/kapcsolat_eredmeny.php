<?php
$hiba = false;
$uzenet_szoveg = "";

if (isset($_POST['nev']) && isset($_POST['email']) && isset($_POST['uzenet'])) {
    $nev = trim($_POST['nev']);
    $email = trim($_POST['email']);
    $uzenet = trim($_POST['uzenet']);
    $bejelentkezes = isset($_SESSION['login']) ? $_SESSION['login'] : null;

    if (empty($nev) || empty($email) || empty($uzenet)) {
        $hiba = true;
        $uzenet_szoveg = "Minden mező kitöltése kötelező.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hiba = true;
        $uzenet_szoveg = "Hibás e-mail formátum.";
    }

    if (!$hiba) {
        try {
            require_once('./includes/db.inc.php');

            $sqlInsert = "INSERT INTO uzenetek (bejelentkezes, nev, email, szoveg) VALUES (:bejelentkezes, :nev, :email, :szoveg)";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(
                ':bejelentkezes' => $bejelentkezes,
                ':nev' => $nev,
                ':email' => $email,
                ':szoveg' => $uzenet
            ));

            $uzenet_szoveg = "Köszönjük, az üzenetet sikeresen elmentettük.";
        } catch (PDOException $e) {
            $hiba = true;
            $uzenet_szoveg = "Adatbázis hiba: " . $e->getMessage();
        }
    }
} else {
    header("Location: ?kapcsolat");
    exit;
}
?>
