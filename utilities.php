<?php

const DATAFILE = 'tasks.csv';


// --------------------------------------------------------------------------------------
// FONCTIONS
// --------------------------------------------------------------------------------------

function loadContacts()
{
	//Ouverture du fichier CSV des contacts en mode lecture avec création d'un fichier vide s'il n'existe pas encore.
	$file = fopen(DATAFILE, 'a+');

	// Création d'une liste de contacts vide.
	$contacts = array();

	// Boucle de lecture du fichier CSV, ligne par ligne, chaque ligne contenant un contact.
	while(true)
	{
		// Lecture d'une ligne du fichier CSV, donc d'un contact.
		$contactData = fgetcsv($file);

		// Est-ce qu'on est à la fin du fichier ?
		if($contactData == false)
		{
			// Oui, fin de la boucle de lecture du fichier CSV.
			break;
		}

		// Ajout du contact à la liste de contacts.
		array_push($contacts, $contactData);
	}

	// Fermeture du fichier CSV des contacts.
	fclose($file);

	asort($contacts);
	
	return $contacts;
}

function saveContact(array $contactData)
{
	// Ouverture du fichier CSV des contacts en mode ajout.
	$file = fopen(DATAFILE, 'a');

	// Ecriture d'une ligne dans le fichier CSV, une ligne contenant une contact.
	fputcsv($file, $contactData);

	// Fermeture du fichier CSV des contacts.
	fclose($file);
}

function saveContacts(array $contacts)
{

	 // Ouverture du fichier CSV des contacts en mode écriture.
	$file = fopen(DATAFILE, 'w');

	// Boucle d'écriture du fichier CSV, contact après contact
	foreach($contacts as $contactData)
	{
		// Ecriture d'un contact par ligne dans le fichier CSV
		fputcsv($file, $contactData);
	}

	// Fermeture du fichier CSV des contacts.
	fclose($file);
}


function removeContacts(array $allContacts, array $indexes)
{
    // Création d'un nouveau tableau de contacts.
	$contacts = array();

	// Parcours de la liste de contacts spécifiées.
	foreach($allContacts as $index => $contactData)
    {

        // On verifie si l'indice du contact existe dans la liste des indices des contacts qu'on ne doit pas conserver  
        if(!in_array($index, $indexes))
        {
            // Si non, on conserve le contact en le copiant dans notre nouveau tableau.
            array_push($contacts, $contactData);
        }
    }
	return $contacts;
}

?>