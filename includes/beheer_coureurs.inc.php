
<?php
require 'private/connection.php';


$id = 3;

$sql = 'SELECT u.id as user_id ,u.email , u.wachtwoord , u.voornaam , u.tussenvoegsel , u.tussenvoegsel ,u.achternaam , u.postcode, u.straatnaam,u.huisnummer
     ,tr.roll ,w.*
        FROM tbl_users as u 
        INNER JOIN tbl_rollen  tr 
            on u.roll_id = tr.id 
        INNER JOIN tbl_woonplaatsen  w 
            on u.woon_id = w.id 
        WHERE roll_id = :id ';

$query = $conn->prepare($sql);
$query->execute(array( ':id' => $id ));

//var_dump($sql);
//Als de user vekeerd heeft ingelod krijgt die een melding eerst gaan we kijken als de melding $_SESSION is gezet.Als
//dat zo krijgt die een melding
if (isset($_SESSION['fout_melding'])) { ?>
<div class="alert alert-danger" role="alert">

    <?php
    echo '<p class="melding">' . $_SESSION['fout_melding'] . "</p>";
    unset($_SESSION['fout_melding']);
    } ?>
</div>

<form action="index.php?page=voeg_coureur" method="post">
    <button type="submit" class="btn btn-success">Voeg</button>
</form>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Email</th>
        <th scope="col">Wachtwoord</th>
        <th scope="col">Voornaam</th>
        <th scope="col">Tussenvoegsel</th>
        <th scope="col">Achternaam</th>
        <th scope="col">Woonplaats</th>
        <th scope="col">Postcode</th>
        <th scope="col">Straatnaam</th>
        <th scope="col">Huisnummer</th>
        <th scope="col">Roll</th>
        <th scope="col"> Actie </th>
    </tr>
    </thead>
    <tbody>

    <?php while ($Rs_users = $query->fetch()) {
//        var_dump($Rs_users);

        ?>
        <tr>
            <td> <?php echo $Rs_users['email'] ?></td>
            <td><input type="password" readonly value="<?php echo $Rs_users['wachtwoord'] ?>"> </td>
            <td> <?php echo $Rs_users['voornaam'] ?></td>
            <td> <?php echo $Rs_users['tussenvoegsel'] ?></td>
            <td> <?php echo $Rs_users['achternaam'] ?></td>
            <td> <?php echo $Rs_users['woonplaats'] ?></td>
            <td> <?php echo $Rs_users['postcode'] ?></td>
            <td> <?php echo $Rs_users['straatnaam'] ?></td>
            <td> <?php echo $Rs_users['huisnummer'] ?></td>
            <td> <?php echo $Rs_users['roll'] ?></td>
            <td>
                <form action="index.php?page=bewerk_coureurs" method="post">
                    <button type="submit" class="btn btn-secondary">Bewerk</button>
                    <input type="hidden" name="user_id" value="<?php echo $Rs_users['user_id'] ?>">
                </form>
                <form action="php/verwijder_coureur.php" method="post">
                    <button type="submit" class="btn btn-danger">Verwijder</button>
                    <input type="hidden" name="user_id" value="<?php echo $Rs_users['user_id'] ?>">
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

