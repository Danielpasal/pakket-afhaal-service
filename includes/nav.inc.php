<?php
require 'private/connection.php'
?>

<!--
Bij de navigatie balk heb ik na de index een url variable/url Parameter mee gegeven het begint na de index.php dus dan
starten we met de ? om de url variable/url Parameter aantemaken.Dan zetten we na de variable de naam van de variabel
in dit geval page dus ernaast.Vervolgens geven we een waarde en de waarde is login.als we op de home pagina zijn en
we hebben de nav.inc.php geinclude en de navigatie staat op de pagina en we klikken op een van de links dan haalt die
de waarde uit de page variable .De variable is ?page en de waarde achter is registration of login bijvoorbeeld.
/
Dit staat ook wel bekend als een $_GET variable.In de get we werken hier ook met name/value pairs in dit geval is page
de name en login de value/waarde
-->

<!--
<div>
    <a href="index.php?page=login">Login</a>
    <a href="index.php?page=registration">Registration</a>
</div>
-->
<?php

/* Nu gebruiken we een andere manier voor de navigatie bar .Want later komen er meer users met diffrent roles
waardoor we de nav bar ook anders moeten gaan laden in een variable manier en davoor gebruiken we een associative arrays
.Associative arrays geeft een naam voor de waarde s mee ze noemen het ook wel Key/value pairs Key staat voor de naam die
je de waarde geeft en value voor de waarde dus hier onder is de key name/Label Login en de waarde is login/link je ziet ook
een => dat verwijst ook wel naar de waarde van de Key name.Ze hebben meerdere namen de => teken.Soms noemen ze dit rocket of
pointer of is greater maar het gaat het er uiteindelijk omdat het verwijst naar de waarde.
*/

/*
 * Nu gebruiken we een Two-dimensional array voor de menu items en daar kunnen we nog een array in stoppen
en dit gebruiken voor de verschilende users die er zijn */

$MenuItems = array(
    'gebruiker' => array(
        'Login' => 'login',
        'Registreren' => 'registratie',
        'Test' => 'test'
    ),'klant'=> array(
            'Pakketten aanmelden' => 'pakket_aanmelden',
            'Mijn pakketen' => 'mijn_pakketten',
    ),
    'coureur' => array(
        'Aangemelde pakketten' => 'aangemelde_pakketten',
        'Geclaimde pakketten' => 'geclaimde_pakketten',
        'Afgeleverde pakketten' => 'afgeleverde_pakketten',
        'Beheer gegevens' => 'inzien_gegevens'
    ),
    'admin' => array(
            'Beheer coureurs' => 'beheer_coureurs',
    )

);

?>
<!--
nu gebruiken we een for each loop om de menu items van de key dus de rol te gaan ophalen en displayen. Hier bij is de Key de $label
en de value $link. Vervolgens zeten we in de waarde van de $user variable de $link variable dus en dat is uit eindelijk de waarde
van de key element in de array.

Nu zijn we op het punt dat verschil maken met users afhankelijk van de rolen die ze hebben.Dat doen we door een array in een array
we noemen het ook wel een Two-dimensional array.Later halen we de verschillende navbars door de Key(indices) in Two-dimensional array die in een
Two-dimensional array zit
-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Pakket afhaal service</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php echo '<div class="nav">';
    foreach ($MenuItems[$user] as $label => $link) { ?>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <?php echo '<a  class="nav-link" href="index.php?page=' . $link . '">  ' . $label . '</a>'; ?>
                </li>

            </ul>
        </div>
    <?php } ?>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <?php
                if ($user != 'gebruiker') {
                    echo '<a class="logout nav-link" href="PHP/logout.php">Logout</a>';
                }
                echo '</div>';
                ?>
    </div>
    </li>
</nav>