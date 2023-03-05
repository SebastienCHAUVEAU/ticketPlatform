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

<h1>Liste des tickets</h1>

<a href="ticket_creation"><button class="btnGeneral2 successButton">Création d'un nouveau ticket</button></a>

<h2>Tickets ouverts</h2>
<table  class="table">
    <thead>
        <tr>
            <th>Numéro</th>
            <th>Objet</th>
            <th>Auteur</th>
            <th>Société</th>
            <th>Catégorie</th>
            <th>Date de mise à jour</th>
            <th>Date d'ouverture</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($openedTicketInfos as $ticketInfo) {
            echo "<tr>";
            echo "<td>" . "#" . $ticketInfo['ticket_id'] . "</td>";
            echo "<td>" . $ticketInfo['ticket_title'] . "</td>";
            echo "<td>" . $ticketInfo['firstname'] . " " . $ticketInfo['lastname'] . "</td>";
            echo "<td>" . $ticketInfo['tenant'] . "</td>";
            echo "<td>" . $ticketInfo['category'] . "</td>";
            echo "<td>" . date('d-m-Y', strtotime($ticketInfo['ticket_updateDate'])) . "</td>";
            echo "<td>" . date('d-m-Y', strtotime($ticketInfo['ticket_openDate'])) . "</td>";
            echo '<td>';
            echo '<a href="details_ticket/' . $ticketInfo['ticket_id'] . '"><button type="button" class="btnGeneral warningButton">Modifier</button></a>';
            echo '</td>';
            echo "</tr>";
    
        }
        ?>
    </tbody>
</table>

<h2>Tickets fermés</h2>
<table class="table">
    <thead>
        <tr>
            <th>Numéro</th>
            <th>Objet</th>
            <th>Auteur</th>
            <th>Société</th>
            <th>Catégorie</th>
            <th>Date de mise à jour</th>
            <th>Date d'ouverture</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($closedTicketInfos as $ticketInfo) {
            echo "<tr>";
            echo "<td>" . "#" . $ticketInfo['ticket_id'] . "</td>";
            echo "<td>" . $ticketInfo['ticket_title'] . "</td>";
            echo "<td>" . $ticketInfo['firstname'] . " " . $ticketInfo['lastname'] . "</td>";
            echo "<td>" . $ticketInfo['tenant'] . "</td>";
            echo "<td>" . $ticketInfo['category'] . "</td>";
            echo "<td>" . date('d-m-Y', strtotime($ticketInfo['ticket_updateDate'])) . "</td>";
            echo "<td>" . date('d-m-Y', strtotime($ticketInfo['ticket_openDate'])) . "</td>";
            echo '<td>';
            echo '<a href="details_ticket/' . $ticketInfo['ticket_id'] . '"><button type="button" class="btnGeneral warningButton">Modifier</button></a>';
            echo '</td>';
            echo " </tr>";
        }
        ?>
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