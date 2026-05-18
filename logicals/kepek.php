<?php
$uzenet = [];
$kepekKonyvtar = './images/galeria/';

if (!file_exists($kepekKonyvtar)) {
    mkdir($kepekKonyvtar, 0777, true);
}

if (isset($_SESSION['login']) && isset($_FILES['ujKep'])) {
    $fajl = $_FILES['ujKep'];

    if ($fajl['error'] === UPLOAD_ERR_OK) {
        $engedelyezett_tipusok = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $mime = mime_content_type($fajl['tmp_name']);

        if (in_array($mime, $engedelyezett_tipusok)) {
            $kiterjesztes = pathinfo($fajl['name'], PATHINFO_EXTENSION);
            $biztonsagosNev = 'notebook-' . date('YmdHis') . '-' . bin2hex(random_bytes(4)) . '.' . strtolower($kiterjesztes);
            $celPath = $kepekKonyvtar . $biztonsagosNev;

            if (move_uploaded_file($fajl['tmp_name'], $celPath)) {
                $uzenet[] = "Sikeres képfeltöltés.";
            } else {
                $uzenet[] = "Hiba történt a fájl mentésekor.";
            }
        } else {
            $uzenet[] = "Csak JPG, PNG, WEBP és GIF fájlok engedélyezettek.";
        }
    } else {
        $uzenet[] = "Hiba történt a feltöltés során.";
    }
}

$kepek = [];
if (file_exists($kepekKonyvtar)) {
    $dir = opendir($kepekKonyvtar);
    while (($file = readdir($dir)) !== false) {
        if ($file != '.' && $file != '..' && is_file($kepekKonyvtar . $file)) {
            $kepek[] = $kepekKonyvtar . $file;
        }
    }
    closedir($dir);
}
?>
