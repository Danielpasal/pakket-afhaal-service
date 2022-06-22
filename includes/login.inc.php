<?php
//Als de user vekeerd heeft ingelod krijgt die een melding eerst gaan we kijken als de melding $_SESSION is gezet.Als
//dat zo krijgt die een melding
if (isset($_SESSION['melding'])) { ?>
<div class="alert alert-danger" role="alert">
    <?php
    echo '<p class="melding">' . $_SESSION['melding'] . "</p>";
    unset($_SESSION['melding']);
    } ?>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
            <form method="post" action="PHP/login.php">
                <div class="form-group">
                    <label for="email">Username</label>
                    <input required name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input required name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-sm">
        </div>
    </div>
</div>

