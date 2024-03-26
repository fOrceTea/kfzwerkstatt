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
    $lieferantName = $_POST["lieferantName"];
    $strasse = $_POST["strasse"];
    $plz = $_POST["plz"];
    $ort = $_POST["ort"];
    $telefon = $_POST["telefon"];
    $mail = $_POST["mail"];
    $ansprechpartner = $_POST["ansprechpartner"];

    $sql = "INSERT INTO tbl_lieferanten (LieferantName, STRASSE, PLZ, ORT, Telefon, mail, Ansprechpartner) 
    VALUES ('$lieferantName', '$strasse', '$plz', '$ort', '$telefon', '$mail', '$ansprechpartner')";
    if ($conn->query($sql) === TRUE) {
        echo "Lieferant erfolgreich hinzugefügt.";
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
    <title>Kfz Werkstatt - Neuer Lieferant</title>
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
                            <label for="lieferantName">Lieferant Name:</label>
                            <input type="text" class="form-control" id="lieferantName" name="lieferantName" required>
                        </div>
                        <div class="col">
                            <label for="strasse">Straße:</label>
                            <input type="text" class="form-control" id="strasse" name="strasse" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="plz">PLZ:</label>
                            <input type="number" class="form-control" id="plz" name="plz" required>
                        </div>
                        <div class="col">
                            <label for="ort">Ort:</label>
                            <input type="text" class="form-control" id="ort" name="ort" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="telefon">Telefon:</label>
                            <input type="text" class="form-control" id="telefon" name="telefon" required>
                        </div>
                        <div class="col">
                            <label for="mail">E-Mail:</label>
                            <input type="email" class="form-control" id="mail" name="mail" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="ansprechpartner">Ansprechpartner:</label>
                            <input type="text" class="form-control" id="ansprechpartner" name="ansprechpartner" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Lieferant hinzufügen</button>
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
