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
    $kontenbezeichnung = $_POST["kontenbezeichnung"];

    $sql = "INSERT INTO tbl_konten (Kontenbezeichnung) VALUES ('$kontenbezeichnung')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Konto erfolgreich hinzugefügt.";
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
    <title>Kfz Werkstatt - Neues Konto</title>
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
                            <label for="kontenbezeichnung">Kontenbezeichnung:</label>
                            <input type="text" class="form-control" id="kontenbezeichnung" name="kontenbezeichnung" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Konto anlegen</button>
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
