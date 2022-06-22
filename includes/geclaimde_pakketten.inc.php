<?php
require 'private/connection.php';

$id = 2;

$sql = 'SELECT a.id as pakket_id , a.ontvanger , a.omschrijving ,a.straatnaam,a.huisnummer,a.postcode,a.keuze,a.totaal_prijs,tgp.gewicht,ts.status,tw.woonplaats
        FROM tbl_aangemelde_pakketten a 
        JOIN tbl_gewichten_prijs tgp ON a.gewicht_id = tgp.id
        JOIN tbl_status ts on a.status_id = ts.id
        JOIN tbl_woonplaatsen tw on a.woon_id = tw.id
        WHERE coureur_id = :user_id AND status_id = :status_id
            ';
$query = $conn->prepare($sql);
$query->execute(array(
    ':user_id' => $_SESSION['coureur_id'],
    ':status_id' => $id
));

?>

<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Ontvanger</th>
        <th scope="col">Omschrijving</th>
        <th scope="col">Wooplaats</th>
        <th scope="col">Straatnaam</th>
        <th scope="col">Huisnummer</th>
        <th scope="col">Postcode</th>
        <th scope="col">Keuze</th>
        <th scope="col">Gewicht</th>
        <th scope="col">Totaal prijs</th>
        <th scope="col">Status</th>
        <th scope="col">Actie</th>
    </tr>
    </thead>
    <tbody>

    <?php while ($Rs_pakketen = $query->fetch()) { ?>
        <tr>
            <td> <?php echo $Rs_pakketen['ontvanger'] ?></td>
            <td> <?php echo $Rs_pakketen['omschrijving'] ?></td>
            <td> <?php echo $Rs_pakketen['woonplaats'] ?></td>
            <td> <?php echo $Rs_pakketen['straatnaam'] ?></td>
            <td> <?php echo $Rs_pakketen['huisnummer'] ?></td>
            <td> <?php echo $Rs_pakketen['postcode'] ?></td>
            <td> <?php echo $Rs_pakketen['keuze'] ?></td>
            <td> <?php echo $Rs_pakketen['gewicht'] ?></td>
            <td> <?php echo $Rs_pakketen['totaal_prijs'] ?></td>
            <td> <?php echo $Rs_pakketen['status'] ?></td>
            <td>

                <form action="php/afleveren.php" method="post">
                    <button type="submit" class="btn btn-warning">Afleveren</button>
                    <input type="hidden" name="pakket_id" value="<?php echo $Rs_pakketen['pakket_id'] ?>">
                </form>
                <form action="php/pakket_afwijzen.php" method="post">
                    <button type="submit" class="btn btn-warning">Afwijzen</button>
                    <input type="hidden" name="pakket_id" value="<?php echo $Rs_pakketen['pakket_id'] ?>">
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
