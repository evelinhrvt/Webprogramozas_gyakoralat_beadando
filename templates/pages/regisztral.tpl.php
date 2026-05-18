<?php if(isset($uzenet)) { ?>
    <h1><?= htmlspecialchars($uzenet) ?></h1>
    <?php if($ujra) { ?>
        <a href="?belepes">Próbáld újra.</a>
    <?php } else { ?>
        <a href="?belepes">Tovább a bejelentkezéshez.</a>
    <?php } ?>
<?php } ?>
