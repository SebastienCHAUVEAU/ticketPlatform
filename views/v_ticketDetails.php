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



<h1>Ticket # <?=$idTicket?></h1>
<h2>Détails</h2>
<p>Auteur : <?=htmlspecialchars($allTicketDetails["ticket_author"])?></p>
<p>Société : <?=htmlspecialchars($allTicketDetails["ticket_tenant"])?></p>
<p>Créé le : <?=htmlspecialchars(date('d-m-Y', strtotime($allTicketDetails["ticket_openDate"])))?></p> 
<p>Description : <?=htmlspecialchars($allTicketDetails["ticket_content"])?></p>

<h2>Commentaires</h2>
<?=$ticketCommentsToDisplay?>


<form action="" method="post">
<label class="labelForm" for="comment">Ajouter un nouveau commentaire</label>
<input class="inputForm" type="text" id="comment" name="comment">
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