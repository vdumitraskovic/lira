<a href="http://www.pmf.uns.ac.rs" id="logo_pmf"></a>
<a href="/" id="logo"></a>

<input type="checkbox" id="toggle" />

<nav>
    <label for="toggle" class="toggle" id="menu-icon">&equiv;</label>
     
    <ul id="main-nav">
        <li><a href="index.php" class="<?php if ($section == "home") { echo "current" ; } ?>">Početak</a></li>
        <li><a href="#">O nama</a></li>
        <li><a href="#">Vizija i misija</a></li>
        <li><a href="#">Istraživanja</a></li>
        <li><a href="analize.php" class="<?php if ($section == "analize") { echo "current" ; } ?>">Analize</a></li>
        <li><a href="akreditacija.php" class="<?php if ($section == "akreditacija") { echo "current" ; } ?>">Akreditacija</a></li>
        <li><a href="anketa.php" class="<?php if ($section == "anketa") { echo "current" ; } ?>">Anketa</a></li>
        <li><a href="#">Kontakt</a></li>
        <li><a href="#">Važni linkovi</a></li>
    </ul>
</nav>