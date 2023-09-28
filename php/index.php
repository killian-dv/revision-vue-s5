<?php
// Fonction pour récupérer les données de l'API
function fetchCountriesData() {
    $apiUrl = "https://restcountries.com/v3.1/all";
    $response = file_get_contents($apiUrl);
    return $response;
}

// Enregistrement des données dans un fichier JSON
$data = fetchCountriesData();
if ($data) {
    $jsonFile = 'countries.json';
    file_put_contents($jsonFile, $data);
    echo "Données enregistrées avec succès dans $jsonFile";
} else {
    echo "Erreur lors de la récupération des données depuis l'API.";
}
?>
