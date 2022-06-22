<?php
require 'private/connection.php';

$sql = 'SELECT  a.id, a.ontvanger ,a.status_id , a.omschrijving ,a.straatnaam,a.huisnummer,a.postcode,a.keuze,a.totaal_prijs,tgp.gewicht,ts.status,tw.woonplaats
        FROM tbl_aangemelde_pakketten a 
        JOIN tbl_gewichten_prijs tgp ON a.gewicht_id = tgp.id
        JOIN tbl_status ts on a.status_id = ts.id
        JOIN tbl_woonplaatsen tw on a.woon_id = tw.id
        WHERE user_id = :id
            ';
$query = $conn->prepare($sql);
$query->execute(array(
    ':id' => $_SESSION['user_id']
));

?>

<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Ontvanger</th>
        <th scope="col">Omschrijving</th>
        <th scope="col">Woonplaats</th>
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

                <?php
                if($Rs_pakketen['status_id'] == 3 ){ ?>
                    <form action="php/pakket_afrekenen.php" method="post">
                        <button type="submit" class="btn btn-secondary">Afrekenen</button>
                        <input type="hidden" name="id" value="<?php echo $Rs_pakketen['id'] ?>">
                    </form>
                <?php }
                ?>

            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
