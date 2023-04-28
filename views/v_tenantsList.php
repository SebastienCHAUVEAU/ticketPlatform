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

<h1>Sociétés clientes</h1>
<div class="row">
    <div class="col-6 col-xs">
        <h2>Ajouter une nouvelle société</h2>
        <form action="" method="post">
            <label class="labelForm" for="tenantName">Nom de la société à ajouter</label>
            <input class="inputForm" type="text" id="tenantName" name="tenantName" required />

            <?= $errorMessageNewTenant ?>

            <button type="submit" class="btnGeneral2 successButton">Ajouter</button>
        </form>
    </div>

    <div class="col-5 col-xs">
        <h2>Liste</h2>
        <div class="responsiveTable">
            <table class="table col-12">
                <thead>
                    <tr>
                        <th>Noms</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($displayTenantNames as $name) {
                        echo "<tr>";
                        echo "<td>" . $name . "</td>";
                        echo "</tr>";
                    } ?>
                </tbody>
            </table>
        </div>
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