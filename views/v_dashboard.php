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

<h1>Bienvenue <?= $userIdentity["user_firstname"] ?> <?= $userIdentity["user_lastname"] ?></h1>

<table class="table">
    <thead>
        <tr>
            <th>Nombre total de tickets ouverts</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $totalCurrentOpenedTickets["COUNT(ticket_id)"] ?></td>
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