<?php

// Ophalen configuratie database
require("../config/database.php");

// Geef aan wat de verbindingsgegevens zijn
$connectionString = "mysql:dbname=$DB_NAME;host=$DB_HOST";

try{
	// Maak een nieuw PDO object aan (verbinding tot database ahv gegevens)
    $database = new PDO($connectionString, $DB_USER, $DB_PASSWORD);
    
    // Geef aan dat errors moeten verschijnen bij queries op deze connectie
    // (Standaard staan errors uit zodat gebruikers/hackers geen informatie krijgen over de werking van de database)
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $exception){
	// Als er iets mis gaat met het verbinden met PDO willen we de foutmelding laten zien:
    die('Connection failed with error: ' . $exception->getMessage());
}