<?php
require '../private/connection.php';

session_start();

$status_id = 3;

$pakket_id = $_POST['pakket_id'];


$sql = 'UPDATE tbl_aangemelde_pakketten SET status_id = :status_id WHERE id = :pakket_id';
$q = $conn->prepare($sql);
$q->execute(array(
    ':status_id' => $status_id,
    ':pakket_id' => $pakket_id
));

header('location:../index.php?page=afgeleverde_pakketten');