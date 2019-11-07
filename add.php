<?php

// --------------------------------------------------------------------------------------
// DEPENDANCES
// --------------------------------------------------------------------------------------

include 'utilities.php';



// --------------------------------------------------------------------------------------
// FONCTIONS
// --------------------------------------------------------------------------------------

function addContact($lastname, $firstname, $address, $email, $phone)
{

	// Création du tableau contenant la contact.
	$ContactData =
	[
		$lastname,
		$firstname,
		$address,
        $email,
        $phone
	];

	// Enregistrement du tableau contenant la contact.
	saveContact($ContactData);
}


// --------------------------------------------------------------------------------------
// CODE PRINCIPAL
// --------------------------------------------------------------------------------------

// Si l'utilisateur n'a pas saisi de nom au contact alors on ne l'ajoute pas.
if(!empty($_POST['lastname']))
{
    // Récupération des données de formulaire.
    $lastname = $_POST['lastname'];
    $firstname    = $_POST['firstname'];
    $address       = $_POST['address'];
    $email    =   $_POST['email'];
    $phone    =   $_POST['phone'];
    // Ajout du contact aux contacts existantes.
    addContact($lastname, $firstname, $address, $email, $phone);
}

// Redirection vers la page d'accueil.
header('Location: index.php');
exit();