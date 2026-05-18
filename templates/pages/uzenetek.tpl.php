<h2>Beérkezett üzenetek</h2>

<?php if (isset($hiba)): ?>
    <p class="error-message"><?= htmlspecialchars($hiba) ?></p>
<?php else: ?>
    <div class="table-scroll">
        <table class="crud-table">
            <tr>
                <th>Küldés ideje</th>
                <th>Küldő neve</th>
                <th>E-mail cím</th>
                <th>Üzenet</th>
            </tr>
            <?php foreach ($osszes_uzenet as $uz): ?>
                <tr>
                    <td><?= htmlspecialchars($uz['idopont']) ?></td>
                    <td><?= empty($uz['bejelentkezes']) ? 'Vendég' : htmlspecialchars($uz['nev']) ?></td>
                    <td><?= htmlspecialchars($uz['email']) ?></td>
                    <td><?= nl2br(htmlspecialchars($uz['szoveg'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>
