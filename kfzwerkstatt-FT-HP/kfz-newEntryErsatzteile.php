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

// Abrufen der Herstellerdaten aus der Datenbank
$hersteller_sql = "SELECT DISTINCT Hersteller FROM Ersatzteil";
$hersteller_result = $conn->query($hersteller_sql);
$hersteller_options = array();
if ($hersteller_result->num_rows > 0) {
    while ($row = $hersteller_result->fetch_assoc()) {
        $hersteller_options[] = $row["Hersteller"];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bezeichnung = $_POST["bezeichnung"];
    $hersteller = $_POST["hersteller"];
    $lieferantID = $_POST["lieferantID"];
    $preis = $_POST["preis"];

    $sql = "INSERT INTO Ersatzteil (Bezeichnung, Hersteller, LieferantID, Preis) 
    VALUES ('$bezeichnung', '$hersteller', '$lieferantID', '$preis')";
    if ($conn->query($sql) === TRUE) {
        echo "Ersatzteil erfolgreich hinzugefügt.";
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
    <title>Kfz Werkstatt - Neues Ersatzteil</title>
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
                            <label for="hersteller">Hersteller:</label>
                            <select class="form-control" id="hersteller" name="hersteller" required>
                                <?php
                                foreach ($hersteller_options as $option) {
                                    echo "<option value=\"$option\">$option</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="lieferantID">LieferantID:</label>
                            <input type="number" class="form-control" id="lieferantID" name="lieferantID" required>
                        </div>
                        <div class="col">
                            <label for="preis">Preis:</label>
                            <input type="number" step="0.01" class="form-control" id="preis" name="preis" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Ersatzteil hinzufügen</button>
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
