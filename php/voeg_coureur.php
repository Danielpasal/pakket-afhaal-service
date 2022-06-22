<?php
require '../private/connection.php';

session_start();

$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];
$voornaam = $_POST['voornaam'];
$tussenvoegsel = $_POST['tussenvoegsel'];
$achternaam = $_POST['achternaam'];
$postcode = $_POST['postcode'];
$straatnaam = $_POST['straatnaam'];
$huisnummer = $_POST['huisnummer'];
$roll = 3;
$woon_id = $_POST['woon_id'];



$key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
//ENCRYPT FUNCTION
function encryptthis($data, $key) {
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

$passwordhash = encryptthis($wachtwoord ,$key );

$sql1 = 'SELECT email FROM tbl_users where email = :email ';
$query1 = $conn->prepare($sql1);
$query1->execute(array(':email' => $email));

$RowCount = $query1->rowCount();

if ($RowCount > 0){
    $_SESSION['fout_melding'] = 'Email bestaat al,vul opnieuw de gegevens';
    header('location:../index.php?page=voeg_coureur');
}else {
    $sql = 'INSERT INTO tbl_users (email, wachtwoord, voornaam, tussenvoegsel, achternaam, postcode, straatnaam, huisnummer, roll_id, woon_id) 
        VALUES (:email , :wachtwoord ,:voornaam, :tussenvoegsel,:achternaam,:postcode,:straatnaam,:huisnummer, :roll,:woon_id  )';
    $query = $conn->prepare($sql);
    $query->execute(array(
        ':email' => $email,
        ':wachtwoord' => $passwordhash,
        ':voornaam' => $voornaam,
        ':tussenvoegsel' => $tussenvoegsel,
        ':achternaam' => $achternaam,
        ':postcode' => $postcode,
        ':straatnaam' => $straatnaam,
        ':huisnummer' => $huisnummer,
        ':woon_id' => $woon_id,
        ':roll' => $roll


    ));
    header('location:../index.php?page=beheer_coureurs');

}

?>