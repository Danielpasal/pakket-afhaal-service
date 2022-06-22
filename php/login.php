<?php
session_start();
//session_start () maakt een sessie aan of hervat de huidige op basis van een sessie-ID die is doorgegeven via
// een GET- of POST-verzoek, of doorgegeven via een cookie.

//hier inkopieren we de connectie
require '../private/connection.php';
/*
door dat we de functie session_start(); gebruiken.Kunnen we global $_SESSION ook gebruiken
de $_SESSION superglobal en is een manier om toegang te krijgen tot informatie over meerdere pagina's
dat op geslagen word als een globale variabele $_SESSIONS. In dit geval gebruiken de $_SESSIONS voor een melding
te displayen op de page waar vekeerd ingelogd is.

Kort maar krachtig de session_start(); functie zorgt dat de sessie word gestart en onthouden word op de volgende pagina
.en de waarde van de variable $_SESSION word onthouden als je het daar de session_start(); en $_SESSION gebruikt.

de header zorgt ervoor dat als de na de conditie
*/
$_SESSION['password'] = $password = $_POST['password'];
$email = $_POST['email'];
/* Execute a prepared statement by passing an array of values */
$sql = 'SELECT u.woon_id,u.email, u.wachtwoord ,r.roll ,u.id
FROM tbl_users u
INNER JOIN tbl_rollen r ON u.roll_id = r.id WHERE email = :email';
$sth = $conn->prepare($sql);
$sth->execute(array(':email' => $email));

$rsUser = $sth->fetch(PDO::FETCH_ASSOC);

//DECRYPT FUNCTION
$key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';


function decryptthis($data, $key) {
    $encryption_key = base64_decode($key);
    list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}

$wachtwoord = decryptthis($rsUser['wachtwoord'], $key);



if ($email == $rsUser['email'] && $_POST['password'] == $wachtwoord ) {
    $roll = $rsUser['roll'];
    echo $roll;


    switch ($roll) {
        case "admin":

            $_SESSION['user'] = $rsUser['roll'];
            header('location:../index.php?page=beheer_coureurs');
            break;
        case "klant":

            $_SESSION['user'] = $rsUser['roll'];
            $_SESSION['user_id'] = $rsUser['id'];
            header('location:../index.php?page=mijn_pakketten');
            break;
        case "coureur":

            $_SESSION['user'] = $rsUser['roll'];
            $_SESSION['coureur_id'] = $rsUser['id'];
            $_SESSION['woon_id'] = $rsUser['woon_id'];
            header('location:../index.php?page=aangemelde_pakketten');
            break;

        default:
            $_SESSION['user'] = 'gebruiker';
            $_SESSION['melding'] = 'Er is iets fouts';
            header('location:../index.php?page=login');
            break;
    }
} else {
    $_SESSION['user'] = 'gebruiker';
    $_SESSION['melding'] = 'Er is iets fouts gegaan probeer het opnieuw';
    header('location:../index.php?page=login');
}





