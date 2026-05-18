<?php
$ablakcim = array(
    'cim' => 'Notebook Portál',
);

$fejlec = array(
    'kepforras' => 'logo.png',
    'kepalt' => 'Notebook Portál logó',
    'cim' => 'Notebook Portál',
    'motto' => 'Laptopok, kiegészítők és készletkezelés egy helyen'
);

$lablec = array(
    'copyright' => 'Copyright '.date("Y").'.',
    'ceg' => 'Horvát Evelin (AJ4B6Q), Palotai Tamás (PMB6ZM)'
);

// [Vendég látja, Belépett látja]
$oldalak = array(
    '/' => array('fajl' => 'cimlap', 'szoveg' => 'Főoldal', 'menun' => array(1,1)),
    'kepek' => array('fajl' => 'kepek', 'szoveg' => 'Képek', 'menun' => array(1,1)),
    'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat', 'menun' => array(1,1)),
    'uzenetek' => array('fajl' => 'uzenetek', 'szoveg' => 'Üzenetek', 'menun' => array(0,1)),
    'crud' => array('fajl' => 'crud', 'szoveg' => 'CRUD', 'menun' => array(1,1)),
    'belepes' => array('fajl' => 'belepes', 'szoveg' => 'Bejelentkezés', 'menun' => array(1,0)),
    'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kilépés', 'menun' => array(0,1)),
    'belep' => array('fajl' => 'belep', 'szoveg' => '', 'menun' => array(0,0)),
    'regisztral' => array('fajl' => 'regisztral', 'szoveg' => '', 'menun' => array(0,0)),
    'kapcsolat_eredmeny' => array('fajl' => 'kapcsolat_eredmeny', 'szoveg' => '', 'menun' => array(0,0))
);

$hiba_oldal = array ('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!');
?>
