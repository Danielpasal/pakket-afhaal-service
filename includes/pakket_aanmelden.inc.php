<?php


?>
<?php
if (isset($_SESSION['email_melding'])) {
    echo '<p class="melding">' . $_SESSION['email_melding'] . "</p>";
    unset($_SESSION['email_melding']);
}
$sql = 'SELECT * FROM tbl_woonplaatsen';
$q = $conn->prepare($sql);
$q->execute();

$sql1 = 'SELECT * FROM tbl_gewichten_prijs';
$q1 = $conn->prepare($sql1);
$q1->execute();

$sql2 = 'SELECT w.woonplaats , u.voornaam FROM tbl_users u
        INNER JOIN tbl_woonplaatsen w on u.woon_id = w.id
        WHERE roll_id = :roll
        ';
$query2 = $conn->prepare($sql2);
$query2->execute(
        array(
                ':roll' => 3
        )
);



?>
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Woonplaatsen</th>
                <th scope="col">Bezorgers</th>

            </tr>
            </thead>
            <tbody>

            <?php while($rs = $query2->fetch() ){ ?>
                <tr>
                    <td> <?php echo $rs['woonplaats']; ?></td>
                    <td><?php echo $rs['voornaam']; ?></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>    </div>
    <div class="col">

        <div class="container">
            <div class="row">
                <div class="col-sm">
                </div>
                <div class="col-sm">
                    <h1>Pakket Aanmelden</h1>
                    <form action="PHP/pakket_aanmelden.php" method="post"
                    ">
                    <div class="form-group">
                        <label for="ontvanger">Ontvanger</label>
                        <input required name="ontvanger" type="ontvanger" class="form-control" id="ontvanger"
                               aria-describedby="emailHelp" placeholder="Ontvanger">
                    </div>
                    <div class="form-group">
                        <label for="omschrijving">omschrijving</label>
                        <input required name="omschrijving" type="omschrijving" class="form-control" id="omschrijving"
                               placeholder="omschrijving">
                    </div>

                    <div class="form-group">
                        <label for="straatnaam">straat</label>
                        <input required name="straatnaam" type="text" class="form-control" id="straatnaam"
                               placeholder="straatnaam">
                    </div>
                    <div class="form-group">
                        <label for="postcode">postcode</label>
                        <input required name="postcode" type="text" class="form-control" id="postcode" placeholder="postcode">
                    </div>
                    <div class="form-group">
                        <label for="huisnummer">Huisnummer</label>
                        <input required name="huisnummer" type="text" class="form-control" id="huisnummer"
                               placeholder="huisnummer">
                    </div>
                    <div class="form-group">
                        <label for="woon_id">Woonplaats</label>
                        <select name="woon_id" id="woon_id">
                            <?php while ($rs_wp = $q->fetch()) { ?>
                                <option value="<?php echo $rs_wp['id'] ?>"> <?php echo $rs_wp['woonplaats'] ?>  </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gewicht">Gewicht</label>
                        <select name="gewicht_id" id="gewicht">
                            <?php while ($rs_g = $q1->fetch()) { ?>
                                <option value="<?php echo $rs_g['id'] ?>"> <?php echo $rs_g['gewicht'] ?> Gram -Prijs
                                    $<?php echo $rs_g['prijs'] ?> </option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Extra opties">Extra opties</label>
                        <select name="optie" id="optie">
                            <option value="0">Geen</option>
                            <option value="1">Spoed +10% van de prijs</option>
                            <option value="2">Verzekerd +20% van de prijs</option>
                            <option value="3">Spoed&Verzekerd +30% van de prijs</option>
                        </select>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-sm">
                </div>
            </div>
        </div>    </div>
    <div class="col">

    </div>
</div>


