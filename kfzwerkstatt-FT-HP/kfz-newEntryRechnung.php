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
    $vin = $_POST["vin"];
    $rechnungsdatum = $_POST["rechnungsdatum"];
    $betrag = $_POST["betrag"];
    $arbeitsstunden = $_POST["arbeitsstunden"];
    $materialkosten = $_POST["materialkosten"];
    $steuersatz = $_POST["steuersatz"];
    $gesamtbetrag = $_POST["gesamtbetrag"];
    $zahlungsstatus = $_POST["zahlungsstatus"];
    $zahlungsdatum = $_POST["zahlungsdatum"];
    $bemerkung = $_POST["bemerkung"];

    $sql = "INSERT INTO Rechnung (VIN, Rechnungsdatum, Betrag, Arbeitsstunden, Materialkosten, Steuersatz, Gesamtbetrag, Zahlungsstatus, Zahlungsdatum, Bemerkung) 
    VALUES ('$vin', '$rechnungsdatum', '$betrag', '$arbeitsstunden', '$materialkosten', '$steuersatz', '$gesamtbetrag', '$zahlungsstatus', '$zahlungsdatum', '$bemerkung')";
    if ($conn->query($sql) === TRUE) {
        echo "Rechnung erfolgreich hinzugefügt.";
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
    <title>Kfz Werkstatt - Neue Rechnung</title>
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
                            <label for="vin">VIN:</label>
                            <input type="text" class="form-control" id="vin" name="vin" required>
                        </div>
                        <div class="col">
                            <label for="rechnungsdatum">Rechnungsdatum:</label>
                            <input type="date" class="form-control" id="rechnungsdatum" name="rechnungsdatum" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="betrag">Betrag:</label>
                            <input type="number" step="0.01" class="form-control" id="betrag" name="betrag" required>
                        </div>
                        <div class="col">
                            <label for="arbeitsstunden">Arbeitsstunden:</label>
                            <input type="number" class="form-control" id="arbeitsstunden" name="arbeitsstunden" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="materialkosten">Materialkosten:</label>
                            <input type="number" step="0.01" class="form-control" id="materialkosten" name="materialkosten" required>
                        </div>
                        <div class="col">
                            <label for="steuersatz">Steuersatz:</label>
                            <input type="number" step="0.01" class="form-control" id="steuersatz" name="steuersatz" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="gesamtbetrag">Gesamtbetrag:</label>
                            <input type="number" step="0.01" class="form-control" id="gesamtbetrag" name="gesamtbetrag" required>
                        </div>
                        <div class="col">
                            <label for="zahlungsstatus">Zahlungsstatus:</label>
                            <input type="text" class="form-control" id="zahlungsstatus" name="zahlungsstatus" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="zahlungsdatum">Zahlungsdatum:</label>
                            <input type="date" class="form-control" id="zahlungsdatum" name="zahlungsdatum">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="bemerkung">Bemerkung:</label>
                            <textarea class="form-control" id="bemerkung" name="bemerkung"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Rechnung anlegen</button>
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
