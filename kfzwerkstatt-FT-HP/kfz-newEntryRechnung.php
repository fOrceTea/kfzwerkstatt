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
    $kundenNr = $_POST["kundenNr"];
    $datum = $_POST["datum"];
    $rechnungsbetrag = $_POST["rechnungsbetrag"];
    $bezahlt = isset($_POST["bezahlt"]) ? 1 : 0; // Convert checkbox value to boolean
    $zahlungsdatum = $_POST["zahlungsdatum"];
    $kommentar = $_POST["kommentar"];

    $sql = "INSERT INTO tbl_rechnungen (KundenNr, Datum, Rechnungsbetrag, Bezahlt, Zahlungsdatum, Kommentar) 
    VALUES ('$kundenNr', '$datum', '$rechnungsbetrag', '$bezahlt', '$zahlungsdatum', '$kommentar')";
    
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
                            <label for="kundenNr">KundenNr:</label>
                            <input type="number" class="form-control" id="kundenNr" name="kundenNr">
                        </div>
                        <div class="col">
                            <label for="datum">Datum:</label>
                            <input type="date" class="form-control" id="datum" name="datum" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="rechnungsbetrag">Rechnungsbetrag:</label>
                            <input type="text" class="form-control" id="rechnungsbetrag" name="rechnungsbetrag" required>
                        </div>
                        <div class="col">
                            <label for="bezahlt">Bezahlt:</label>
                            <input type="checkbox" class="form-check-input" id="bezahlt" name="bezahlt">
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
                            <label for="kommentar">Kommentar:</label>
                            <textarea class="form-control" id="kommentar" name="kommentar"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Rechnung anlegen</button>
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
