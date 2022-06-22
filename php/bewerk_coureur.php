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
$woon_id = $_POST['woon_id'];
$user_id = $_POST['user_id'];

$key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
//ENCRYPT FUNCTION
function encryptthis($data, $key) {
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

$passwordhash = encryptthis($wachtwoord ,$key );

$roll_id = 3;

$sql1 = 'SELECT email FROM tbl_users WHERE NOT id = :id AND email = :email';
$query1 = $conn->prepare($sql1);
$query1->execute(array(
    ':id' => $user_id,
    ':email' => $email
));

$RowCount = $query1->rowCount();

$status_id = 2;

if ($RowCount > 0) {
    $_SESSION['us_id'] = $user_id;
    $_SESSION['fout_melding'] = 'Email bestaat al.Maak op nieuw je bewerkingen';
    header('location:../index.php?page=bewerk_coureurs');
    exit;
}

$stmt = $conn->prepare('SELECT woon_id FROM tbl_users WHERE id = :id');
$stmt->bindParam(':id', $user_id);
$stmt->execute();
$oudWoonId = $stmt->fetch(PDO::FETCH_NUM)[0];

if ($oudWoonId !== $woon_id) {
    $sql2 = 'SELECT COUNT(*) FROM tbl_aangemelde_pakketten WHERE status_id = :sid AND coureur_id = :cid ';
    $query2 = $conn->prepare($sql2);
    $query2->execute(array(
        ':sid' => $status_id,
        ':cid' => $user_id
    ));
    $rs = $query2->fetch(PDO::FETCH_NUM)[0];

    echo $rs;
}
    if ($rs > 0) {
        $_SESSION['fout_melding'] = 'Woonplaats mag niet gewijzigd worden: er staan nog paketten open';
        header('location:../index.php?page=bewerk_eigengegevens');
        $_SESSION['coureur_id'] = $user_id;
        exit;
    }



    $sql = 'UPDATE tbl_users
        SET email = :email,
            wachtwoord = :wachtwoord ,
            voornaam = :voornaam,
            tussenvoegsel = :tussenvoegsel ,
            achternaam = :achternaam ,
            postcode = :postcode,
            straatnaam = :straatnaam,
            huisnummer = :huisnummer,
            woon_id = :woon_id
     WHERE id = :id
            ';
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
        ':id' => $user_id

    ));
    header('location: ../index.php?page=beheer_coureurs');
?>