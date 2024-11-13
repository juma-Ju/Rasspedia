<?php

$servername = "localhost";
$username = "rasspdbc";
$password = "y$d2Zqbfby";
$dbname = "1";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}


$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$beschreibung = "";
$titel = "";
$startdatum = "";
$startzeit = "";
$enddatum = "";
$endzeit = "";

if ($id > 0) {

    $sql = "SELECT beschreibung, titel, startdatum, startzeit, enddatum, endzeit FROM kurs WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $beschreibung = $row['beschreibung'];
        $titel = $row['titel'];
        $startdatum = $row['startdatum'];
        $startzeit = $row['startzeit'];
        $enddatum = $row['enddatum'];
        $endzeit = $row['endzeit'];
    } else {
        echo "Kein Eintrag gefunden.";
    }
} else {
    echo "Ungültige ID.";
}


$conn->close();