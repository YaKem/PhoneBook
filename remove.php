<?php

// --------------------------------------------------------------------------------------
// DEPENDANCES
// --------------------------------------------------------------------------------------

include 'utilities.php';



// --------------------------------------------------------------------------------------
// FONCTIONS
// --------------------------------------------------------------------------------------



// --------------------------------------------------------------------------------------
// CODE PRINCIPAL
// --------------------------------------------------------------------------------------

// Si aucune case à cocher n'est cochée, l'indice n'existera pas dans $_POST !
if(array_key_exists('indexes', $_POST) == true)
{
    // Chargement de toutes les contacts existantes.
    $allContacts = loadContacts();

    //Création d'une nouvelle liste de contacts ne comprenant que les contacts qui n'ont pas été sélectionnées.
    $contacts = removeContacts($allContacts, $_POST['indexes']);

    // Sauvegarde de la nouvelle liste de contacts (les contacts qui n'ont pas été cochées).
    saveContacts($contacts);
}

/*
 * Redirection vers la page d'accueil.
 *
 * Il est impératif de rediriger en HTTP GET après l'envoi d'un formulaire en HTTP POST.
 * Cela s'appelle le Post-Redirect-Get ou PRG - Lire la page Wikipédia à ce sujet.
 */
header('Location: index.php');
exit();