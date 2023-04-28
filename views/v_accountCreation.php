<?php
//__________CALL THE HEADER VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_header.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_header.php";
}

require_once($path);

//__________CALL THE NAV VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_nav.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_nav.php";
}

require_once($path);
?>

<h1>Création d'un nouveau compte</h1>

<form action="" method="post">
    <div class="row">
        <div class="col-6">
            <label class="labelForm" for="userfirstname">Prénom</label>
            <input class="inputForm" type="text" id="userfirstname" name="userfirstname" placeholder="Veuillez entrer le prénom" required>

        </div>

        <div class="col-5">
            <label class="labelForm" for="userlastname">Nom</label>
            <input class="inputForm" type="text" id="userlastname" name="userlastname" placeholder="Veuillez entrer le nom" required>
        </div>

        <div class="col-6">
            <label class="labelForm" for="useremail">Adresse email</label>
            <input class="inputForm" type="email" id="useremail" name="useremail" placeholder="Veuillez entrer l'adresse email" required>
        </div>

        <div class="col-5">
            <label class="labelForm" for="userphone">Numéro de téléphone</label>
            <input class="inputForm" type="text" pattern="[0-9]*" id="userphone" name="userphone" placeholder="Veuillez entrer le numéro de téléphone" required>
        </div>

        <div class="col-6">
            <label class="labelForm" for="userpassword">Mot de passe</label>
            <input class="inputForm" type="password" id="userpassword" name="userpassword" placeholder="Veuillez entrer le mot de passe" required>
        </div>

        <div class="col-5">
            <label class="labelForm" for="useradmin">Utilisateur administrateur</label>
            <select class="inputForm" name="useradmin" id="useradmin">
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>
        </div>

        <div class="col-6">
            <label class="labelForm" for="usersociety">Société</label>
            <select class="inputForm" name="usersociety" id="usersociety">
                <?php
                foreach ($userCreation_allTenants as $tenant) {
                    echo '<option value="' . $tenant["tenant_id"] . '">' . $tenant["tenant_name"] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="col-12">
            <button type="submit" class="btnGeneral2 successButton">Créer</button>
        </div>
    </div>



    <?= $errorMessageUserCreation ?>

</form>

<?php
//__________CALL THE FOOTER VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_footer.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_footer.php";
}

require_once($path);
?>