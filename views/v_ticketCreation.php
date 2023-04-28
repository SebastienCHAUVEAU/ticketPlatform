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

<h1>Création d'un nouveau ticket</h1>

<form action="" method="post">
    <div class="row">
        <div class="col-6">
            <label class="labelForm" for="object">Objet du ticket</label>
            <input class="inputForm" type="text" id="object" name="object" placeholder="Veuillez renseigner l'objet du ticket" required />
        </div>

        <div class="col-5">
            <label class="labelForm" for="description">Description du ticket</label>
            <textarea class="inputForm textareaForm" name="description" id="description" cols="30" rows="2" placeholder="Veuillez renseigner la description du ticket" required></textarea>
        </div>
    </div>

    <?= $errorMessage ?>
    <button class="btnGeneral2 successButton" type="submit">Créer</button>
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