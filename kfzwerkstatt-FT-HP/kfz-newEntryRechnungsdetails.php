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
    $rechnungsNr = $_POST["rechnungsNr"];
    $leistungsNr = $_POST["leistungsNr"];
    $menge = $_POST["menge"];
    $einzelpreis = $_POST["einzelpreis"];
    $gesamtpreis = $menge * $einzelpreis; 
    $steuersatz = $_POST["steuersatz"];
    
    $sql = "INSERT INTO tbl_rechnungsdetails (RechnungsNr, LeistungsNr, Menge, Einzelpreis, Gesamtpreis, Steuersatz) 
            VALUES ('$rechnungsNr', '$leistungsNr', '$menge', '$einzelpreis', '$gesamtpreis', '$steuersatz')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Rechnungsdetail erfolgreich hinzugefügt.";
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
    <title>Kfz Werkstatt - Neue Rechnungsdetails</title>
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
                            <label for="rechnungsNr">RechnungsNr:</label>
                            <input type="number" class="form-control" id="rechnungsNr" name="rechnungsNr" required>
                        </div>
                        <div class="col">
                            <label for="leistungsNr">LeistungsNr:</label>
                            <input type="number" class="form-control" id="leistungsNr" name="leistungsNr" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="menge">Menge:</label>
                            <input type="number" class="form-control" id="menge" name="menge" required>
                        </div>
                        <div class="col">
                            <label for="einzelpreis">Einzelpreis:</label>
                            <input type="text" class="form-control" id="einzelpreis" name="einzelpreis" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="steuersatz">Steuersatz:</label>
                            <input type="text" class="form-control" id="steuersatz" name="steuersatz" value="20.00" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Rechnungsdetail anlegen</button>
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
