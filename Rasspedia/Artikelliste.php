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

// SQL query to select all data from your table
$sql = "SELECT * FROM artikel ORDER BY id ASC ";
$result = $conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rasspedia</title>
  <link rel="stylesheet" type="text/css" href="artikelliste.css" />
  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>

<body>
  <!-- Header -->
  <header>
    <a href="index.html">
      <h1>Rasspedia</h1>
      <p>Ein Projekt gegen Rassismus - Gelbe Hand Projekt</p>
    </a>
  </header>

  <!-- Sidebar -->
  <aside class="sidebar">
    <h2>Kategorien</h2>
    <ul>
      <li><a href="artikel.php?id=1">Anti-Schwarzer Rassismus</a></li>
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
      <a href="rassismus.html">Über Rassismus</a>
      <a href="artikelliste.php">Alle Artikel</a>
      <a href="erstellen.html">Neuer Artikel</a>
      <a href="games.html">Spiele</a>
    </nav>

    <!-- Content Area -->
    <section class="content">

      <h2 class="titel"> Unsere Artikel</h2>


      <div class="artikelListe">
        <?php
        // LOOP TILL END OF DATA
        while ($rows = $result->fetch_assoc()) {
          ?>

          <a href="/artikel.php?id=<?php echo $rows['id']; ?> ">
            <div class="artikelField">
              <span>
                <?php echo $rows['titel']; ?>
              </span>

              <p>
                Erstellt:
                <br>
                <?php echo $rows['zeit']; ?>
              </p>
            </div>
          </a>

          <?php
        }
        ?>
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
      <p>XXX</p>
      <p>Kontakt</p>
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