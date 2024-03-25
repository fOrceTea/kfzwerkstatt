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
    $kennzeichen = $_POST["kennzeichen"];
    $marke = $_POST["marke"];
    $typ = $_POST["typ"];
    $baujahr = $_POST["baujahr"];
    $kmStand = $_POST["kmStand"];
    $kw = $_POST["kw"];
    $treibstoff = $_POST["treibstoff"];
    $tueren = $_POST["tueren"];
    $karosieform = $_POST["karosieform"];
    $zulassung = $_POST["zulassung"];
    $erstzulassung = $_POST["erstzulassung"];
    $fahrgestellnummer = $_POST["fahrgestellnummer"];
    $motornummer = $_POST["motornummer"];
    $hubraum = $_POST["hubraum"];
    $fin = $_POST["fin"];

    $sql = "INSERT INTO tbl_kfz_kfz (KundenNr, Kennzeichen, Marke, Typ, Baujahr, kmStand, kw, treibstoff, Tueren, karosieform, Zulassung, Erstzulassung, Fahrgestellnummer, Motornummer, Hubraum, FIN) 
    VALUES ('$kundenNr', '$kennzeichen', '$marke', '$typ', '$baujahr', '$kmStand', '$kw', '$treibstoff', '$tueren', '$karosieform', '$zulassung', '$erstzulassung', '$fahrgestellnummer', '$motornummer', '$hubraum', '$fin')";
    if ($conn->query($sql) === TRUE) {
        echo "Fahrzeug erfolgreich hinzugefügt.";
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
    <title>Kfz Werkstatt - Neues Fahrzeug</title>
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
                            <label for="kennzeichen">Kennzeichen:</label>
                            <input type="text" class="form-control" id="kennzeichen" name="kennzeichen" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="marke">Marke:</label>
                            <input type="text" class="form-control" id="marke" name="marke" required>
                        </div>
                        <div class="col">


                            <label for="typ">Typ:</label>
                            <input type="text" class="form-control" id="typ" name="typ" required>

                        </div>
                        <div class="col">

                            <label for="baujahr">Baujahr:</label>
                            <input type="text" class="form-control" id="baujahr" name="baujahr" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="kmStand">Kilometerstand:</label>
                            <input type="number" class="form-control" id="kmStand" name="kmStand" required>
                        </div>
                        <div class="col">
                            <label for="kw">Leistung in kW:</label>
                            <input type="number" class="form-control" id="kw" name="kw" required>
                        </div>
                        <div class="col">
                            <label for="treibstoff">Treibstoff:</label>
                            <input type="text" class="form-control" id="treibstoff" name="treibstoff" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="tueren">Türen:</label>
                            <input type="text" class="form-control" id="tueren" name="tueren" required>
                        </div>
                        <div class="col">
                            <label for="karosieform">Karosserieform:</label>
                            <input type="text" class="form-control" id="karosieform" name="karosieform" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="zulassung">Zulassung:</label>
                            <input type="text" class="form-control" id="zulassung" name="zulassung" required>
                        </div>
                        <div class="col">
                            <label for="erstzulassung">Erstzulassung:</label>
                            <input type="text" class="form-control" id="erstzulassung" name="erstzulassung" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="fahrgestellnummer">Fahrgestellnummer:</label>
                            <input type="text" class="form-control" id="fahrgestellnummer" name="fahrgestellnummer"
                                required>
                        </div>
                        <div class="col">
                            <label for="motornummer">Motornummer:</label>
                            <input type="text" class="form-control" id="motornummer" name="motornummer" required>
                        </div>
                        <div class="col">
                            <label for="hubraum">Hubraum:</label>
                            <input type="number" class="form-control" id="hubraum" name="hubraum">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="fin">FIN (Fahrzeugidentifikationsnummer):</label>
                            <input type="text" class="form-control" id="fin" name="fin">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Fahrzeug anlegen</button>
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