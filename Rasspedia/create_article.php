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

$message = "";
$saved = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && !$saved) {
    $titel = isset($_POST['titel']) ? $conn->real_escape_string($_POST['titel']) : '';
    $einfuerung = isset($_POST['einfuerung']) ? $conn->real_escape_string($_POST['einfuerung']) : '';
    $haupttext = isset($_POST['haupttext']) ? $conn->real_escape_string($_POST['haupttext']) : '';
    $schluss = isset($_POST['schluss']) ? $conn->real_escape_string($_POST['schluss']) : '';
    $quellen = isset($_POST['quellen']) ? $conn->real_escape_string($_POST['quellen']) : '';
    $nuetzliches = isset($_POST['nuetzliches']) ? $conn->real_escape_string($_POST['nuetzliches']) : '';
    $zeit = isset($_POST['zeit']) ? $conn->real_escape_string($_POST['zeit']) : '';
    $autor = isset($_POST['autor']) ? $conn->real_escape_string($_POST['autor']) : '';

    if (!empty($titel) || !empty($einfuerung) || !empty($haupttext) || !empty($schluss) || !empty($quellen) || !empty($nuetzliches) || !empty($zeit) || !empty($autor)) {
        // Get the next ID value
        $sql = "SELECT MAX(id) AS max_id FROM artikel";
        $result = $conn->query($sql);
        $next_id = 1;
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $next_id = $row['max_id'] + 1;
        }

        // Insert the new article
        $sql_insert = "INSERT INTO artikel (id, titel, einfuerung, haupttext, schluss, quellen, nuetzliches, zeit, autor) VALUES ($next_id, '$titel', '$einfuerung', '$haupttext', '$schluss', '$quellen', '$nuetzliches', '$zeit', '$autor')";
        if ($conn->query($sql_insert) === TRUE) {
            $message = "Der Artikel wurde erfolgreich hinzugefügt.";
            $saved = true;

            echo "<script type='text/javascript'>
                var newWindow = window.open('', '_blank', 'width=400,height=200');
                newWindow.document.write('<html><head><title>Artikel-ID</title></head><body><p>Die ID des gespeicherten Artikels war: $next_id</p></body></html>');
                newWindow.document.close();
                setTimeout(function() {
                    window.location.href = 'artikel.php?id=$next_id';
                }, 500);
            </script>";
        } else {
            $message = "Fehler beim Hinzufügen des Artikels: " . $conn->error;
        }
    }
}

$conn->close();
?>

<html>
    <style>
        body{
            background-color: #303030;
            color: white;
        }
        a{
            color: red;
        }
    </style>
    <body>
        <?php if (!empty($message)) { echo "<p>$message</p>"; } ?>
    </body>
</html>
