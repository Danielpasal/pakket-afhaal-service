<?php
session_start();

//session_start () maakt een sessie aan of hervat de huidige op basis van een sessie-ID die is doorgegeven
// via een GET- of POST-verzoek, of doorgegeven via een cookie.

//$page = $_GET['page'];
//$page = 'login';
/*
hier onder kijk je of de pagina is gezet doormiddel van een if and else statment.
In de if condite kijken we als de pagina is gezet met de isset functie als dit klopt
gaat die page waarde die gezet is toe dus bijvoorbeeld naar login of registration.Als
die niet gezet is gaat die naar de else statement en gaat naar de default page
en daar bedoel ik mee de page login heb gezet

Note de page waarde van de $_GET variable zet die in de $page variable
*/
if (isset($_GET['page']))
{
    $page = $_GET['page'];
}
else {
    $page= 'login';
}
/*
hier onder kijkt die als de $_SESSION['user'] waarde is gezet als dat zo is gaat die naar de nav.inc.php en geeft die
de waarde van de $user mee en de waarde kan Visitor of Admin zijn zo niet gaat die naar de else en geeft die een default
waarde als visitor dit word dan naar de login gestuurd en geeft de waarde van $page als visitor of Admin afhankelijk van de rol
 */
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    $user ='gebruiker';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pakket afhaal service</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="body-background">
<?php
include 'includes/nav.inc.php';
/*De $page variabel van hier onder haalt de waarde op van de $_GET['page'] variabel die we boven hebben gezet als er niks is
gezet gaat die naar page home page als default page
*/
include 'includes/'.$page.'.inc.php';
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>