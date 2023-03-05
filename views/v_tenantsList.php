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
<h2>Ajouter une nouvelle société</h2>
<form action="" method="post">
    <label class="labelForm" for="tenantName">Nom de la société à ajouter</label>
    <input class="inputForm" type="text" id="tenantName" name="tenantName" />
    <button type="submit" class="btnGeneral2 successButton">Ajouter</button>
</form>

<h2>Liste</h2>
<table class="table">
    <thead>
        <tr>
            <th>Noms</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($displayTenantNames as $name){
            echo "<tr>";
            echo "<td>" . $name . "</td>";
            echo '<td><button type="button" class="btnGeneral2 dangerButton">Supprimer</button>';
            echo "</tr>";
        } ?>
        <tr>
            <td></td>
        </tr>
    </tbody>
</table>





<?php
//__________CALL THE FOOTER VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_footer.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_footer.php";
}

require_once($path);
?>