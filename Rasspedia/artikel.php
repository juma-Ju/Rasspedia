<?php
// Database credentials
$servername = "localhost";
$username = "rasspdbc";
$password = 'y$d2Zqbfby';
$dbname = "usrdb_rasspdbc_1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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

// SQL query to select all data from your table
$sql = "SELECT * FROM artikel ORDER BY id ASC ";
$result = $conn->query($sql);
$conn->close();

echo "Titel: " . $titel . "<br>";
echo "Beschreibung: " . $beschreibung . "<br>";
echo "Startdatum: " . $startdatum . "<br>";
echo "Startzeit: " . $startzeit . "<br>";
echo "Enddatum: " . $enddatum . "<br>";
echo "Endzeit: " . $endzeit . "<br>";


?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rasspedia</title>
    <link rel="stylesheet" type="text/css" href="artikelliste.css" />
  </head>
  <body>
    <!-- Header -->
    <header>
        <h1>Rasspedia</h1>
        <p>Ein Projekt gegen Rassismus - Gelbe Hand Projekt</p>
    </header>

    <!-- Sidebar -->
    <aside class="sidebar">
      <h2>Kategorien</h2>
      <ul>
        <li><a href="#">Anti-Schwarzer Rassismus</a></li>
        <li><a href="#">Anti-asiatischer Rassismus</a></li>
        <li><a href="#">Antisemitismus</a></li>
        <li><a href="#">Antimuslimischer Rassismus</a></li>
        <li><a href="#">Anti-Indigener Rassismus</a></li>
        <li><a href="#">Anti-Roma-Rassismus (Antiziganismus)</a></li>
        <li><a href="#">Rassismus gegenüber Menschen aus dem Nahen und Mittleren Osten</a></li>
        <li><a href="#">Rassismus gegen lateinamerikanische Menschen</a></li>
        <li><a href="#">Rassismus gegenüber anderen Gruppen</a></li>
      </ul>
    </aside>

    <!-- Main Content -->
    <main>

      <!-- Navigation -->
      <nav>
        <a href="index.html">Hauptseite</a>
        <a href="#">Über Rassismus XXX</a>
        <a href="artikelliste.php">Alle Artikel</a>
        <a href="#">Kontakt XXX</a>
      </nav>

      <!-- Content Area -->
      <section class="content">
        
      </section>
    </main>

    

    <!-- <div class="card">
      <h1>Rasspedia</h1><h2>Die Wissens-datenbank über Rassismus</h2>
      <button><a href="#footer">Scroll</a></button>
    </div> -->
    <footer id="footer">
      <div class="col col1">
        <h3>Rasspedia</h3>
        <p>Made with <span style="color: #BA6573;">❤</span> by E1IT1</p>
        <div class="social">

        </div>
        <p style="color: #818181; font-size: smaller">2024 © All Rights Reserved</p>
      </div>
      <div class="col col2">
        <p>Über Uns</p>
        <p>Unsere Mission</p>
        <p>Datenschutzerklärung</p>
        <p>Impressum</p>
      </div>
      <div class="col col3">
        <h1>Rasspedia</h1>
      </div>
      <div class="backdrop"></div>
    </footer>
  </body>
</html>
