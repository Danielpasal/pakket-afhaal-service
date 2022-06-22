<?php

require '../private/connection.php';
session_start();
$voornaam = $_POST['voornaam'];
$tussenvoegsel = $_POST['tussenvoegsel'];
$achternaam = $_POST['achternaam'];
$postcode = $_POST['postcode'];
$woon_id = $_POST['woon_id'];
$straatnaam = $_POST['straatnaam'];
$huisnummer = $_POST['huisnummer'];
$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];
$roll = 1;

$sql1 = 'SELECT email FROM tbl_users where email = :em';
$q = $conn->prepare($sql1);
$q->execute(array(
    ':em' => $email,
));
$key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
//ENCRYPT FUNCTION
function encryptthis($data, $key) {
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

$passwordhash = encryptthis($wachtwoord ,$key );


if ($q->rowCount() > 0) {
    $_SESSION['email_melding'] = 'Email bestaat al probeer iets anders';
    header('location: ../index.php?page=registratie');

} else {
    $sql = "INSERT INTO tbl_users (email, wachtwoord,tussenvoegsel,achternaam,voornaam,postcode,woon_id,straatnaam,huisnummer,roll_id)
            VALUES (:em, :wachtwoord,:tussenvoegsel,:achternaam,:voornaam,:postcode,:woon_id,:straatnaam,:huisnummer, :roll_id )";
    $query = $conn->prepare($sql);
    $query->execute(array(
        ':em' => $email,
        ':tussenvoegsel' => $email,
        ':achternaam' => $tussenvoegsel,
        ':voornaam' => $voornaam,
        ':postcode' => $postcode,
        ':woon_id' => $woon_id,
        ':straatnaam' => $straatnaam,
        ':huisnummer' => $huisnummer,
        ':wachtwoord' => $passwordhash,
        ':roll_id' => $roll
    ));

    header('location:../index.php?page=login');

}