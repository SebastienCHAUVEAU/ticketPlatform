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

<h1>Modification d'un compte</h1>

<form action="" method="post">
<label class="labelForm" for="userfirstname">Prénom</label>
    <input class="inputForm" type="text" id="userfirstname" name="userfirstname" value="<?=$infosUser[0]["user_firstname"]?>" required>

    <label class="labelForm" for="userlastname">Nom</label>
    <input class="inputForm" type="text" id="userlastname" name="userlastname" value="<?=$infosUser[0]["user_lastname"]?>" required>

    <label class="labelForm" for="useremail">Adresse email</label>
    <input class="inputForm" type="text" id="useremail" name="useremail" value="<?=$infosUser[0]["user_email"]?>" required >

    <label class="labelForm" for="userphone">Numéro de téléphone</label>
    <input class="inputForm" type="number" id="userphone" name="userphone" value="<?=$infosUser[0]["user_phone_number"]?>" required>

    <label class="labelForm" for="userpassword">Mot de passe</label>
    <input class="inputForm" type="password" id="userpassword" name="userpassword" placeholder="Laissez vide pour ne pas modifier le mot de passe" value="">

    <label class="labelForm" for="useradmin">Utilisateur administrateur</label>
    <select class="inputForm" name="useradmin" id="useradmin">
        <option value="1" <?php if($infosUser[0]["user_isAdmin"] === 1){ echo "selected";} ?> >Oui</option>
        <option value="0" <?php if($infosUser[0]["user_isAdmin"] === 0){ echo "selected";} ?> >Non</option>
    </select>

    <label class="labelForm" for="usersociety">Société</label>
    <select class="inputForm" name="usersociety" id="usersociety">
        <?php 
            foreach ($userCreation_allTenants as $tenant) {
                $isSelectedTenantOption = " ";
                if ($tenant["tenant_id"] === $infosUser[0]["user_society"]) {
                    $isSelectedTenantOption = "selected";
                }
                echo "<option $isSelectedTenantOption value=";
                echo  $tenant["tenant_id"] . '>' . $tenant["tenant_name"];
                echo "</option>";
            }
    
          

        ?>
    </select>
    <input type="hidden" name="key" value="<?=$infosUser[0]['user_id']?>">

    <button type="submit" class="btnGeneral2 successButton">Modifier</button>
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