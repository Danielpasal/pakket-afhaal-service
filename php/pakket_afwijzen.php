<?php
require '../private/connection.php';

$id = 1;

//$sql = "UPDATE `tbl_aangemelde_pakketten` SET `status_id` = '1' WHERE `id` = 42";
//$conn->exec($sql);

$sql = 'UPDATE tbl_aangemelde_pakketten SET status_id = :status_id, coureur_id = null WHERE id = :pakket_id';
$query = $conn->prepare($sql);
$query->execute(array(
    ':status_id' => $id,
    ':pakket_id' => $_POST['pakket_id'],
));

header('location:../index.php?page=geclaimde_pakketten');