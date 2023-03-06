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

<h1>Comptes de la plateforme</h1>

<a href="account_creation"><button type="button" class="btnGeneral2 successButton">Créer un nouvel utilisateur</button></a>

<h2>Liste des comptes</h2>
<table class="table">
    <thead>
        <tr>
            <th>Nom de l'utilisateur</th>
            <th>Adresse email</th>
            <th>Numéro de téléphone</th>
            <th>Administrateur</th>
            <th>Société</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($allUsersInformations as $user){
            echo "<tr>";
            echo "<td>" . $user['user_firstname'] . ' ' . $user['user_lastname'] . "</td>";
            echo "<td>" . $user['user_email'] . "</td>";
            echo "<td>" . $user['user_phone_number'] . "</td>";
            echo "<td>" . $user['user_isAdmin'] . "</td>";
            echo "<td>" . $user['user_society'] . "</td>";
            echo '<td><form action="account_modification" method="post"><input type="hidden" name="id" value="' . $user['user_id'] . '"><button class="btnGeneral warningButton" type="submit">Modifier</button></form></td>';
            echo "</tr>";
        }?>
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