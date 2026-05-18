Notebook Portál - Webprogramozás 1 gyakorlat beadandó

Indítás:
1. Hozz létre egy note nevű MySQL adatbázist, vagy használd a képeken látható note adatbázist.
2. Importáld a gyakorlat7.sql fájlt, ha még nincsenek meg a táblák.
3. Ha nem helyi root felhasználóval fut, írd át az includes/db.inc.php adatbázis-adatait.
4. A projekt gyökere az index.php, ezt kell a PHP webszerver dokumentumkönyvtárába tenni.

Teszt belépés:
- kovacs.peter@minta.hu / hashed_password_123
- új regisztráció után az e-mail cím és a megadott jelszó használható

Megvalósított fő részek:
- Front-controller alapú oldalkezelés.
- Reszponzív vízszintes menü.
- Regisztráció, bejelentkezés, kilépés a felhasznalok táblával.
- Főoldal notebook témával, saját videóval, YouTube videóval és Google térképpel.
- Képgaléria, belépett felhasználónak képfeltöltéssel.
- Kapcsolat űrlap kliens- és szerveroldali ellenőrzéssel, adatbázis mentéssel az uzenetek táblába.
- Üzenetek lista csak belépett felhasználóknak.
- Laptop készlet CRUD a laptopok, processzorok és oprendszerek táblákkal.
