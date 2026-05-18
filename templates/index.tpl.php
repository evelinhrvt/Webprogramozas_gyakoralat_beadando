<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($ablakcim['cim']) ?></title>
    <link rel="stylesheet" href="./styles/stilus.css" type="text/css">
    <?php if(file_exists('./styles/'.$keres['fajl'].'.css')) { ?><link rel="stylesheet" href="./styles/<?= htmlspecialchars($keres['fajl']) ?>.css" type="text/css"><?php } ?>
</head>
<body>
    <header>
        <div class="header-content">
            <img src="./images/<?= htmlspecialchars($fejlec['kepforras']) ?>" alt="<?= htmlspecialchars($fejlec['kepalt']) ?>">
            <div>
                <h1><?= htmlspecialchars($fejlec['cim']) ?></h1>
                <?php if (isset($fejlec['motto'])) { ?><h2><?= htmlspecialchars($fejlec['motto']) ?></h2><?php } ?>

                <?php if(isset($_SESSION['login'])) { ?>
                    <div class="user-info">Bejelentkezett: <strong><?= htmlspecialchars($_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].")") ?></strong></div>
                <?php } ?>
            </div>
        </div>
    </header>

    <nav>
        <ul>
            <?php foreach ($oldalak as $url => $oldal) { ?>
                <?php if(! isset($_SESSION['login']) && $oldal['menun'][0] || isset($_SESSION['login']) && $oldal['menun'][1]) { ?>
                    <li<?= (($oldal == $keres) ? ' class="active"' : '') ?>>
                    <a href="<?= ($url == '/') ? '.' : '?'.htmlspecialchars($url) ?>">
                    <?= htmlspecialchars($oldal['szoveg']) ?></a>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
    </nav>

    <div id="wrapper">
        <main id="content">
            <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
        </main>
    </div>

    <footer>
        <?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= htmlspecialchars($lablec['copyright']) ?> <?php } ?>
        &nbsp;
        <?php if(isset($lablec['ceg'])) { ?><?= htmlspecialchars($lablec['ceg']); ?><?php } ?>
    </footer>
</body>
</html>
