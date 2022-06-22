<?php

$sql = 'SELECT * FROM tbl_woonplaatsen';
$q = $conn->prepare($sql);
$q->execute();
?>
<?php if (isset($_SESSION['email_melding'])) { ?>
<div class="alert alert-danger" role="alert">

    <?php
        echo '<p class="melding">' . $_SESSION['email_melding'] . "</p>";
        unset($_SESSION['email_melding']);
    } ?>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
            <h1>Registration</h1>
            <form action="PHP/registration.php" method="post"
            ">
            <div class="form-group">
                <label for="email">Email</label>
                <input required name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp"
                       placeholder="Email">
            </div>
            <div class="form-group">
                <label for="straat">Wachtwoord</label>
                <input required name="wachtwoord" type="password" class="form-control" id="straat"
                       placeholder="Wachtwoord">
            </div>
            <div class="form-group">
                <label for="voornaam">Voornaam</label>
                <input required name="voornaam" type="text" class="form-control" id="voornaam" placeholder="Voornaam">
            </div>
            <div class="form-group">
                <label for="tussenvoegsel">Tussenvoegsel</label>
                <input name="tussenvoegsel" type="text" class="form-control" id="tussenvoegsel"
                       placeholder="Tussenvoegsel">
            </div>
            <div class="form-group">
                <label for="achternaam">Achternaam</label>
                <input required name="achternaam" type="text" class="form-control" id="achternaam"
                       placeholder="Achternaam">
            </div>
            <div class="form-group">
                <label for="postcode">Postcode</label>
                <input required name="postcode" type="text" class="form-control" id="postcode" placeholder="Postcode">
            </div>
            <div class="form-group">
                <label for="straatnaam">straat</label>
                <input required name="straatnaam" type="text" class="form-control" id="straatnaam"
                       placeholder="straatnaam">
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
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-sm">
        </div>
    </div>
</div>

