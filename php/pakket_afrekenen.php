<?php
require '../private/connection.php';
$status_id = 7;

$sql = 'UPDATE tbl_aangemelde_pakketten SET status_id = :id WHERE id = :pakket_id';
$query = $conn->prepare($sql);
$query->execute(array(
    ':id' => $status_id,
    'pakket_id' => $_POST['id']

));
header('location:../index.php?page=mijn_pakketten');
