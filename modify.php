<?php

// --------------------------------------------------------------------------------------
// DEPENDANCES
// --------------------------------------------------------------------------------------

include 'utilities.php';

// --------------------------------------------------------------------------------------
// CODE PRINCIPAL
// --------------------------------------------------------------------------------------
// Récupération de toutes les contacts.
$contacts = loadContacts();
// Récupération de l'index du contact à modifier.
$contact = $contacts[$_GET['index']];

// Suppression du contact de la liste des contacts.
$contacts = removeContacts($contacts, [$_GET['index']]);

// Enregistrement du tableau contenant le contact.
saveContacts($contacts);

// Chargement du template.
include 'index.phtml';

?>