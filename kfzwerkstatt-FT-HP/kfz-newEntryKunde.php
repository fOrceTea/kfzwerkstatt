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

$sql_kunden = "SELECT * FROM tbl_kfz_kunden";
$result_kunden = $conn->query($sql_kunden);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Anrede = $_POST["Anrede"];
    $TITEL = $_POST["TITEL"];
    $ZUNAME = $_POST["ZUNAME"];
    $VORNAME = $_POST["VORNAME"];
    $Firma = $_POST["Firma"];
    $STRASSE = $_POST["STRASSE"];
    $PLZ = $_POST["PLZ"];
    $ORT = $_POST["ORT"];
    $Telefon = $_POST["Telefon"];
    $Telefon2 = $_POST["Telefon2"];
    $mail = $_POST["mail"];
    $Kundeseit = $_POST["Kundeseit"];
    $Fax = $_POST["Fax"];
    $Kommentar = $_POST["Kommentar"];

    $sql = "INSERT INTO tbl_kfz_kunden 
    (Anrede, TITEL, ZUNAME, VORNAME, Firma, STRASSE, PLZ, ORT, Telefon, Telefon2, mail, Kundeseit, Fax, Kommentar)
    VALUES ('$Anrede', '$TITEL', '$ZUNAME', '$VORNAME', '$Firma', '$STRASSE', '$PLZ', '$ORT', '$Telefon', '$Telefon2', '$mail', '$Kundeseit', '$Fax', '$Kommentar')";
    if ($conn->query($sql) === TRUE) {
        echo "Kunde erfolgreich hinzugefügt.";
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
    <title>kfz_werkstatt_neukunden</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <main>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="Anrede">Anrede:</label>
                            <input type="text" class="form-control" id="Anrede" name="Anrede">
                        </div>
                        <div class="col">

                            <label for="TITEL">TITEL:</label>
                            <input type="text" class="form-control" id="TITEL" name="TITEL">
                        </div>
                        <div class="col">

                            <label for="ZUNAME">ZUNAME:</label>
                            <input type="text" class="form-control" id="ZUNAME" name="ZUNAME">
                        </div>
                        <div class="col">
                            <label for="VORNAME">VORNAME:</label>
                            <input type="text" class="form-control" id="VORNAME" name="VORNAME">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">

                            <label for="Firma">Firma:</label>
                            <input type="text" class="form-control" id="Firma" name="Firma">
                        </div>
                        <div class="col">

                            <label for="STRASSE">STRASSE:</label>
                            <input type="text" class="form-control" id="STRASSE" name="STRASSE">
                        </div>
                        <div class="col">

                            <label for="PLZ">PLZ:</label>
                            <input type="number" class="form-control" id="PLZ" name="PLZ">
                        </div>
                        <div class="col">

                            <label for="ORT">ORT:</label>
                            <input type="text" class="form-control" id="ORT" name="ORT">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">

                            <label for="Telefon">Telefon:</label>
                            <input type="text" class="form-control" id="Telefon" name="Telefon">
                        </div>
                        <div class="col">

                            <label for="Telefon2">Telefon2:</label>
                            <input type="text" class="form-control" id="Telefon2" name="Telefon2">
                        </div>
                        <div class="col">

                            <label for="mail">mail:</label>
                            <input type="text" class="form-control" id="mail" name="mail">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">

                            <label for="Kundeseit">Kundeseit:</label>
                            <input type="text" class="form-control" id="Kundeseit" name="Kundeseit">
                        </div>
                        <div class="col">

                            <label for="Fax">Fax:</label>
                            <input type="text" class="form-control" id="Fax" name="Fax">
                        </div>
                        <div class="col">

                            <label for="Kommentar">Kommentar:</label>
                            <input type="text" class="form-control" id="Kommentar" name="Kommentar">
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Kunde anlegen</button>
            </form>
        </main>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.4.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </div>
</body>

</html>

<?php
// Close connection
$conn->close();
?>