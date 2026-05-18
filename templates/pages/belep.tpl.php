<?php if(isset($row)) { ?>
    <?php if($row) { ?>
        <h1>Bejelentkezett:</h1>
        Azonosító: <strong><?= htmlspecialchars($row['id']) ?></strong><br><br>
        Név: <strong><?= htmlspecialchars($row['vezeteknev']." ".$row['keresztnev']) ?></strong>
    <?php } else { ?>
        <h1>A bejelentkezés nem sikerült.</h1>
        <a href="?belepes">Próbáld újra.</a>
    <?php } ?>
<?php } ?>
<?php if(isset($errormessage)) { ?>
    <h2 class="error-message"><?= htmlspecialchars($errormessage) ?></h2>
<?php } ?>
