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



<h1>Ticket # <?= $idTicket ?></h1>

<button type="button"id="deleteUserFirstButton" class="btnGeneral2 dangerButton">Supprimer le ticket</button>

<div id="deleteUSerContainer" class="hideElement">
    <form action="" method="post">
        <input type="hidden" name="deleteTicketNumber" value="<?= $idTicket ?>">
        <p class="errorMessage">Attention, si vous cliquez sur ce bouton il n'y aura pas de retour en arrière.</p>
        <button type="button" id="deleteUserReturnButton" class="btnGeneral2 warningButton">Revenir en arrière</button>
        <button type="submit" class="btnGeneral2 dangerButton">Suppression définitive</button>
    </form>
</div>


<h2>Détails</h2>
<p>Auteur : <?= htmlspecialchars($allTicketDetails["firstname"]) . ' ' . htmlspecialchars($allTicketDetails["lastname"]) ?></p>
<p>Société : <?= htmlspecialchars($allTicketDetails["tenantname"]) ?></p>
<p>Créé le : <?= htmlspecialchars(date('d-m-Y', strtotime($allTicketDetails["ticket_openDate"]))) ?></p>
<p>Objet : <?= htmlspecialchars($allTicketDetails["ticket_title"]) ?></p>
<p>Description : <?= htmlspecialchars($allTicketDetails["ticket_content"]) ?></p>

<h2>Modification</h2>
<form action="" method="post">
    <label class="labelForm" for="ticketStatut">Statut du ticket</label>
    <select class="inputForm" name="ticketStatut" id="ticketStatut">
        <option <?php if ($allTicketDetails["ticket_isActive"] === 1) {
                    echo "selected";
                } ?> value="1">Ouvert</option>
        <option <?php if ($allTicketDetails["ticket_isActive"] === 0) {
                    echo "selected";
                } ?> value="0">Fermé</option>
    </select>

    <label class="labelForm" for="ticketCategory">Catégorie du ticket</label>
    <select class="inputForm" name="ticketCategory" id="ticketCategory">
        <?php
        foreach ($allCategories as $category) {
            $isSelectedCategoryOption = " ";
            if ($category["category_id"] === $allTicketDetails["ticket_category"]) {
                $isSelectedCategoryOption = "selected";
            }
            echo "<option $isSelectedCategoryOption value=";
            echo  $category["category_id"] . '>' . $category["category_name"];
            echo "</option>";
        }

        ?>
    </select>

    <input name="ticketNumber" type="hidden" value="<?= $idTicket ?>" />

    <button type="submit" class="btnGeneral2 successButton">Modifier</button>
</form>

<h2>Commentaires</h2>
<?= $ticketCommentsToDisplay ?>


<form action="" method="post">
    <label class="labelForm" for="comment">Ajouter un nouveau commentaire</label>
    <input class="inputForm" type="text" id="comment" name="comment" />
    <input name="ticketNumber" type="hidden" value="<?= $idTicket ?>" />
    <button type="submit" class="btnGeneral2 successButton">Ajouter</button>
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