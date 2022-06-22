<?php
require 'private/connection.php';

$sql = 'SELECT * FROM tbl_woonplaatsen';
$q = $conn->prepare($sql);
$q->execute();

if (isset($_SESSION['fout_melding'])) { ?>
<div class="alert alert-danger" role="alert">

    <?php
    echo '<p class="melding">' . $_SESSION['fout_melding'] . "</p>";
    unset($_SESSION['fout_melding']);
    } ?>
</div>

<form method="post" action="php/voeg_coureur.php">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input required type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input required type="password" name="wachtwoord" class="form-control" id="exampleInputPassword1" placeholder="Wachtwoord">
    </div>
    <div class="form-group">
        <label for="voornaam">Voornaam</label>
        <input required type="text" name="voornaam" class="form-control" id="voornaam" placeholder="Voornaam">
    </div>
    <div class="form-group">
        <label for="tussenvoegsel">Tussenvoegsel</label>
        <input  type="text" name="tussenvoegsel" class="form-control" id="tussenvoegsel" placeholder="Tussenvoegsel">
    </div>
    <div class="form-group">
        <label for="achternaam">Achternaam</label>
        <input required type="text" name="achternaam" class="form-control" id="achternaam" placeholder="Achternaam">
    </div>
    <div class="form-group">
        <label for="postcode">Postcode</label>
        <input required type="text" name="postcode" class="form-control" id="postcode" placeholder="Postcode">
    </div>
    <div class="form-group">
        <label for="straatnaam">Straatnaam</label>
        <input required type="text" name="straatnaam" class="form-control" id="straatnaam" placeholder="Straatnaam">
    </div>
    <div class="form-group">
        <label for="huisnummer">Huisnummer</label>
        <input required type="text" name="huisnummer" class="form-control" id="huisnummer" placeholder="Huisnummer">
    </div>
    <div class="form-group">
        <label for="woonplaats">Woonplaats</label>
        <select required name="woon_id" id="woonplaats">
            <?php while($rs_wp = $q->fetch()){ ?>
            <option value="<?php echo $rs_wp['id'] ?>"><?php echo $rs_wp['woonplaats'] ?></option>
            <?php }?>
            <input type="text">
        </select>
        
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>