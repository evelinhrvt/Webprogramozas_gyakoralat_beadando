<h2>Laptop készlet (CRUD)</h2>

<?php if ($crud_hiba): ?>
    <p class="error-message"><?= htmlspecialchars($crud_hiba) ?></p>
<?php endif; ?>

<div class="crud-form">
    <h3><?= $editData ? 'Laptop szerkesztése' : 'Új laptop hozzáadása' ?></h3>
    <form action="?crud" method="post">
        <input type="hidden" name="action" value="save">
        <input type="hidden" name="isUpdate" value="<?= $editData ? '1' : '0' ?>">
        <input type="hidden" name="id" value="<?= htmlspecialchars($editData['id'] ?? '') ?>">

        <label>Gyártó:</label>
        <input type="text" name="gyarto" value="<?= htmlspecialchars($editData['gyarto'] ?? '') ?>" required>

        <label>Típus:</label>
        <input type="text" name="tipus" value="<?= htmlspecialchars($editData['tipus'] ?? '') ?>" required>

        <label>Kijelző:</label>
        <input type="number" name="kijelzo" min="1" step="0.1" value="<?= htmlspecialchars($editData['kijelzo'] ?? '') ?>" required>

        <label>Memória (MB):</label>
        <input type="number" name="memoria" min="1" value="<?= htmlspecialchars($editData['memoria'] ?? '') ?>" required>

        <label>Merevlemez (GB):</label>
        <input type="number" name="merevlemez" min="1" value="<?= htmlspecialchars($editData['merevlemez'] ?? '') ?>" required>

        <label>Videovezérlő:</label>
        <input type="text" name="videovezerlo" value="<?= htmlspecialchars($editData['videovezerlo'] ?? '') ?>" required>

        <label>Ár (Ft):</label>
        <input type="number" name="ar" min="1" value="<?= htmlspecialchars($editData['ar'] ?? '') ?>" required>

        <label>Processzor:</label>
        <select name="processzorid" required>
            <option value="">Válassz processzort</option>
            <?php foreach ($processzorok as $processzor): ?>
                <option value="<?= htmlspecialchars($processzor['id']) ?>" <?= isset($editData['processzorid']) && $editData['processzorid'] == $processzor['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($processzor['gyarto'].' '.$processzor['tipus']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Operációs rendszer:</label>
        <select name="oprendszerid" required>
            <option value="">Válassz operációs rendszert</option>
            <?php foreach ($oprendszerek as $oprendszer): ?>
                <option value="<?= htmlspecialchars($oprendszer['id']) ?>" <?= isset($editData['oprendszerid']) && $editData['oprendszerid'] == $oprendszer['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($oprendszer['nev']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Darab:</label>
        <input type="number" name="db" min="0" value="<?= htmlspecialchars($editData['db'] ?? '0') ?>" required>

        <button type="submit" class="btn btn-primary"><?= $editData ? 'Mentés' : 'Hozzáadás' ?></button>
        <?php if ($editData): ?>
            <a href="?crud" class="btn btn-secondary">Mégse</a>
        <?php endif; ?>
    </form>
</div>

<div class="table-scroll">
    <table class="crud-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Gyártó</th>
                <th>Típus</th>
                <th>Kijelző</th>
                <th>Memória</th>
                <th>Merevlemez</th>
                <th>Videovezérlő</th>
                <th>Processzor</th>
                <th>Operációs rendszer</th>
                <th>Ár</th>
                <th>Darab</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($laptopok)): ?>
                <?php foreach ($laptopok as $laptop): ?>
                    <tr>
                        <td><?= htmlspecialchars($laptop['id']) ?></td>
                        <td><?= htmlspecialchars($laptop['gyarto']) ?></td>
                        <td><?= htmlspecialchars($laptop['tipus']) ?></td>
                        <td><?= htmlspecialchars($laptop['kijelzo']) ?>"</td>
                        <td><?= htmlspecialchars($laptop['memoria']) ?> MB</td>
                        <td><?= htmlspecialchars($laptop['merevlemez']) ?> GB</td>
                        <td><?= htmlspecialchars($laptop['videovezerlo']) ?></td>
                        <td><?= htmlspecialchars($laptop['processzor_nev'] ?? '') ?></td>
                        <td><?= htmlspecialchars($laptop['oprendszer_nev'] ?? '') ?></td>
                        <td><?= number_format((int)$laptop['ar'], 0, ',', ' ') ?> Ft</td>
                        <td><?= htmlspecialchars($laptop['db']) ?></td>
                        <td class="actions">
                            <a href="?crud&action=edit&id=<?= htmlspecialchars($laptop['id']) ?>" class="btn btn-info">Edit</a>
                            <a href="?crud&action=delete&id=<?= htmlspecialchars($laptop['id']) ?>" class="btn btn-danger" onclick="return confirm('Biztosan törlöd ezt a laptopot?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="12">Nincs laptop az adatbázisban.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
