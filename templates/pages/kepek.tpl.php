<h2>Notebook képgaléria</h2>

<?php foreach ($uzenet as $u): ?>
    <p class="info-message"><strong><?= htmlspecialchars($u) ?></strong></p>
<?php endforeach; ?>

<?php if (isset($_SESSION['login'])): ?>
    <form action="?kepek" method="post" enctype="multipart/form-data" class="upload-form">
        <fieldset>
            <legend>Új notebook kép feltöltése</legend>
            <input type="file" name="ujKep" required accept="image/jpeg, image/png, image/gif, image/webp">
            <input type="submit" value="Kép feltöltése">
        </fieldset>
    </form>
<?php else: ?>
    <p><em>Képfeltöltéshez jelentkezz be.</em></p>
<?php endif; ?>

<div class="gallery">
    <?php if (empty($kepek)): ?>
        <p>A galéria jelenleg üres.</p>
    <?php else: ?>
        <?php foreach ($kepek as $kep): ?>
            <figure>
                <img src="<?= htmlspecialchars($kep) ?>" alt="Notebook galéria kép">
            </figure>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
