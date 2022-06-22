<?php

require '../private/connection.php';
session_start();

$user_id = $_POST['user_id'];
$status_id = 2;


$sql1 = 'SELECT status_id FROM tbl_aangemelde_pakketten WHERE coureur_id = :id AND status_id = :status_id';
$qry = $conn->prepare($sql1);
$qry->execute(array(
    ':id' => $user_id,
    ':status_id' => $status_id
));
$RowCount = $qry->rowCount();

var_dump($RowCount);


if ($RowCount > 0 ){
    $_SESSION['fout_melding'] = 'Coureur heeft pakketjes openstaan';
    header('location: ../index.php?page=beheer_coureurs');


}else{


    $sql =  'DELETE FROM tbl_users WHERE id = :id';
    $q = $conn->prepare($sql);
    $q->execute(array(
        ':id'=> $_POST['user_id']
    ));




    header('location: ../index.php?page=beheer_coureurs');
}

