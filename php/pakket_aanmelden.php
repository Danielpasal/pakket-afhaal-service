<?php

require '../private/connection.php';
session_start();

$ontvanger = $_POST['ontvanger'];
$omschrijving = $_POST['omschrijving'];
$straatnaam = $_POST['straatnaam'];
$postcode = $_POST['postcode'];
$huisnummer = $_POST['huisnummer'];
$woon_id = $_POST['woon_id'];
$gewicht_id = $_POST['gewicht_id'];
$optie = $_POST['optie'];
$status_id = 1;
$user_id = $_SESSION['user_id'];


$sql3 = 'SELECT prijs FROM tbl_gewichten_prijs  WHERE id = :gewicht_id';
$query3 = $conn->prepare($sql3);
$query3->execute(array(
    ':gewicht_id' => $gewicht_id
));

$rs = $query3->fetch();

switch ($optie) {
    case "0":
        $keuze0 = 'geen';
        $sql = 'INSERT INTO tbl_aangemelde_pakketten (ontvanger,omschrijving,straatnaam,huisnummer,postcode,woon_id,gewicht_id,keuze,totaal_prijs,status_id,user_id)
                VALUES (:ontvanger,:omschrijving,:straatnaam,:huisnummer,:postcode,:woon_id,:gewicht_id,:keuze,:totaal_prijs,:status_id,:user_id)';
        $q = $conn->prepare($sql);
        $q->execute(array(
            ':ontvanger' => $ontvanger,
            ':omschrijving' => $omschrijving,
            ':straatnaam' => $straatnaam,
            ':huisnummer' => $huisnummer,
            ':postcode' => $postcode,
            ':woon_id' => $woon_id,
            ':gewicht_id' => $gewicht_id,
            ':keuze' => $keuze0,
            ':status_id' => $status_id,
            ':totaal_prijs' => $rs['prijs'],
            ':user_id' => $user_id


        ));

        header('location:../index.php?page=mijn_pakketten');
        break;

    case "1":
        //10 procent
//       $toeslag = ($prijs / 100);
//       $toeslag = $toeslag * 10;
//        $toeslag =  $toeslag + $prijs;
        $nieuwbedrag = ($rs['prijs'] / 100) * 110;
        $keuze1 = 'spoed';
        $sql = 'INSERT INTO tbl_aangemelde_pakketten (ontvanger,omschrijving,straatnaam,huisnummer,postcode,woon_id,gewicht_id,keuze,totaal_prijs,status_id,user_id)
                VALUES (:ontvanger,:omschrijving,:straatnaam,:huisnummer,:postcode,:woon_id,:gewicht_id,:keuze,:totaal_prijs,:status_id,:user_id)';
        $q = $conn->prepare($sql);
        $q->execute(array(
            ':ontvanger' => $ontvanger,
            ':omschrijving' => $omschrijving,
            ':straatnaam' => $straatnaam,
            ':huisnummer' => $huisnummer,
            ':postcode' => $postcode,
            ':woon_id' => $woon_id,
            ':gewicht_id' => $gewicht_id,
            ':keuze' => $keuze1,
            ':totaal_prijs' => $nieuwbedrag,
            ':status_id' => $status_id,
            ':user_id' => $user_id


        ));

        header('location:../index.php?page=mijn_pakketten');
        break;
    case "2":
        //20 procent
        $keuze2 = 'spoed';
        $nieuwbedrag2 = ($rs['prijs'] / 100) * 120;
        $sql = 'INSERT INTO tbl_aangemelde_pakketten (ontvanger,omschrijving,straatnaam,huisnummer,postcode,woon_id,gewicht_id,keuze,totaal_prijs,status_id,user_id)
                VALUES (:ontvanger,:omschrijving,:straatnaam,:huisnummer,:postcode,:woon_id,:gewicht_id,:keuze,:totaal_prijs,:status_id,:user_id)';
        $q = $conn->prepare($sql);
        $q->execute(array(
            ':ontvanger' => $ontvanger,
            ':omschrijving' => $omschrijving,
            ':straatnaam' => $straatnaam,
            ':huisnummer' => $huisnummer,
            ':postcode' => $postcode,
            ':woon_id' => $woon_id,
            ':gewicht_id' => $gewicht_id,
            ':keuze' => $keuze2,
            ':totaal_prijs' => $nieuwbedrag2,
            ':status_id' => $status_id,
            ':user_id' => $user_id
        ));
        header('location:../index.php?page=mijn_pakketten');

        break;
    case "3":
        //30 procent
        $keuze3 = 'beide';
        $nieuwbedrag3 = ($rs['prijs'] / 100) * 130;
        $sql = 'INSERT INTO tbl_aangemelde_pakketten (ontvanger,omschrijving,straatnaam,huisnummer,postcode,woon_id,gewicht_id,keuze,totaal_prijs,status_id,user_id)
                VALUES (:ontvanger,:omschrijving,:straatnaam,:huisnummer,:postcode,:woon_id,:gewicht_id,:keuze,:totaal_prijs,:status_id,:user_id)';
        $q = $conn->prepare($sql);
        $q->execute(array(
            ':ontvanger' => $ontvanger,
            ':omschrijving' => $omschrijving,
            ':straatnaam' => $straatnaam,
            ':huisnummer' => $huisnummer,
            ':postcode' => $postcode,
            ':woon_id' => $woon_id,
            ':gewicht_id' => $gewicht_id,
            ':keuze' => $keuze3,
            ':totaal_prijs' => $nieuwbedrag3,
            ':status_id' => $status_id,
            ':user_id' => $user_id));
        header('location:../index.php?page=mijn_pakketten');

        break;
    default:
}

