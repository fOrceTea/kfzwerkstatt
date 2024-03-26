<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kfz_werkstatt";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bezeichnung = $_POST["bezeichnung"];
    $preis = $_POST["preis"];
    $kontenNr = $_POST["kontenNr"];
    $steuersatz = $_POST["steuersatz"];

    $sql = "INSERT INTO tbl_leistungen (Bezeichnung, Preis, KontenNr, Steuersatz) VALUES ('$bezeichnung', '$preis', '$kontenNr', '$steuersatz')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Leistung erfolgreich hinzugefügt.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kfz Werkstatt - Neue Leistung</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .flex-container {
            display: flex;
            justify-content: space-around;
        }

        .flex-container>div {
            flex: 1;
        }
    </style>
</head>

<body>
    <div class="container">
        <main>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="bezeichnung">Bezeichnung:</label>
                            <input type="text" class="form-control" id="bezeichnung" name="bezeichnung" required>
                        </div>
                        <div class="col">
                            <label for="preis">Preis:</label>
                            <input type="text" class="form-control" id="preis" name="preis" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="kontenNr">KontenNr:</label>
                            <input type="number" class="form-control" id="kontenNr" name="kontenNr" required>
                        </div>
                        <div class="col">
                            <label for="steuersatz">Steuersatz:</label>
                            <input type="text" class="form-control" id="steuersatz" name="steuersatz" value="20.00" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Leistung anlegen</button>
                </div>
            </form>
        </main>

        <!-- jQuery and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </div>
</body>

</html>

<?php
$conn->close();
?>
