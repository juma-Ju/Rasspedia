<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


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

$titel = "";
$einfuerung = "";
$haupttext = "";
$schluss = "";
$quellen = "";
$nuetzliches = "";
$zeit = "";
$autor = "";

if ($id > 0) {

    $sql = "SELECT titel, einfuerung, haupttext, schluss, quellen, nuetzliches, zeit, autor FROM artikel WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $titel = $row['titel'];
        $einfuerung = $row['einfuerung'];
        $haupttext = $row['haupttext'];
        $schluss = $row['schluss'];
        $quellen = $row['quellen'];
        $nuetzliches = $row['nuetzliches'];
        $zeit = $row['zeit'];
        $autor = $row['autor'];
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

// echo "titel: " . $titel . "<br>";
// echo "einfuerung: " . $einfuerung . "<br>";
// echo "haupttext: " . $haupttext . "<br>";
// echo "schluss: " . $schluss . "<br>";
// echo "quellen: " . $quellen . "<br>";
// echo "nuetzliches: " . $nuetzliches . "<br>";
// echo "zeit: " . $zeit . "<br>";
// echo "autor: " . $autor . "<br>";


?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rasspedia</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="artikelliste.css" />
    <link rel="stylesheet" type="text/css" href="simditor/site/assets/styles/simditor.css" />
  </head>
  <body>


  <script type="text/javascript" src="simditor/site/assets/scripts/jquery.min.js"></script>
<script type="text/javascript" src="simditor/site/assets/scripts/module.js"></script>
<script type="text/javascript" src="simditor/site/assets/scripts/hotkeys.js"></script>
<script type="text/javascript" src="simditor/site/assets/scripts/uploader.js"></script>
<script type="text/javascript" src="simditor/site/assets/scripts/simditor.js"></script>









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

        <div class="container">

          <h2>
            <?php echo htmlspecialchars($titel); ?>
          </h2>

          <h3>Einführung:</h3>

          <div class="einfuerung">
            <?php echo htmlspecialchars($einfuerung); ?>
          </div>

          <h3>Hauptteil:</h3>

          <div class="haupttext">
            <?php echo htmlspecialchars($haupttext); ?>
          </div>

          <h3>Schluss:</h3>

          <div class="haupttext">
            <?php echo htmlspecialchars($schluss); ?>
          </div>

          <h3>Quellen:</h3>

          <div class="haupttext">
            <?php echo htmlspecialchars($quellen); ?>
          </div>

          <h3>Nützliches:</h3>

          <div class="haupttext">
            <?php echo htmlspecialchars($nuetzliches); ?>
          </div>

          <div class="details">
            <p><strong>Letzte Änderung:</strong> <?php echo htmlspecialchars($zeit); ?></p>
            <p><strong>Autor:</strong> <?php echo htmlspecialchars($autor); ?></p>
          </div>
          

          <textarea id="editor" placeholder="" autofocus></textarea>


          <script>
            var editor = new Simditor({
              textarea: $('#editor')
              //optional options
            });

          </script>




        </div>

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
