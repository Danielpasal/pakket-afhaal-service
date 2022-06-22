
<?php
require 'private/connection.php';

$id = $_POST['user_id'] ?? $_SESSION['us_id'];

$sql = 'SELECT * FROM tbl_woonplaatsen';
$q = $conn->prepare($sql);
$q->execute();

$sql1 = 'SELECT u.email , u.wachtwoord , u.voornaam , u.tussenvoegsel , u.tussenvoegsel ,u.achternaam , u.postcode, u.straatnaam,u.huisnummer
     ,tr.roll ,tw.id as tw_id ,tw.woonplaats
        FROM tbl_users as u 
        INNER JOIN tbl_rollen  tr 
            on u.roll_id = tr.id 
        INNER JOIN tbl_woonplaatsen  tw 
            on u.woon_id = tw.id 
        WHERE u.id = :id';

$query1 = $conn->prepare($sql1);
$query1->execute(array( ':id' => $id ));

$rs_user = $query1->fetch();


//DECRYPT FUNCTION
$key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';


function decryptthis($data, $key) {
    $encryption_key = base64_decode($key);
    list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}

if (isset($_SESSION['fout_melding'])) { ?>
<div class="alert alert-danger" role="alert">

    <?php
    echo '<p class="melding">' . $_SESSION['fout_melding'] . "</p>";
    unset($_SESSION['fout_melding']);
    } ?>
</div>


<form method="post" action="php/bewerk_coureur.php">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input required type="email" name="email" value="<?php echo $rs_user['email'];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input required type="text" name="wachtwoord"  value="<?php echo decryptthis($rs_user['wachtwoord'], $key)?>" class="form-control" id="exampleInputPassword1" placeholder="Wachtwoord">
    </div>
    <div class="form-group">
        <label for="voornaam">Voornaam</label>
        <input required type="text" name="voornaam" value="<?php echo $rs_user['voornaam'];?>" class="form-control" id="voornaam" placeholder="Voornaam">
    </div>
    <div class="form-group">
        <label for="tussenvoegsel">Tussenvoegsel</label>
        <input  type="text" name="tussenvoegsel" value="<?php echo $rs_user['tussenvoegsel'];?>" class="form-control" id="tussenvoegsel" placeholder="Tussenvoegsel">
    </div>
    <div class="form-group">
        <label for="achternaam">Achternaam</label>
        <input required type="text" name="achternaam" class="form-control" value="<?php echo $rs_user['achternaam'];?>" id="achternaam" placeholder="Achternaam">
    </div>
    <div class="form-group">
        <label for="postcode">Postcode</label>
        <input required type="text" name="postcode" class="form-control" value="<?php echo $rs_user['postcode'];?>" id="postcode" placeholder="Postcode">
    </div>
    <div class="form-group">
        <label for="straatnaam">Straatnaam</label>
        <input required type="text" name="straatnaam" class="form-control" value="<?php echo $rs_user['straatnaam'];?>" id="straatnaam" placeholder="Straatnaam">
    </div>
    <div class="form-group">
        <label for="huisnummer">Huisnummer</label>
        <input required type="text" name="huisnummer" class="form-control" value="<?php echo $rs_user['huisnummer'];?>" id="huisnummer" placeholder="Huisnummer">
    </div>
    <div class="form-group">
        <label for="woonplaats">Woonplaats</label>
        <select required name="woon_id" id="woonplaats">

            <option value="<?php echo $rs_user['tw_id'] ?>"><?php echo $rs_user['woonplaats'] ?> </option>
            <?php while($rs_wp = $q->fetch()){ ?>
                <option value="<?php echo $rs_wp['id'] ?>"><?php echo $rs_wp['woonplaats'] ?></option>
            <?php }?>
        </select>
    </div>
    <input type="hidden" name="user_id" value="<?php echo $id?>">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>