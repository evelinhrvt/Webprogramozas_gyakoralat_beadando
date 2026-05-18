<div class="intro-grid auth-grid">
    <form action="?belep" method="post" class="crud-form">
        <fieldset>
            <legend>Bejelentkezés</legend>
            <input type="email" name="felhasznalo" placeholder="e-mail cím" required>
            <input type="password" name="jelszo" placeholder="jelszó" required>
            <input type="submit" name="belepes" value="Belépés">
        </fieldset>
    </form>

    <form action="?regisztral" method="post" class="crud-form">
        <fieldset>
            <legend>Regisztráció</legend>
            <input type="text" name="vezeteknev" placeholder="vezetéknév" required>
            <input type="text" name="utonev" placeholder="utónév" required>
            <input type="email" name="felhasznalo" placeholder="e-mail cím" required>
            <input type="password" name="jelszo" placeholder="jelszó" required>
            <input type="submit" name="regisztracio" value="Regisztráció">
        </fieldset>
    </form>
</div>
