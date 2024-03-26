
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
    $name = $_POST["name"];
    $adresse = $_POST["adresse"];
    $plz = $_POST["plz"];
    $ort = $_POST["ort"];
    $telefon = $_POST["telefon"];

    $sql = "INSERT INTO Lieferant (Name, Adresse, PLZ, Ort, Telefon) 
    VALUES ('$name', '$adresse', '$plz', '$ort', '$telefon')";
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
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col">
                            <label for="adresse">Adresse:</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="plz">PLZ:</label>
                            <input type="text" class="form-control" id="plz" name="plz" required>
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
                    </div>

                    <button type="submit" class="btn btn-primary">Lieferant anlegen</button>
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
