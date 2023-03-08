<?php
//__________CALL THE HEADER VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_header.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_header.php";
}

require_once($path);
?>

<div class="loginContainer">

    <div class="centeringElement">
        <img src="/public/images/helpdesk-logo.png" height="154.5" width="275" alt="helpdesk_logo" />
    </div>

    <div class="centeringElement">
        <h1>Gestion des tickets</h1>
    </div>

    <div class="formContainer">
        <form action="" method="post">
            <label class="labelForm" for="username">Identifiant</label>
            <input class="inputForm" name="username" id="username" type="text" placeholder="Veuillez saisir votre identifiant (adresse email)" required />
            <label class="labelForm" for="password">Mot de passe</label>
            <input class="inputForm" name="password" id="password" type="password" placeholder="Veuillez saisir votre mot de passe" required />
            <p id="errorLoginMessage" class="errorMessage hideElement">Veuillez renseigner votre identifiant et votre mot de passe.</p>
            <?php echo $errorConnexionMessage ?>
            <div id="divConnexionButton"><button class="btnGeneral successButton" id="connexionButton" type="submit">Connexion</button></div>
        </form>
    </div>
</div>


<?php
//__________CALL THE FOOTER VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_footer.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_footer.php";
}

require_once($path);
?>