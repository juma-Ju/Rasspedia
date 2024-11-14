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
$sql = "SELECT * FROM artikel";
$result = $conn->query($sql);
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
        <span class="spanline">---------------------------------------</span>
        <li><a href="#">Anti-asiatischer Rassismus</a></li>
        <span class="spanline">---------------------------------------</span>
        <li><a href="#">Antisemitismus</a></li>
        <span class="spanline">---------------------------------------</span>
        <li><a href="#">Antimuslimischer Rassismus</a></li>
        <span class="spanline">---------------------------------------</span>
        <li><a href="#">Anti-Indigener Rassismus</a></li>
        <span class="spanline">---------------------------------------</span>
        <li><a href="#">Anti-Roma-Rassismus (Antiziganismus)</a></li>
        <span class="spanline">---------------------------------------</span>
        <li><a href="#">Rassismus gegenüber Menschen aus dem Nahen und Mittleren Osten</a></li>
        <span class="spanline">---------------------------------------</span>
        <li><a href="#">Rassismus gegen lateinamerikanische Menschen</a></li>
        <span class="spanline">---------------------------------------</span>
        <li><a href="#">Rassismus gegenüber anderen Gruppen</a></li>
        <span class="spanline">---------------------------------------</span>
        <li><a href="#">Gallerie</a></li>
      </ul>
    </aside>

    <!-- Main Content -->
    <main>

        <!-- Navigation -->
        <nav>
        <a href="#">Hauptseite</a>
        <a href="#">Über Rassismus</a>
        <a href="#">Alle Artikel</a>
        <a href="#">Kontakt</a>
        </nav>


        <div class="welcome">
        <H1>Wilkommen bei Rasspedia</H1>
        <H4>Wir sind eine Freie Informationsquelle über Rassismus, seine Auswirkungen, seine Arten und seine Opfer.</H4>
        </div>

        <!-- Content Area -->
        <section class="content">

            <h2 class="titel"></h2>



            <div class="toc">
            <h3>Inhaltsverzeichnis</h3>
            <ul>
                <li><a href="#pglink1">Unsere Mission</a></li>
                <li><a href="#pglink2">Was findest du bei uns?</a></li>
                <li><a href="#pglink3">Spiele und Lernmöglichkeiten</a></li>
                <li><a href="#pglink4">Unser Team</a></li>
                <li><a href="#"></a></li>
            </ul>
            </div>

            <p class="einfuerung" id="pg_link_1">
                einfuerung
            </p>

            <p class="haupttext" id="pg_link_1">
                haupttext
            </p>



            
        </section>
    </main>

    

    <!-- <div class="card">
      <h1>Rasspedia</h1><h2>Die Wissens-datenbank über Rassismus</h2>
      <button><a href="#footer">Scroll</a></button>
    </div> -->
    <footer id="footer">
        <div class="col col1">
            <h3>Rasspedia</h3>
            <p>Made with <span style="color: #BA6573;">❤ </span>by E1IT1</p>
            <div class="social">
            <a href="https://codepen.io/Juxtopposed" target="_blank" class="link"><img src="https://assets.codepen.io/9051928/codepen_1.png" alt="" /></a>
            <a href="https://twitter.com/juxtopposed" target="_blank" class="link"><img src="https://assets.codepen.io/9051928/x.png" alt="" /></a>
            <a href="https://youtube.com/@juxtopposed" target="_blank" class="link"><img src="https://assets.codepen.io/9051928/youtube_1.png" alt="" /></a>
            </div>
            <p style="color: #818181; font-size: smaller">2024 © All Rights Reserved</p>
        </div>
        <div class="col col2">
            <p>About</p>
            <p>Our mission</p>
            <p>Privacy Policy</p>
            <p>Terms of service</p>
        </div>
        <div class="col col3">
            <p>Services</p>
            <p>Products</p>
            <p>Join our team</p>
            <p>Partner with us</p>
        </div>
        <div class="backdrop"></div>
    </footer>
  </body>
</html>
