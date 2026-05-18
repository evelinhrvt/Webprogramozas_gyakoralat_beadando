<?php
$crud_hiba = "";
$editData = null;
$processzorok = [];
$oprendszerek = [];
$laptopok = [];

try {
    require_once('./includes/db.inc.php');

    $action = isset($_POST['action']) ? $_POST['action'] : (isset($_GET['action']) ? $_GET['action'] : '');

    if ($action == 'delete' && isset($_GET['id'])) {
        $stmt = $dbh->prepare("DELETE FROM laptopok WHERE id = :id");
        $stmt->execute([':id' => $_GET['id']]);
        header("Location: ?crud");
        exit;
    }

    if ($action == 'save') {
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        $gyarto = trim($_POST['gyarto']);
        $tipus = trim($_POST['tipus']);
        $kijelzo = (float)$_POST['kijelzo'];
        $memoria = (int)$_POST['memoria'];
        $merevlemez = (int)$_POST['merevlemez'];
        $videovezerlo = trim($_POST['videovezerlo']);
        $ar = (int)$_POST['ar'];
        $processzorid = (int)$_POST['processzorid'];
        $oprendszerid = (int)$_POST['oprendszerid'];
        $db = (int)$_POST['db'];
        $isUpdate = $_POST['isUpdate'];

        if ($gyarto === '' || $tipus === '' || $videovezerlo === '' || $kijelzo <= 0 || $memoria <= 0 || $merevlemez <= 0 || $ar <= 0 || $processzorid <= 0 || $oprendszerid <= 0 || $db < 0) {
            $crud_hiba = "Minden mezőt helyesen ki kell tölteni.";
        } elseif ($isUpdate == '1') {
            $stmt = $dbh->prepare("UPDATE laptopok
                SET gyarto=:gyarto, tipus=:tipus, kijelzo=:kijelzo, memoria=:memoria, merevlemez=:merevlemez,
                    videovezerlo=:videovezerlo, ar=:ar, processzorid=:processzorid, oprendszerid=:oprendszerid, db=:db
                WHERE id=:id");
            $stmt->execute([
                ':gyarto' => $gyarto,
                ':tipus' => $tipus,
                ':kijelzo' => $kijelzo,
                ':memoria' => $memoria,
                ':merevlemez' => $merevlemez,
                ':videovezerlo' => $videovezerlo,
                ':ar' => $ar,
                ':processzorid' => $processzorid,
                ':oprendszerid' => $oprendszerid,
                ':db' => $db,
                ':id' => $id
            ]);
            header("Location: ?crud");
            exit;
        } else {
            $stmt = $dbh->prepare("INSERT INTO laptopok
                (gyarto, tipus, kijelzo, memoria, merevlemez, videovezerlo, ar, processzorid, oprendszerid, db)
                VALUES (:gyarto, :tipus, :kijelzo, :memoria, :merevlemez, :videovezerlo, :ar, :processzorid, :oprendszerid, :db)");
            $stmt->execute([
                ':gyarto' => $gyarto,
                ':tipus' => $tipus,
                ':kijelzo' => $kijelzo,
                ':memoria' => $memoria,
                ':merevlemez' => $merevlemez,
                ':videovezerlo' => $videovezerlo,
                ':ar' => $ar,
                ':processzorid' => $processzorid,
                ':oprendszerid' => $oprendszerid,
                ':db' => $db
            ]);
            header("Location: ?crud");
            exit;
        }
    }

    if ($action == 'edit' && isset($_GET['id'])) {
        $stmt = $dbh->prepare("SELECT * FROM laptopok WHERE id = :id");
        $stmt->execute([':id' => $_GET['id']]);
        $editData = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    $processzorok = $dbh->query("SELECT id, gyarto, tipus FROM processzorok ORDER BY gyarto, tipus")->fetchAll(PDO::FETCH_ASSOC);
    $oprendszerek = $dbh->query("SELECT id, nev FROM oprendszerek ORDER BY nev")->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT l.*, CONCAT(p.gyarto, ' ', p.tipus) AS processzor_nev, o.nev AS oprendszer_nev
            FROM laptopok l
            LEFT JOIN processzorok p ON l.processzorid = p.id
            LEFT JOIN oprendszerek o ON l.oprendszerid = o.id
            ORDER BY l.gyarto, l.tipus";
    $laptopok = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    $crud_hiba = "Adatbázis hiba: " . $e->getMessage();
}
?>
