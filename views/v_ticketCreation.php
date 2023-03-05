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
    <label class="labelForm" for="object">Objet du ticket</label>
    <input class="inputForm" type="text" id="object" name="object" required/>

    <label class="labelForm" for="description">Description du ticket</label>
    <textarea class="inputForm textareaForm" name="description" id="description" cols="30" rows="10" required></textarea>

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