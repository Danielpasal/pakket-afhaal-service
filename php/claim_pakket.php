<?php
require '../private/connection.php';

session_start();

$status_id = 2;
$user_id = $_SESSION['coureur_id'];
$pakket_id = $_POST['pakket_id'];

echo $user_id;

$sql = 'UPDATE tbl_aangemelde_pakketten SET coureur_id = :coureur_id ,status_id = :status_id WHERE id = :pakket_id ';
$q = $conn->prepare($sql);
$q->execute(array(
    ':coureur_id' => $user_id ,
    ':status_id' => $status_id,
    ':pakket_id' => $pakket_id
));

header('location:../index.php?page=geclaimde_pakketten');