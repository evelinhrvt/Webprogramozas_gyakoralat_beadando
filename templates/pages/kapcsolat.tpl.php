<h2>Kapcsolat</h2>
<p>Kapcsolattartó: <strong>Farkas Bence</strong></p>
<p>E-mail: <strong>ugyfelszolgalat@notebookvilag.hu</strong></p>
<p>Telefon: <strong>+36 30 456 7890</strong></p>
<p>Bemutatótermi referencia: <strong>Notebook.hu ÁRKÁD, 1106 Budapest, Örs vezér tere 25/a</strong></p>

<div class="embed-wrap map">
    <iframe src="https://www.google.com/maps?q=Notebook.hu%20%C3%81RK%C3%81D%20Budapest%20%C3%96rs%20vez%C3%A9r%20tere%2025%2Fa&output=embed" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<h3>Írj nekünk üzenetet</h3>
<form name="kapcsolatForm" action="?kapcsolat_eredmeny" method="post" onsubmit="return ellenoriz();" class="crud-form">
    <label>Név:</label>
    <input type="text" id="nev" name="nev" value="<?= isset($_SESSION['login']) ? htmlspecialchars($_SESSION['csn'].' '.$_SESSION['un']) : '' ?>">

    <label>E-mail cím:</label>
    <input type="text" id="email" name="email">

    <label>Üzenet szövege:</label>
    <textarea id="uzenet" name="uzenet" rows="5"></textarea>

    <input type="submit" value="Üzenet küldése">
</form>

<script>
function ellenoriz() {
    const nev = document.getElementById("nev").value;
    const email = document.getElementById("email").value;
    const uzenet = document.getElementById("uzenet").value;
    let hiba = "";

    if (nev.trim() === "") hiba += "A név megadása kötelező!\n";

    const emailMinta = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailMinta.test(email)) hiba += "Kérjük, adj meg egy érvényes e-mail címet!\n";

    if (uzenet.trim() === "") hiba += "Az üzenet nem lehet üres!\n";

    if (hiba !== "") {
        alert(hiba);
        return false;
    }
    return true;
}
</script>
